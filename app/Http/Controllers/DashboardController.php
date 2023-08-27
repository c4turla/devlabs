<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $topRecords = User::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('topRecords'));
    }

    public function siswa()
    {
        return view('siswa.dashboard');
    }

    public function siswaprofile()
    {
        return view('siswa.profile.index');
    }

    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function updateprofile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'kelas' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'nomor_hp' => 'required',
        ]);

        // Mendapatkan path gambar lama
        $gambarPath = $user->photo;

        if ($request->hasFile('photo')) {
            // Menghapus gambar lama jika ada
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }

            // Mengupload gambar baru
            $gambarPath = $request->file('photo')->store('assets/images/user', 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $gambarPath,
            'kelas' => $request->kelas,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('siswa.profile')->with('success', 'Profil Anda Berhasil diupdate');
    }

    public function course(Request $request)
    {
        $search = $request->input('search');

        $kategori = Kategori::with(['kelas.materi' => function($query) use ($search) {
            $query->where('judul', 'LIKE', "%$search%");
        }])->get();
        //$kategori = Kategori::with('kelas.materi')->get();
        return view('siswa.course', compact('kategori','search') );
    }
}
