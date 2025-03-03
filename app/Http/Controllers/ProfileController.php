<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // 🔹 Validierung
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // 🔹 Name immer aktualisieren
        $user->name = $request->name;

        // 🔹 E-Mail nur ändern, wenn der Nutzer ein Admin ist
        if ($user->role === 'admin') {
            $user->email = $request->email;
        }

        // 🔹 Passwort nur setzen, wenn es eingegeben wurde
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 🔹 Änderungen speichern
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil erfolgreich aktualisiert!');
    }
}
