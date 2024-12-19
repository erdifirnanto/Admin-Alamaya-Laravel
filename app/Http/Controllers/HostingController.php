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

    public function Dstore(Request $request)
    {
        // dd($request);

        $request->validate([
            'project_name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'expired' => 'required|date',
        ]);
        // Simpan data ke database
        Hosting::create([
            'project_name' => $request['project_name'],
            'domain' => $request['domain'],
            'status' => $request['status'],
            'expired' => $request['expired'],
        ]);
        return redirect()->route('domain.view')->with('success', 'Project berhasil ditambahkan.');
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
        $domain = Hosting::findOrFail($id);
        $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
        $hostings = Hosting::orderBy('id', $sort)->paginate(10);
        // Kembalikan view dengan data domain
        return view('domain.view', compact('domain', 'hostings'));
    }

    public function update(Request $request, Hosting $domain)
    {
        // Validasi data permintaan
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'expired' => 'required|date',
        ]);

        // Perbarui domain dengan data yang sudah divalidasi
        $domain->update($validatedData);

        // Kembalikan respons (bisa berupa redirect, respons JSON, dll.)
        // return response()->json(['success' => true]);
        return redirect()->route('domain.view')->with('success', 'Data berhasil diupdate.');
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
            ->orWhere('domain', 'LIKE', "%{$searchQuery}%")
            ->orWhere('expired', 'LIKE', "%{$searchQuery}%")
            ->paginate(50);

        // Tampilkan data pada view
        return view('page.domain', compact('hostings'));
    }


    //     public function showDomainNotifications()
    //     {
    //         // Daftar interval pengingat
    //         $reminderIntervals = [30, 25, 20, 15, 10, 5, 4, 3, 2, 1];

    //         // Tanggal sekarang
    //         $now = Carbon::now();
    //         $notifications = [];

    //         foreach ($reminderIntervals as $interval) {
    //             // Cari domain yang akan expired pada interval tertentu
    //             $targetDate = $now->copy()->addDays($interval);
    //             $hostings = Hosting::whereDate('expired', $targetDate->toDateString())->get();

    //             foreach ($hostings as $domain) {
    //                 $notifications[] = [
    //                     'domain' => $domain->domain,
    //                     'days_remaining' => $interval,
    //                     'expired_date' => $domain->expired
    //                 ];
    //             }
    //         }

    //         // Kirim data notifikasi ke view
    //         return view('domain.notifications', compact('notifications'));
    //     }
}
