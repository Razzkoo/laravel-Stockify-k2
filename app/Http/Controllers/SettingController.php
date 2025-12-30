<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
    $user = Auth::user();

    // Validasi
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Upload foto jika ada
    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/profile_photos', $filename);

        // Simpan path di database
        $user->profile_photo = $filename;
    }

    // Update nama & email
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

}
