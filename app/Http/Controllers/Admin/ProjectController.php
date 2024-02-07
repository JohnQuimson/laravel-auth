<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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
        $data = $this->validation($request->all());

        $project = new Project();

        $project->fill($data);
        $project->slug = Str::of($project->title)->slug('-');

        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
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
        $data = $this->validation($request->all());

        $project->update($data);
        $project->slug = Str::of($project->title)->slug('-');

        $project->save();


        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    private function validation($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:70',
            'visibility' => 'required|max:50',
            'last_updated' => 'required|max:100',
            'main_language' => 'max:200',
            'slug' => 'nullable|max:70',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'visibility.required' => 'Il campo visibility è obbligatorio',
            'visibility.max' => 'Il campo visibility deve avere massimo :max caratteri',
            'last_updated.required' => 'Il campo last_updated è obbligatorio',
            'last_updated.max' => 'Il campo last_updated deve avere massimo :max caratteri',
            'main_language.max' => 'Il campo main_language deve avere deve avere massimo :max caratteri',
            'slug.nullable' => 'Il campo slug NON è obbligatorio',
            'slug.max' => 'Il campo slug deve avere massimo :max caratteri',

        ])->validate();

        return $validator;
    }
}
