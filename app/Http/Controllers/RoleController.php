<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    // Fungsi untuk halaman khusus Admin
    public function adminDashboard()
    {
        // Cek apakah pengguna adalah Admin
        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard'); // Tampilkan halaman admin
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }

    // Fungsi untuk halaman khusus User
    public function userDashboard()
    {
        // Cek apakah pengguna adalah User
        if (Auth::user()->role === 'staff') {
            return view('staff.dashboard'); // Tampilkan halaman user
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }
}
