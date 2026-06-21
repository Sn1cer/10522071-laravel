<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk', compact('produk'));
    }

    public function create()
    {
        return view('produk.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'kategori_produk' => 'required',
            'nama_produk'     => 'required|string|max:255', 
            'stok'            => 'required|integer|min:1',        
            'harga_produk'    => 'required|numeric|min:1000',
        ];
        $request->validate($rules);

        return view('produk.show', ['data' => $request->all()]); // tantangan 3
    }
}