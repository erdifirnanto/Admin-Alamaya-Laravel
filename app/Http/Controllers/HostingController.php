<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hosting;
use Illuminate\Support\Carbon;


class HostingController extends Controller
{
    public function View()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data domain untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $hostings = Hosting::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.hosting', compact('hostings'));
        } else if (Auth::user()->role === 'staff') {
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $hostings = Hosting::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.hosting', compact('hostings'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }

    public function Hstore(Request $request)
    {
        // dd($request);

        $request->validate([
            'project_name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'package' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'expired' => 'required|date',
        ]);
        // Simpan data ke database
        Hosting::create([
            'project_name' => $request['project_name'],
            'domain' => $request['domain'],
            'package' => $request['package'],
            'status' => $request['status'],
            'expired' => $request['expired'],
        ]);
        return redirect()->route('hosting.view')->with('success', 'Hosting berhasil ditambahkan.');
        // return redirect()->back()->with('success', 'Client has been added successfu/lly');
    }

    public function destroy($id)
    {
        $project = Hosting::findOrFail($id);
        $project->delete();
        return response()->json(['success' => true]);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs provided.']);
        }
        Hosting::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        // Ambil data domain berdasarkan ID
        $hosting = Hosting::findOrFail($id);
        $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
        $hostings = Hosting::orderBy('id', $sort)->paginate(10);
        // Kembalikan view dengan data hosting
        return view('hosting.view', compact('hosting', 'hostings'));
    }

    public function update(Request $request, Hosting $hosting)
    {
        // Validasi data permintaan
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'package' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'expired' => 'required|date',
        ]);

        // Perbarui domain dengan data yang sudah divalidasi
        $hosting->update($validatedData);

        // Kembalikan respons (bisa berupa redirect, respons JSON, dll.)
        // return response()->json(['success' => true]);
        return redirect()->route('hosting.view')->with('success', 'Data berhasil diupdate.');
    }

    public function search(Request $request)
    {
        // Deteksi apakah search berasal dari form
        if (!$request->has('search')) {
            // Jika tidak ada parameter `search`, redirect ke /
            return redirect('/');
        }

        // Ambil query pencarian
        $searchQuery = $request->input('search', '');

        // Query untuk mencari data
        $hostings = Hosting::where('project_name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('package', 'LIKE', "%{$searchQuery}%")
            ->orWhere('status', 'LIKE', "%{$searchQuery}%")
            ->orWhere('domain', 'LIKE', "%{$searchQuery}%")
            ->orWhere('expired', 'LIKE', "%{$searchQuery}%")
            ->paginate(50);

        // Tampilkan data pada view
        return view('page.hosting', compact('hostings'));
    }
}
