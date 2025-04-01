<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Member extends Controller
{
    public function index()
    {
        $members = \App\Models\Member::all();
        return view('admin.members.index', compact('members'));
    }

    public function create ()
    {
        return view('admin.members.create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $member = new \App\Models\Member();

        $member->name = $request->input('name');
        if($member->image = $request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/members/', $filename);
            $member->image = $filename;
        }

        $member->save();

        return redirect()->back()->with('status', 'Team-Mitglied erfolgreich hinzugefügt');
    }

    public function edit($id) {
        $member = \App\Models\Member::find($id);
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $member = \App\Models\Member::find($id);

        $member->name = $request->input('name');

        if ($request->hasFile('image')) {
            $destination = 'uploads/members/' . $member->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/members/', $filename);

            $member->image = $filename;
        }

        $member->save();

        return redirect()->back()->with('status', 'Team-Mitglied erfolgreich aktualisiert');
    }

    public function destroy($id) {
        $member = \App\Models\Member::find($id);
        $destination = 'uploads/members/'.$member->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $member->delete();

        return redirect()->back()->with('status', 'Team-Mitglied erfolgreich gelöscht');
    }
}
