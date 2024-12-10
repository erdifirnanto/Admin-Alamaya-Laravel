<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Client;
use App\Models\Project;
use App\Models\User;

class RoleController extends Controller
{
    // Fungsi untuk halaman khusus Admin
    public function Dashboard()
    {
        $sort = request('sort', 'desc');
        $projects = Project::orderBy('id', $sort)->paginate(10);
        $users = User::select('name')->get();
        return view('dashboard', compact('projects', 'users'));
    }
}
