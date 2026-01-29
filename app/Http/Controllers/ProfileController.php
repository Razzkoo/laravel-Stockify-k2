<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //view profile
    public function index()
    {
        $user = Auth::user();

        return view('admin.profile.index', compact('user'));
    }
    public function manajer()
    {
        $user = Auth::user();

        return view('manajer.profile.index', compact('user'));
    }
    public function staff()
    {
        $user = Auth::user();

        return view('staff.profile.index', compact('user'));
    }

    
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            
            if ($user->profile_photo && Storage::exists($user->profile_photo)) {
                Storage::delete($user->profile_photo);
            }

            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
