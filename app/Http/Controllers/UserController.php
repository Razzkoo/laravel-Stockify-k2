<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan semua user (VIEW)
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.admin.user.index', compact('users'));
    }

    /**
     * Menampilkan form tambah user
     */
    public function create()
    {
        return view('dashboard.admin.user.create');
    }

    /**
     * Menyimpan user baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
            'role'     => 'required|in:admin,manajer_gudang,staff_gudang',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => $validated['password'], // auto-hash (cast)
            'role'     => $validated['role'],
        ]);

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit user
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.user.edit', compact('user'));
    }

    /**
     * Update data user
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:3',
            'role'     => 'required|in:admin,manajer_gudang,staff_gudang',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil diperbarui');
    }

    /**
     * Menghapus user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
