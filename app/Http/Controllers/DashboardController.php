<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;

use Illuminate\Http\Request;

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

    public function course()
    {
        return view('siswa.course');
    }
}
