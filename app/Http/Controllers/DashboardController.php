<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Materi;
use App\Models\Kelas;
use App\Models\Kuis;
use App\Models\Praktikum;
use App\Models\SiswaSkor;
use App\Models\SiswaJawaban;
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
        $totalUsers = User::count();
        $materis = Materi::count();
        $kuis = Kuis::count();
        return view('admin.dashboard', compact('topRecords', 'totalUsers', 'materis', 'kuis'));
    }

    public function siswa()
    {
        return view('siswa.dashboard');
    }

    public function siswaprofile()
    {
        $user = auth()->user();
        $materiSaya = $user->materi()->paginate(10);
        return view('siswa.profile.index', compact('materiSaya'));
    }

    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function editprofile()
    {
        return view('admin.profile.edit');
    }

    public function storeprofile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
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
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
        ]);
        return back()->with('success', 'Profil Anda Berhasil diupdate');
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

        $kategori = Kategori::with(['kelas.materi' => function ($query) use ($search) {
            $query->where('judul', 'LIKE', "%$search%");
        }])->get();
        //$kategori = Kategori::with('kelas.materi')->get();
        return view('siswa.course', compact('kategori', 'search'));
    }

    public function detailmateri(Materi $materi)
    {
        $kelas = Kelas::all();
        return view('siswa.kursus.detail', compact('materi', 'kelas'));
    }

    public function materi(Materi $materi)
    {
        $kelas = Kelas::all();
        return view('siswa.kursus.detailmateri', compact('materi', 'kelas'));
    }

    public function mulaiBelajar(Request $request, $materiId)
    {
        // Mendapatkan pengguna yang sedang masuk
        $user = auth()->user();

        // Mendapatkan materi berdasarkan ID
        $materi = Materi::findOrFail($materiId);

        // Periksa apakah pengguna sudah mengambil kursus ini sebelumnya
        if ($user->materi->contains($materi)) {
            return redirect()->back()->with('error', 'Anda sudah mengambil kursus ini sebelumnya, Silahkan klik menu Kursus Saya untuk melihat detail.');
        }

        // Menyimpan data ke tabel pivot materi_user
        $user->materi()->attach($materi);

        // Redirect atau kembali ke halaman yang sesuai
        return redirect()->back()->with('success', 'Anda telah memulai belajar materi ini.');
    }

    public function kursusSaya()
    {
        $user = auth()->user();
        $materiSaya = $user->materi()
            ->with('praktikum', 'kuis:id,materi_id') // Menyertakan kolom pivot yang diperlukan
            ->paginate(10); // Mengambil materi yang sudah diambil oleh pengguna.
        // Mengambil skor pengguna terkait dengan materi yang diambil
        $skor = $user->siswaSkor()
            ->whereIn('id_materi', $materiSaya->pluck('id')) // Filter berdasarkan materi yang diambil
            ->get();

        return view('siswa.kursus.saya', compact('materiSaya','skor'));
    }

    public function mulaiPraktikum(Materi $materi)
    {
        $user = auth()->user();

        // Periksa apakah pengguna telah mengklik "Mulai Praktikum" sebelumnya
        if (!$user->materi->contains($materi)) {
            // Jika belum, maka tambahkan ke tabel MateriUser
            $user->materi()->attach($materi->id, ['praktikum_id' => $materi->praktikumid->id]);

            // Arahkan pengguna ke halaman detail praktikum
            return redirect()->route('siswa.showpraktikum', $materi->praktikumid->id);
        }

        // Jika pengguna telah mengklik "Mulai Praktikum" sebelumnya,
        // langsung arahkan mereka ke halaman detail praktikum
        return redirect()->route('siswa.showpraktikum', $materi->praktikumid->id);
    }

    public function showPraktikum($praktikumId)
    {
        // Dapatkan data praktikum berdasarkan $praktikumId
        $praktikum = Praktikum::find($praktikumId);

        // Periksa apakah praktikum ditemukan
        if (!$praktikum) {
            return abort(404); // Tampilkan halaman 404 jika praktikum tidak ditemukan
        }

        // Tampilkan halaman detail praktikum dengan data praktikum
        return view('siswa.praktikum', compact('praktikum'));
    }

    public function mulaiKuis(Materi $materi)
    {
        $kuis = Kuis::where('materi_id', $materi->id)->get();
        $totalSoal = Kuis::where('materi_id', $materi->id)->count();
        return view('siswa.kuis', compact('materi', 'kuis', 'totalSoal'));
    }

    public function startKuis(Materi $materi)
    {
        $kuis = Kuis::where('materi_id', $materi->id)->get();
        return view('siswa.mulaikuis', compact('materi', 'kuis'));
    }

    public function showKuis($kuisId)
    {
        // Dapatkan data praktikum berdasarkan $praktikumId
        $kuis = Kuis::find($kuisId);

        // Periksa apakah praktikum ditemukan
        if (!$kuis) {
            return abort(404); // Tampilkan halaman 404 jika praktikum tidak ditemukan
        }

        // Tampilkan halaman detail praktikum dengan data praktikum
        return view('siswa.kuis', compact('kuis'));
    }

    public function prosesJawaban(Request $request)
    {
        $nomorSoal = $request->input('id_soal');
        $jawabanPengguna = $request->input('jawaban'); // Mendapatkan jawaban yang diberikan oleh pengguna
        $materi_id = $request->input('id_materi');
        $siswa_id = Auth::user()->user_id;


        $check_exisiting = SiswaSkor::where('id_siswa', $siswa_id)
            ->where('id_materi', $materi_id)
            ->count();
        
        if ($check_exisiting > 0){
        abort(403, 'Kamu sudah mengambil Kuis ini.');
        }

        for ($x = 0; $x < count($nomorSoal); $x++) {
            SiswaJawaban::create([
                'id_siswa' => $siswa_id,
                'id_materi' => $materi_id,
                'id_soal' => $nomorSoal[$x],
                'jawaban_siswa' => $jawabanPengguna[$x]
            ]);
        }

        $answers = SiswaJawaban::with('soalid')
        ->where('id_siswa', $siswa_id)
        ->get();

        $skor = 0;
        foreach($answers as $answer){
        if($answer->jawaban_siswa == $answer->soalid->jawaban_benar)
            $skor += $answer->soalid->skor;
        }

        SiswaSkor::create([
            'id_siswa' => $siswa_id,
            'id_materi' => $materi_id,
            'skor' => $skor,
            'recorded_on' => \Carbon\Carbon::now()
        ]);

        $hasil = SiswaSkor::where('id_siswa', $siswa_id)->latest('recorded_on')->first();
        return view('siswa.skor',compact('hasil'));

    }
}
