<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('user_id', 'desc')->paginate(10);
        return view('admin.pengguna.index', compact('users'));
    }

    public function tambah()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user',
            'password' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'nomor_hp' => 'required', // Validasi gambar
        ]);

        $gambarPath = null;

        if ($request->hasFile('photo')) {
            $gambarPath = $request->file('photo')->store('assets/images/user', 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $gambarPath,
            'password' => Hash::make($request->password),
            'nomor_hp' => $request->nomor_hp,
            'level' => $request->level,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.pengguna.edit', compact('user'));
    }

    public function gantiPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);

        if (Hash::check($request->password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->newpassword),
            ]);

            return back()->with('success', 'Password berhasil diubah.');
        } else {
            return back()->withErrors(['password' => 'Password anda saat ini salah.']);
        }
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nomor_hp' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);
        
        $gambarPath = $user->photo; // Simpan path gambar yang sudah ada

        if ($request->hasFile('photo')) {
            // Hapus gambar yang sudah ada jika ada
            if ($gambarPath && Storage::disk('public')->exists($gambarPath)) {
                Storage::disk('public')->delete($gambarPath);
            }

            $gambarPath = $request->file('photo')->store('assets/images/user', 'public');
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $gambarPath,
            'nomor_hp' => $request->nomor_hp,
            'level' => $request->level,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna Berhasil diupdate');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Pengguna Berhasil dihapus');
    }
}
