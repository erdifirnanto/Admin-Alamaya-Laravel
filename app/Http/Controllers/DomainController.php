<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Domain;
use Illuminate\Support\Carbon;


class DomainController extends Controller
{
    public function View()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data domain untuk admin
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
            return view('page.domain', compact('domains'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }

    public function Dstore(Request $request)
    {
        // dd($request);

        $request->validate([
            'project_name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'expired' => 'required|date',
        ]);
        // Simpan data ke database
        Domain::create([
            'project_name' => $request['project_name'],
            'domain' => $request['domain'],
            'expired' => $request['expired'],
        ]);
        return redirect()->route('domain.view')->with('success', 'Project berhasil ditambahkan.');
        // return redirect()->back()->with('success', 'Client has been added successfu/lly');
    }

    public function destroy($id)
    {
        $project = Domain::findOrFail($id);
        $project->delete();
        return response()->json(['success' => true]);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs provided.']);
        }
        Domain::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        // Ambil data domain berdasarkan ID
        $domain = Domain::findOrFail($id);
        $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
        $domains = Domain::orderBy('id', $sort)->paginate(10);
        // Kembalikan view dengan data domain
        return view('domain.view', compact('domain', 'domains'));
    }

    public function update(Request $request, Domain $domain)
    {
        // Validasi data permintaan
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'expired' => 'required|date',
        ]);

        // Perbarui domain dengan data yang sudah divalidasi
        $domain->update($validatedData);

        // Kembalikan respons (bisa berupa redirect, respons JSON, dll.)
        // return response()->json(['success' => true]);
        return redirect()->route('domain.view')->with('success', 'Data berhasil diupdate.');
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
    //             $domains = Domain::whereDate('expired', $targetDate->toDateString())->get();

    //             foreach ($domains as $domain) {
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
