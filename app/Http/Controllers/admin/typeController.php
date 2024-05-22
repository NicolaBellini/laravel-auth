<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\functions\Helper;

use function PHPSTORM_META\type;

class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $typeList= Type::all();
        return view('admin.type.index', compact('typeList'));
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
        $exist= Type::where('name', $request->name)->first();
        if($exist){
            return redirect()->route('')->with('error','esiste gia una tecnologia con lo stesso nome');
        }else{
            $formData = $request->all();
            $newTechno= new Technology();
            $newTechno->name = $formData['name'];
            $newTechno->slug = Helper::generateSlug($newTechno->name, Technology::class);
            // dd($newProject);
            $newTechno->save();

            return redirect()->route('admin.technology.index')->with('success','Tecnologia aggiunta con successo');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
