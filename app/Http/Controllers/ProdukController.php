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

    public function store(Request $request, Produk $produk = null) {
        $rules = [
            'kategori_produk' => 'required',
            'nama_produk'     => 'required|string|max:255', 
            'stok'            => 'required|integer|min:1',  
            'harga_produk'    => 'required|numeric|min:1000',
        ];

        $input = $request->all();

        // Mengecek apakah ada file foto_produk yang diunggah
        if ($request->hasFile('foto_produk')) {
            // Mengambil nama asli file
            $fileName = $request->foto_produk->getClientOriginalName();
            // Menyimpan file ke storage (storage/app/produk)
            $request->foto_produk->storeAs('public/produk', $fileName);
            // Menambahkan nama file ke dalam array input untuk disimpan ke database
            $input['foto_produk'] = $fileName;
        }

        $request->validate($rules);

        // Menggunakan variabel $input alih-alih $request->all()
        Produk::updateOrCreate(['id' => @$produk->id], $input);

        return redirect('/produk')->with('success', 'Data berhasil disimpan');
    }
    
    public function edit(Produk $produk)
    {
        return view('produk.form', compact('produk'));
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('/produk')->with('success', 'Data berhasil dihapus');
    }
}