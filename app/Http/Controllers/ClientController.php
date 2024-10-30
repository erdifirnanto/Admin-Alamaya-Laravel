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

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['success' => true]);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs provided.']);
        }

        Client::whereIn('id', $ids)->delete();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        // Ambil data klien berdasarkan ID
        $client = Client::findOrFail($id);
        $sort = request('sort', 'desc'); // Default ke 'desc' jika tidak ada parameter sort
        $clients = Client::orderBy('id', $sort)->paginate(10);
        // Kembalikan view dengan data klien
        return view('dashboard', compact('client', 'clients'));
    }

    public function update(Request $request, Client $client)
    {
        // Validasi data permintaan
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'pic_name' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Perbarui klien dengan data yang sudah divalidasi
        $client->update($validatedData);

        // Kembalikan respons (bisa berupa redirect, respons JSON, dll.)
        // return response()->json(['success' => true]);
        return redirect()->route('dashboard')->with('success', 'Data berhasil diupdate.');
    }
}
