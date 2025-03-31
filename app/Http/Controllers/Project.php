<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Project extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mkv|max:102400',
        ]);

        $project = new \App\Models\Project();

        $project->name = $request->input('name');
        if ($project->video = $request->hasFile('video')) {
            $file = $request->file('video');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/projects/', $filename);
            $project->video = $filename;
        }

        $project->save();

        return redirect()->back()->with('status', 'Projekt erfolgreich hinzugefügt');
    }

    public function edit($id)
    {
        $project = \App\Models\Project::find($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mkv|max:102400',
        ]);

        $project = \App\Models\Project::find($id);

        $project->name = $request->input('name');

        if ($request->hasFile('video')) {
            $destination = 'uploads/projects/' . $project->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/projects/', $filename);

            $project->image = $filename;
        }

        $project->save();

        return redirect()->back()->with('status', 'Projekt erfolgreich aktualisiert');
    }

    public function destroy($id)
    {
        $project = \App\Models\Project::find($id);

        if ($project->video) {
            $filePath = public_path('uploads/projects/' . $project->video);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $project->delete();

        return redirect()->back()->with('status', 'Projekt erfolgreich gelöscht');
    }
}
