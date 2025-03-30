<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.index', compact('settings'));
    }

    public function users()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Nur Admins haben Zugriff auf diese Seite.');
        }

        $settings = Setting::all()->keyBy('key');
        $users = User::where('role', 'editor')->get();
        return view('admin.users', compact('settings', 'users'));
    }

    public function content()
    {
        $clients = \App\Models\Client::all();
        $users = \App\Models\User::all();

        return view('admin.content', compact('clients', 'users'));
    }


    public function update(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        if (!empty($request->settings['site_title'])) {
            Setting::updateOrCreate(['key' => 'site_title'], ['value' => $request->settings['site_title']]);
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $path]);
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('favicons', 'public');
            Setting::updateOrCreate(['key' => 'favicon'], ['value' => $path]);
        }

        return redirect()->route('admin.index')->with('success', 'Einstellungen gespeichert!');
    }

    public function updateContent(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        foreach ($request->all() as $key => $file) {
            if (str_starts_with($key, 'clients_picture_') && $request->hasFile($key)) {
                $path = $file->store('images', 'public');
                Setting::updateOrCreate(['key' => $key], ['value' => $path]);
            }
        }

        return redirect()->route('admin.content', ['tab' => $request->get('tab')])
            ->with('success', 'Seiteninhalte gespeichert!');
    }

    public function storeEditor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'editor',
        ]);

        return redirect()->route('admin.users')->with('success', 'Editor hinzugefügt.');
    }

    public function updateEditor(Request $request, User $user)
    {
        if ($user->role !== 'editor') {
            return abort(403, 'Nur Editoren können bearbeitet werden.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('admin.users')->with('success', 'Editor aktualisiert.');
    }

    public function deleteEditor(User $user)
    {
        if ($user->role !== 'editor') {
            return abort(403, 'Nur Editoren können gelöscht werden.');
        }

        $user->delete();

        // Bleibt im Tab "Benutzerverwaltung"
        return redirect()->route('admin.users')->with('success', 'Editor gelöscht.');
    }
}
