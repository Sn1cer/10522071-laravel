<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori; 

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        
        $data['produk'] = Produk::where(function($query) use ($q) {
            if ($q) {
                $query->whereAny(['nama_produk', 'stok', 'harga_produk'], 'LIKE', '%' . $q . '%');
                $query->orWhereHas('kategori', function ($queryKategori) use ($q) {
                    $queryKategori->where('nama_kategori', 'LIKE', '%' . $q . '%');
                });
            }
        })->paginate();

        $data['q'] = $q;

        return view('produk.list', $data);
    }

    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('produk.form', $data);
    }

    public function store(Request $request, Produk $produk = null) {
        $rules = [
            'id_kategori_produk' => 'required', 
            'nama_produk'        => 'required|string|max:255', 
            'stok'               => 'required|integer|min:1',  
            'harga_produk'       => 'required|numeric|min:1000',
            'foto_produk'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];

        $request->validate($rules);

        $input = $request->all();

        if ($request->hasFile('foto_produk')) {
            $fileName = $request->foto_produk->getClientOriginalName();
            $request->foto_produk->storeAs('public/produk', $fileName);
            $input['foto_produk'] = $fileName;
        }

        Produk::updateOrCreate(['id' => @$produk->id], $input);

        return redirect('/produk')->with('success', 'Data berhasil disimpan');
    }
    
    public function edit(Produk $produk)
    {
        $data['kategori'] = Kategori::all();
        $data['produk'] = $produk;
        return view('produk.form', $data);
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('/produk')->with('success', 'Data berhasil dihapus');
    }
}