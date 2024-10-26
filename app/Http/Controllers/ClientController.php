<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'pic_name' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        // Simpan data ke database
        Client::create([
            'client_name' => $validatedData['client_name'],
            'company_name' => $validatedData['company_name'],
            'pic_name' => $validatedData['pic_name'],
            'product_category' => $validatedData['product_category'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Client has been added successfully');
    }
}
