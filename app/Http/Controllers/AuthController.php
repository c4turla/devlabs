<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Notifications\WelcomeEmailNotification;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registeraction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user',
            'password' => 'required',
            'nomor_hp' => 'required',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_hp' => $request->nomor_hp
        ]);
        $user->save();

        $user->notify(new WelcomeEmailNotification);

        return redirect()->route('auth.login')->with('success', 'Registrasi Berhasil. Silahkan login!');
    }

    public function login()
    {
        return view('login');
    }

    public function loginaction(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();
            if ($user->level === 'admin') {
                // Redirect ke halaman admin
                return redirect()->route('admin.dashboard')->with('success', 'Selamat Anda Berhasil Login');
            } else {
                // Redirect ke halaman user biasa
                return redirect()->route('siswa.dashboard')->with('success', 'Selamat Anda Berhasil Login');
            }
        }

        return back()->withErrors([
            'password' => 'Email atau Password anda Salah',
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Password berhasil diubah.');
        } else {
            return back()->withErrors(['current_password' => 'Password anda saat ini salah.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
