<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('Admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $tags = Tag::all();
        return view('admin.edit', compact('project', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newProject = new Project();
        $newProject->fill($request->all());


        if ($request->image) {
            $img_path = Storage::put('uploads', $request->image);
            $newProject->image =  $img_path;
        }

        $newProject->save();


        return to_route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.show', compact('project'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $tags = Tag::all();
        $technologies = Technology::all();
        return view('admin.edit', compact('project', 'tags', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'tag_id' => 'required|integer',
            'link' => 'required',
            'technology' => 'required'
        ]);



        $project->fill($data);

        if ($request->image) {
            $img_path = Storage::put('uploads', $request->image);
            $project->image =  $img_path;
        }

        $project->save();
        $project->technologies()->sync($request->technology);

        return to_route('projects.show', $project)->with('message', 'Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}
