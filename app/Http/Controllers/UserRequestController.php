<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRequestController extends Controller
{
    public function index()
    {
        $requests = UserRequest::latest()->get();

        return view('admin.userlogin.index', compact('requests'));
    }

    //disetujui
    public function approve(Request $request, UserRequest $userRequest)
    {
        if ($userRequest->status === 'approved') {
            return back()->with('error', 'User sudah disetujui.');
        }

        $request->validate([
            'role' => 'required|in:admin,manajer_gudang,staff_gudang'
        ]);

        DB::transaction(function () use ($userRequest, $request) {

            $user = User::where('email', $userRequest->email)->first();

            if (!$user) {
                $user = User::create([
                    'name'     => $userRequest->name,
                    'email'    => $userRequest->email,
                    'password' => $userRequest->password,
                    'role'     => $request->role,
                ]);
            }

            $userRequest->update([
                'user_id'        => $user->id,
                'requested_role' => $request->role,
                'status'         => 'approved',
                'note'           => null,
            ]);
        });

        logActivity(
            'Setujui Pengguna',
            'Menyetujui permintaan pengguna: ' . $userRequest->name .
            ' | Role: ' . $request->role
        );

        return back()->with('success', 'User berhasil disetujui.');
    }


    //ditolak
    public function reject(Request $request, UserRequest $userRequest)
    {
        if ($userRequest->status !== 'pending') {
            return back()->with('error', 'Permintaan sudah diproses.');
        }

        $request->validate([
            'note' => 'nullable|string|max:255',
        ]);

        $userRequest->update([
            'status' => 'rejected',
            'note'   => $request->note,
        ]);
        logActivity(
            'Tolak Pengguna',
            'Menolak permintaan pengguna: ' . $userRequest->name
        );

        return back()->with('success', 'Permintaan berhasil ditolak.');
    }

    public function destroy(UserRequest $userRequest)
    {
        logActivity(
            'Hapus Permintaan Pengguna',
            'Menghapus permintaan pengguna: ' . $userRequest->name
        );
        $userRequest->forceDelete();

        return back()->with('success', 'Permintaan user berhasil dihapus.');
    }
}
