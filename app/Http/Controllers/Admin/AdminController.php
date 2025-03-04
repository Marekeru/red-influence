<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        $users = User::where('role', 'editor')->get();
        return view('admin.index', compact('settings', 'users'));
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

        return redirect()->route('admin.dashboard', ['tab' => 'general'])->with('success', 'Einstellungen gespeichert!');
    }

    public function updateContent(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        if ($request->hasFile('aboutPicture')) {
            $path = $request->file('aboutPicture')->store('images', 'public');
            Setting::updateOrCreate(['key' => 'aboutPicture'], ['value' => $path]);
        }

        return redirect()->route('admin.dashboard', ['tab' => 'content'])->with('success', 'Seiteninhalte gespeichert!');
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

        // Bleibt im Tab "Benutzerverwaltung"
        return redirect()->route('admin.dashboard', ['tab' => 'users'])->with('success', 'Editor hinzugefügt.');
    }

    // 📌 Editor bearbeiten
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

        // Bleibt im Tab "Benutzerverwaltung"
        return redirect()->route('admin.dashboard', ['tab' => 'users'])->with('success', 'Editor aktualisiert.');
    }

    // 📌 Editor löschen
    public function deleteEditor(User $user)
    {
        if ($user->role !== 'editor') {
            return abort(403, 'Nur Editoren können gelöscht werden.');
        }

        $user->delete();

        // Bleibt im Tab "Benutzerverwaltung"
        return redirect()->route('admin.dashboard', ['tab' => 'users'])->with('success', 'Editor gelöscht.');
    }
}
