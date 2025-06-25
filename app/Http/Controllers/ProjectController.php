<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;  // Added this

use App\Models\User;


class ProjectController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        
        $user = Auth::user();  // changed here

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view your projects.');
        }

        dd($user, get_class($user), method_exists($user, 'projects'));
        $projects = $user->projects()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'screenshot' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();  // changed here
        if (!$user) {
            return redirect()->route('login');
        }

        $projectData = $request->only(['title', 'description', 'technologies', 'project_url']);

        if ($request->hasFile('screenshot')) {
            $path = $request->file('screenshot')->store('project_screenshots', 'public');
            $projectData['screenshot'] = $path;
        }

        dd($user, get_class($user), method_exists($user, 'projects'));
        $user->projects()->create($projectData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'screenshot' => 'nullable|image|max:2048',
        ]);

        $projectData = $request->only(['title', 'description', 'technologies', 'project_url']);

        if ($request->hasFile('screenshot')) {
            $path = $request->file('screenshot')->store('project_screenshots', 'public');
            $projectData['screenshot'] = $path;
        }

        $project->update($projectData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
