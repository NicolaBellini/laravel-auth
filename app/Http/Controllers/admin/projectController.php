<?php

namespace App\Http\Controllers\admin;

use App\functions\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Validation\Rules\Exists;
use App\Http\Requests\projectRequest;

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
        $exist= Project::where('name', $request->name)->first();
        if($exist){
            return redirect()->route('admin.projects.index')->with('error','esiste gia un progetto con lo stesso nome');
        }else{
            $formData = $request->all();
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
        $method='PUT';
        $route= "route('admin.projects.update',$project)";


        // return view('admin.projects.edit-create', compact('method','route','project'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(projectRequest $request, Project $project)
    {

       $validData = $request->validate([
        'name' => 'required|min:2|max:30',
        'topic' => 'required|min:2|max:50',
        'difficulty' => 'required|min:1|max:10'
        ], [
            'name.required' => 'Il nome deve essere inserito',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome deve avere massimo :max caratteri',
            'topic.required' => 'Il topic deve essere inserito',
            'topic.min' => 'Il topic deve avere almeno :min caratteri',
            'topic.max' => 'Il topic deve avere massimo :max caratteri',
            'difficulty.required' => 'La difficoltà deve essere inserita',
            'difficulty.min' => 'La difficoltà deve avere almeno :min caratteri',
            'difficulty.max' => 'La difficoltà deve avere massimo :max caratteri'
        ]);


        $exist = Project::where('name', $request->name)->first();
        if ($exist) {
            return redirect()->route('admin.projects.index')->with('error', 'Esiste già un progetto con questo nome');
        }

        $validData['slug'] = Helper::generateSlug($validData['name'], Project::class);
        $project->update($validData);

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
