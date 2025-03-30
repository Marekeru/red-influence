<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Project extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::all();
        return view('admin.content', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'media' => 'required|mimes:jpg,jpeg,png,mp4,avi,mkv|max:20000',
        ]);

        $project = new \App\Models\Project();

        // Speichern des Namens
        $project->name = $request->input('name');

        // Überprüfen, ob eine Datei hochgeladen wurde
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Wenn es sich um ein Bild handelt
            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $file->move(public_path('uploads/projects/images'), $filename);
                $project->video = 'images/' . $filename; // Bild speichern
            }
            // Wenn es sich um ein Video handelt
            elseif (in_array($extension, ['mp4', 'avi', 'mkv'])) {
                $file->move(public_path('uploads/projects/videos'), $filename);
                $project->video = 'videos/' . $filename; // Video speichern
            }
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
        $project = \App\Models\Project::find($id);

        $project->name = $request->input('name');

        // Überprüfen, ob eine neue Datei hochgeladen wurde
        if ($request->hasFile('media')) {
            // Löschen der alten Datei (Bild oder Video)
            $destination = 'uploads/projects/';
            if ($project->video) {
                // Löschen der alten Datei (Bild oder Video)
                $oldFilePath = public_path($destination . $project->video);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // Neue Datei speichern
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Wenn es sich um ein Bild handelt
            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $file->move(public_path('uploads/projects/images'), $filename);
                $project->video = 'images/' . $filename; // Bild speichern
            }
            // Wenn es sich um ein Video handelt
            elseif (in_array($extension, ['mp4', 'avi', 'mkv'])) {
                $file->move(public_path('uploads/projects/videos'), $filename);
                $project->video = 'videos/' . $filename; // Video speichern
            }
        }

        $project->save();

        return redirect()->back()->with('status', 'Projekt erfolgreich aktualisiert');
    }

    public function destroy($id)
    {
        $project = \App\Models\Project::find($id);

        // Löschen der Datei (Bild oder Video)
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
