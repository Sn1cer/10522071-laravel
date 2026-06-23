<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        
        // SESUAIKAN NAMA KOLOM DISINI
        $data['pelanggan'] = Pelanggan::where(function($query) use ($q) {
            $query->where('nama_lengkap', 'like', '%' . $q . '%')
                  ->orWhere('nomor_hp', 'like', '%' . $q . '%')
                  ->orWhere('alamat_email', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;

        return view('pelanggan.list', $data); 
    }

    public function create()
    {
        return view('pelanggan.form'); 
    }

    public function store(Request $request, Pelanggan $pelanggan = null) 
    {
        // SESUAIKAN NAMA FIELD VALIDASI
        $rules = [
            'nama_lengkap'   => 'required|string|max:150',
            'jenis_kelamin'  => 'required',
            'nomor_hp'       => 'required|string|max:20',
            'alamat_email'   => 'required|string|email|max:100', // Karena tipe unik email
            'foto_pelanggan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];

        $input = $request->all();

        if ($request->hasFile('foto_pelanggan')) {
            $fileName = $request->foto_pelanggan->getClientOriginalName();
            $request->foto_pelanggan->storeAs('public/pelanggan', $fileName);
            $input['foto_pelanggan'] = $fileName;
        }

        $request->validate($rules);

        Pelanggan::updateOrCreate(['id' => @$pelanggan->id], $input);

        return redirect('/pelanggan')->with('success', 'Data Pelanggan berhasil disimpan');
    }
    
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.form', compact('pelanggan'));
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('/pelanggan')->with('success', 'Data Pelanggan berhasil dihapus');
    }
}