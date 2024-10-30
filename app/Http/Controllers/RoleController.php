<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class RoleController extends Controller
{
    // Fungsi untuk halaman khusus Admin
    public function Dashboard()
    {
        // Cek apakah pengguna adalah Admin
        if (Auth::user()->role === 'admin') {
            // Ambil data klien untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $clients = Client::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('dashboard', compact('clients')); // Tampilkan halaman admin dengan data klien
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }

    // Fungsi untuk halaman khusus User
    public function userDashboard()
    {
        // Cek apakah pengguna adalah User
        if (Auth::user()->role === 'staff') {
            // Ambil data klien untuk user
            $clients = Client::paginate(10);
            // dd($clients);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            return view('dashboard', compact('clients')); // Tampilkan halaman user dengan data klien
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }
}
