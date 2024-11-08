<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectController extends Controller
{
    public function View()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data klien untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.project', compact('projects'));
        } else if (Auth::user()->role === 'staff') {
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.project', compact('projects'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }

    public function Pstore(Request $request)
    {

        $request->validate([
            'project_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'pic_name' => 'required|string|max:255',
            'tanggal_masuk_project' => 'required|date',
            'deadline' => 'required|date',
        ]);
        // dd($request);
        // Simpan data ke database
        Project::create([
            'project_name' => $request['project_name'],
            'category' => $request['category'],
            'pic_name' => $request['pic_name'],
            'tanggal_masuk_project' => $request['tanggal_masuk_project'],
            'deadline' => $request['deadline'],
        ]);

        return redirect()->route('project.view')->with('success', 'Project berhasil ditambahkan.');
        // return redirect()->back()->with('success', 'Client has been added successfu/lly');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['success' => true]);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs provided.']);
        }

        Project::whereIn('id', $ids)->delete();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        // Ambil data klien berdasarkan ID
        $project = Project::findOrFail($id);
        $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
        $projects = Project::orderBy('id', $sort)->paginate(10);
        // Kembalikan view dengan data klien
        return view('dashboard', compact('project', 'projects'));
    }

    public function update(Request $request, Project $project)
    {
        // Validasi data permintaan
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'pic_name' => 'required|string|max:255',
            'tanggal_masuk_project' => 'required|date',
            'deadline' => 'required|date',
        ]);

        // Perbarui klien dengan data yang sudah divalidasi
        $project->update($validatedData);

        // Kembalikan respons (bisa berupa redirect, respons JSON, dll.)
        // return response()->json(['success' => true]);
        return redirect()->route('project.view')->with('success', 'Data berhasil diupdate.');
    }
}
