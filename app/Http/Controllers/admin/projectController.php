<?php

namespace App\Http\Controllers\admin;

use App\functions\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Validation\Rules\Exists;
use App\Http\Requests\projectRequest;
use Illuminate\Support\Facades\Storage;
class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectsList= Project::all();
        return view('admin.projects.index', compact('projectsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $method='post';
        $route= "route('admin.projects.store')";

        return view('admin.projects.create', compact('method', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(projectRequest $request)
    {

        // dd($request->all());
        $formData = $request->all();

        // verifico se l'immagine esiste
        if(array_key_exists('image', $formData)){
            // salvo l' immagine nello storage nella cartella upload
            $imagePath = Storage::put('uploads', $formData['image']);

        }

        dd($imagePath);
        $exist= Project::where('name', $request->name)->first();
        if($exist){
            return redirect()->route('admin.projects.index')->with('error','esiste gia un progetto con lo stesso nome');
        }else{
            $formData['slug'] = Helper::generateSlug($formData['name'], Project::class);

            $newProject= new Project();
            $newProject->fill($formData);
            // $newProject->name = $formData['name'];
            // $newProject->topic = $formData['topic'];
            // $newProject->difficulty = $formData['difficulty'];
            // dd($newProject);
            $newProject->save();

            return redirect()->route('admin.projects.index')->with('success','progetto aggiunto con successo');
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {



        return view('admin.projects.edit', compact('project'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(projectRequest $request, Project $project)
    {
        $fomrData = $request->all();
        // dd($fomrData);

        $exist = Project::where('name', $request->name)->first();
        if ($exist) {
            return redirect()->route('admin.projects.edit',$project)->with('error', 'Esiste già un progetto con questo nome');
        }

        $request['slug'] = Helper::generateSlug($request['name'], Project::class);
        $project->update($fomrData);

        return redirect()->route('admin.projects.index')->with('success', 'Il progetto è stato aggiornato con successo');
    }
        // dump($project);


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('deleted',"Il progetto $project->name è stato eliminato con successo");
    }
}
