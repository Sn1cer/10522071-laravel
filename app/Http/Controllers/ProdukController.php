<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        
        $data['produk'] = Produk::where(function($query) use ($q) {
            $query->where('kategori_produk', 'like', '%' . $q . '%');
            $query->orWhere('nama_produk', 'like', '%' . $q . '%');
            $query->orWhere('stok', 'like', '%' . $q . '%');
            $query->orWhere('harga_produk', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;

        return view('produk.list', $data);
    }

    public function create()
    {
        return view('produk.form');
    }

    public function store(Request $request) {
        $rules = [
            'kategori_produk' => 'required',
            'harga_produk' => 'required|numeric|min:1000'
        ];

        $request->validate($rules);
        Produk::create($request->all());

        return redirect('/produk')->with('success', 'Data berhasil disimpan');
    }
}