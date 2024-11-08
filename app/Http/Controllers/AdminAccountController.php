<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminAccountController extends Controller
{
    // Hanya Admin yang bisa akses controller ini
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    // Menampilkan form tambah akun
    public function showAddAccountForm()
    {
        return view('admin.add-account');
    }

    // Menyimpan akun staff baru
    public function addAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_photo_path' => 'nullable|string', // Aturan validasi untuk kolom profile_photo_path
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Semua akun yang dibuat akan menjadi staff/user
            'profile_photo_path' => null,
        ]);


        return redirect()->route('dashboard')->with('success', 'Akun staff berhasil ditambahkan.');
    }

    public function index()
    {
        // Ambil semua pengguna
        $users = User::all();

        return view('admin.management-account', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('account.management')->with('status', 'User deleted successfully');
    }
}
