<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);
        $userRequest = UserRequest::where('email', $credentials['email'])->first();

        if ($userRequest) {

            if (!Hash::check($credentials['password'], $userRequest->password)) {
                return back()->withErrors([
                    'email' => 'Email atau password salah.',
                ]);
            }
            if ($userRequest->status === 'pending') {
                return back()->withErrors([
                    'email' => 'Akun Anda masih menunggu persetujuan admin.',
                ]);
            }
            if ($userRequest->status === 'rejected') {
                return back()->withErrors([
                    'email' => 'Permintaan akun Anda ditolak oleh admin.',
                ]);
            }
        }

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }
        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->role !== null) {
            return match ($user->role) {
                'admin'          => redirect()->route('dashboard.admin.dashboard'),
                'manajer_gudang' => redirect()->route('dashboard.manajer.dashboard'),
                'staff_gudang'   => redirect()->route('dashboard.staff.dashboard'),
                default => abort(403, 'Role tidak dikenali'),
            };
        }

        if ($userRequest && $userRequest->status === 'approved') {
            $user->update([
                'role' => $userRequest->requested_role,
            ]);

            return match ($user->role) {
                'admin'          => redirect()->route('dashboard.admin.dashboard'),
                'manajer_gudang' => redirect()->route('dashboard.manajer.dashboard'),
                'staff_gudang'   => redirect()->route('dashboard.staff.dashboard'),
                default => abort(403, 'Role tidak dikenali'),
            };
        }

        Auth::logout();
        return back()->withErrors([
            'email' => 'Akun Anda tidak dapat diproses.',
        ]);
    }


    //Register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:user_requests,email|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        UserRequest::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => bcrypt($request->password),
            'requested_role' => 'staff_gudang',
            'status'         => 'pending',
        ]);

        return redirect()->route('auth.login')
            ->with('success', 'Registrasi berhasil. Menunggu persetujuan admin.');
    }
    //Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
