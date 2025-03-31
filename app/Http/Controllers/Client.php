<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Client extends Controller
{
    public function index()
    {
        $clients = \App\Models\Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function create ()
    {
        return view('admin.clients.create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $client = new \App\Models\Client();

        $client->name = $request->input('name');
        if($client->image = $request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/clients/', $filename);
            $client->image = $filename;
        }

        $client->save();

        return redirect()->back()->with('status', 'Klient erfolgreich hinzugefügt');
    }

    public function edit($id) {
        $client = \App\Models\Client::find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $client = \App\Models\Client::find($id);

        $client->name = $request->input('name');

        if ($request->hasFile('image')) {
            $destination = 'uploads/clients/' . $client->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/clients/', $filename);

            $client->image = $filename;
        }

        $client->save();

        return redirect()->back()->with('status', 'Klient erfolgreich aktualisiert');
    }

    public function destroy($id) {
        $client = \App\Models\Client::find($id);
        $destination = 'uploads/clients/'.$client->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $client->delete();

        return redirect()->back()->with('status', 'Klient erfolgreich gelöscht');
    }
}
