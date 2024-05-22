<?php

namespace App\Http\Controllers\admin;

use App\functions\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $validData = $request->validate([
         'name'=>'required|min:2|max:30'

        ],[
         'name.required'=>'il nome deve essere inserito',
         'name.min'=>'il nome deve avere almeno min: caratteri',
         'name.max'=>'il nome deve avere massimo max: caratteri'
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
    public function destroy(string $id)
    {
        //
    }
}
