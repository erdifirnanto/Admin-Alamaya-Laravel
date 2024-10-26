<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string',
            'company_name' => 'required|string',
            'pic_name' => 'required|string',
            'product_category' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        Client::create($validatedData);
        return redirect()->back()->with('success', 'Client has been added successfully');
    }
}
