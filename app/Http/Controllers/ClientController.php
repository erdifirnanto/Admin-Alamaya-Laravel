<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function Cstore(Request $request)
    {

        $request->validate([
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
            'client_name' => $request['client_name'],
            'company_name' => $request['company_name'],
            'pic_name' => $request['pic_name'],
            'product_category' => $request['product_category'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Akun staff berhasil ditambahkan.');
        // return redirect()->back()->with('success', 'Client has been added successfully');
    }
}
