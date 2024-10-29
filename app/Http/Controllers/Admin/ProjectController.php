<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required|min:3|max:64',
            'description'=>'required|min:3|max:1024',
            'languages'=>'required|min:3|max:64',
            'completed'=>'required|integer|min:0|max:1',
            'starting_date'=> 'nullable|date',
            'type'=>'nullable|min:3|max:64',
            'level'=>'nullable|min:3|max:64',
        ]);
        $data = $request->all();
        $project = Project::Create($data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
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
    public function update(Request $request, Project $project)
    {
        dd($request);
        $request->validate([
            'title'=>'required|min:3|max:64',
            'description'=>'required|min:3|max:1024',
            'languages'=>'required|min:3|max:64',
            'completed'=>'required|integer|min:0|max:1',
            'starting_date'=> 'nullable|date',
            'type'=>'nullable|min:3|max:64',
            'level'=>'nullable|min:3|max:64',
        ]);
        $data = $request->all();
        $project = Project::Create($data);
        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
