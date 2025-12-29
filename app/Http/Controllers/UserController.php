<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /// list user
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /// form create user
    public function create()
    {
        return view('users.create');
    }

    /// simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'role'     => 'required|in:Admin,Manajer Gudang,Staff Gudang',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /// form edit user
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /// update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:Admin,Manajer Gudang,Staff Gudang',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:3'
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diperbarui');
    }

    /// hapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
