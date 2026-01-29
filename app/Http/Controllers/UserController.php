<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->whereNotNull('role')
            ->latest()
            ->get();

        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
            'role'     => 'required|in:admin,manajer_gudang,staff_gudang',
        ], [
            'email.unique' => 'Email sudah digunakan, silakan gunakan email lain.',
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role'     => $validated['role'],
            ]);
            logActivity(
                'Tambah Pengguna',
                'Menambah pengguna: ' . $user->name . ' (' . $user->role . ')'
            );

        });
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil dibuat.');
    }
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:3',
            'role'     => 'required|in:admin,manajer_gudang,staff_gudang',
        ], [
            'email.unique' => 'Email sudah digunakan, silakan gunakan email lain.',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }
        logActivity(
                'Perbarui Pengguna',
                'Memperbarui pengguna : ' . $user->name . ' (' . $user->role . ')'
            );

        $user->update($validated);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        logActivity(
                'Hapus Pengguna',
                'Menambah pengguna: ' . $user->name . ' (' . $user->role . ')'
            );
        $user->userRequests()->forceDelete();
        $user->forceDelete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User dan seluruh permintaannya berhasil dihapus');
    }

}
