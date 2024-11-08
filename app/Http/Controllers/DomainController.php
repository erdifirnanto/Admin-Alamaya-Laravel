<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Domain;

class DomainController extends Controller
{
    public function View()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data klien untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $domains = Domain::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.domain', compact('domains'));
        } else if (Auth::user()->role === 'staff') {
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $domains = Domain::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.project', compact('domains'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }
}
