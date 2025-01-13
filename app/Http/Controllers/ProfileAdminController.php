<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function index()
    {
        return view('ProfilAdmin.index', ['user' => auth()->user()]);
    }
    

    public function edit()
    {
        return view('ProfilAdmin.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('ProfilAdmin.edit')->with('success', 'Profil berhasil diperbarui.');
    }

}
