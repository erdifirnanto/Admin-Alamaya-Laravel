<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;

class TeamController extends Controller
{
    public function View()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data team untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $teams = Team::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.team', compact('teams'));
        } else if (Auth::user()->role === 'staff') {
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $teams = Team::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.team', compact('teams'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }

    public function Dstore(Request $request)
    {
        // dd($request);
        $request->validate([
            'personil_name' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'project_handle' => 'required|string|max:255',
        ]);
        // Simpan data ke database
        Team::create([
            'personil_name' => $request['personil_name'],
            'division' => $request['division'],
            'project_handle' => $request['project_handle'],
        ]);
        return redirect()->route('team.view')->with('success', 'Project berhasil ditambahkan.');
        // return redirect()->back()->with('success', 'Client has been added successfu/lly');
    }

    public function destroy($id)
    {
        $project = Team::findOrFail($id);
        $project->delete();
        return response()->json(['success' => true]);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs provided.']);
        }
        Team::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        // Ambil data team berdasarkan ID
        $team = Team::findOrFail($id);
        $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
        $teams = Team::orderBy('id', $sort)->paginate(10);
        // Kembalikan view dengan data team
        return view('team.view', compact('team', 'teams'));
    }

    public function update(Request $request, Team $team)
    {
        // Validasi data permintaan
        $validatedData = $request->validate([
            'personil_name' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'project_handle' => 'required|string|max:255',
        ]);

        // Perbarui team dengan data yang sudah divalidasi
        $team->update($validatedData);
        // Kembalikan respons (bisa berupa redirect, respons JSON, dll.)
        // return response()->json(['success' => true]);
        return redirect()->route('team.view')->with('success', 'Data berhasil diupdate.');
    }
}
