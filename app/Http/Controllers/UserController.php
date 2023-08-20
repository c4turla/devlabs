<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('user_id', 'desc')->paginate(10);
        return view('admin.pengguna.index', compact('users'));
    }
}
