<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<main style="margin-top: 70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-2">
                <form action="" method="GET" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="cari" value="{{@$q}}">
                    </div>
                </form>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('produk/create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Produk</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Harga Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kategori_produk }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>Rp{{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! $produk->withQueryString()->links('pagination::bootstrap-5') !!}
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>