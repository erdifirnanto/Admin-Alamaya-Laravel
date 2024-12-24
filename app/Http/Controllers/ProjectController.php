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
        } elseif (Auth::user()->role === 'staff') {
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

    public function ViewOnprogress()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data klien untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::where('status', '!=', 'Maintenance')->where('category', '!=', 'Maintenance')->where('status', '!=', 'Selesai')->orderBy('id', $sort)->paginate(10);

            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.onprogress', compact('projects'));
        } elseif (Auth::user()->role === 'staff') {
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::where('status', '!=', 'Maintenance')->where('category', '!=', 'Maintenance')->where('status', '!=', 'Selesai')->orderBy('id', $sort)->paginate(10);
            // $clients = Client::paginate(10);
            // $clients = Client::all(); // Ganti dengan model yang sesuai
            // dd($clients);
            // dd(csrf_token());
            return view('page.onprogress', compact('projects'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }
    public function ViewMaintenance()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data klien untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::where('category', '=', 'Maintenance')->orWhere('status', '=', 'Maintenance')->orderBy('id', $sort)->paginate(10);

            return view('page.maintenance', compact('projects'));
        } elseif (Auth::user()->role === 'staff') {
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::where('category', '=', 'Maintenance')->orWhere('status', '=', 'Maintenance')->orderBy('id', $sort)->paginate(10);

            return view('page.maintenance', compact('projects'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }
    public function ViewCompleted()
    {
        if (Auth::user()->role === 'admin') {
            // Ambil data klien untuk admin
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::where('status', '=', 'Selesai')->orderBy('id', $sort)->paginate(10);

            return view('page.completed', compact('projects'));
        } elseif (Auth::user()->role === 'staff') {
            $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
            $projects = Project::where('status', '=', 'Selesai')->orderBy('id', $sort)->paginate(10);
            return view('page.completed', compact('projects'));
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }

    public function Pstore(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'project_handler' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tanggal_masuk_project' => 'required|date',
            'deadline' => 'required|date',
            'client_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        // dd($request);
        // Simpan data ke database
        Project::create([
            'project_name' => $request['project_name'],
            'category' => $request['category'],
            'project_handler' => $request['project_handler'],
            'status' => $request['status'],
            'tanggal_masuk_project' => $request['tanggal_masuk_project'],
            'deadline' => $request['deadline'],
            'client_name' => $request['client_name'],
            'company_name' => $request['company_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Project berhasil ditambahkan.');
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
            'project_handler' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tanggal_masuk_project' => 'required|date',
            'deadline' => 'required|date',
            'client_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $project->update($validatedData);

        // return response()->json(['success' => true]);
        if ($request->input('from') === 'onprogress') {
            return redirect()->route('project.onprogress')->with('success', 'Data berhasil diupdate.');
        } elseif ($request->input('from') === 'projectcompleted') {
            return redirect()->route('project.completed')->with('success', 'Data berhasil diupdate.');
        } else {
            return redirect()->route('dashboard')->with('success', 'Data berhasil diupdate.');
        }
    }

    public function Cedit($id)
    {
        // Ambil data klien berdasarkan ID
        $project = Project::findOrFail($id);
        $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
        $projects = Project::orderBy('id', $sort)->paginate(10);
        // Kembalikan view dengan data klien
        return view('dashboard', compact('project', 'projects'));
    }

    public function Cupdate(Request $request, Project $project)
    {
        // Validasi data permintaan
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'project_handler' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tanggal_masuk_project' => 'required|date',
            'deadline' => 'required|date',
            'client_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $project->update($validatedData);

        // return response()->json(['success' => true]);
        if ($request->input('from') === 'projectcompleted') {
            return redirect()->route('project.completed')->with('success', 'Data berhasil diupdate.');
        } else {
            return redirect()->route('dashboard')->with('success', 'Data berhasil diupdate.');
        }
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
        $projects = Project::where('project_name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('project_handler', 'LIKE', "%{$searchQuery}%")
            ->orWhere('category', 'LIKE', "%{$searchQuery}%")
            ->orWhere('client_name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('company_name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('email', 'LIKE', "%{$searchQuery}%")
            ->orWhere('phone', 'LIKE', "%{$searchQuery}%")
            ->orWhere('address', 'LIKE', "%{$searchQuery}%")
            ->paginate(50);

        // Tampilkan data pada view
        return view('dashboard', compact('projects'));
    }

    public function search4(Request $request)
    {
        // Deteksi apakah search berasal dari form
        if (!$request->has('search')) {
            // Jika tidak ada parameter `search`, redirect ke /
            return redirect('/');
        }

        // Ambil query pencarian
        $searchQuery = $request->input('search', '');

        // Query untuk mencari data
        $projects = Project::where('project_name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('category', 'LIKE', "%{$searchQuery}%")
            ->paginate(50);

        // Tampilkan data pada view
        return view('page.maintenance', compact('projects'));
    }

    public function search5(Request $request)
    {
        // Deteksi apakah search berasal dari form
        if (!$request->has('search')) {
            // Jika tidak ada parameter `search`, redirect ke /
            return redirect('/');
        }

        // Ambil query pencarian
        $searchQuery = $request->input('search', '');

        // Query untuk mencari data
        $projects = Project::where('project_name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('category', 'LIKE', "%{$searchQuery}%")
            ->orWhere('address', 'LIKE', "%{$searchQuery}%")
            ->orWhere('company_name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('email', 'LIKE', "%{$searchQuery}%")
            ->orWhere('phone', 'LIKE', "%{$searchQuery}%")
            ->paginate(50);

        // Tampilkan data pada view
        return view('page.onprogress', compact('projects'));
    }
}
