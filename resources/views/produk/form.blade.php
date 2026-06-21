<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <b>Perhatian</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('produk/create') }}" method="POST">
            @csrf
            
            <div class="mb-3 row">
                <label for="kategori_produk" class="col-sm-2 col-form-label">Kategori Produk</label>
                <div class="col-sm-5">
                    <select name="kategori_produk" id="kategori_produk" class="form-control">
                        <option value="" @selected(old('kategori_produk') == '')>- Pilih Kategori Produk -</option>
                        <option value="Sepatu" @selected(old('kategori_produk') == 'Sepatu')>Sepatu</option>
                        <option value="Baju" @selected(old('kategori_produk') == 'Baju')>Baju</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-5">
                    <input value="{{ old('nama_produk') }}" type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-5">
                    <input value="{{ old('stok') }}" type="number" class="form-control" name="stok" id="stok" placeholder="Stok">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-5">
                    <input value="{{ old('harga_produk') }}" type="number" class="form-control" name="harga_produk" id="harga_produk" placeholder="Harga Produk">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </div>
</body>
</html>