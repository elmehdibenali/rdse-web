<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('services')
        ->orderBy('project_date', 'desc')
        ->get();
        $services = Service::all();
        return view('admin.projects.index', compact('services','projects'));
    }
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();

        // Upload de l'image si présente
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project = Project::create($data);
        $project->services()->sync($request->services); // Association des services

        return redirect()->back()->with('success', 'Projet ajouté avec succès.');
    }

    public function edit(Project $project)
    {
        $services = Service::all();

        return view('admin.projects.edit',compact('project','services'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->only(['title', 'description', 'date']);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($project->photo && Storage::disk('public')->exists($project->photo)) {
                Storage::disk('public')->delete($project->photo);
            }

            // Store new photo
            $data['photo'] = $request->file('photo')->store('projects', 'public');
        }

        // Update project details
        $project->update($data);

        // Sync services (pivot table)
        $project->services()->sync($request->services ?? []);

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return back()->with('success','Le projet a été supprimer avec succès !');
    }

}
