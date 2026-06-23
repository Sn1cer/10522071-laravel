<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<main style="margin-top: 70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <h2>Data Pelanggan</h2>
                <hr>
            </div>
            
            <div class="col-lg-4 mb-2">
                <form action="" method="GET" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Cari pelanggan..." value="{{@$q}}">
                    </div>
                </form>
            </div>
            
            @if(session('success'))
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('pelanggan/create') }}" class="btn btn-primary">Tambah Pelanggan</a>
            </div>
            
            <div class="col-lg-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Kelamin</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $item->foto_pelanggan }}" alt="Foto Pelanggan" width="80px" class="img-thumbnail" />
                            </td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>{{ $item->alamat_email }}</td>
                            <td> 
                                <a class="btn btn-warning btn-sm" href="{{ route('pelanggan.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="d-inline formDelete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    {!! $pelanggan->withQueryString()->links('pagination::bootstrap-5') !!}
    
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   $(() => {
       $("body").on("click", ".formDelete", (el) => {
          el.preventDefault();

          Swal.fire({
              title: 'Perhatian',
              text: "Apakah anda yakin ingin menghapus data pelanggan ini?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Ya, Hapus!',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if(result.isConfirmed) $(el.currentTarget).submit();
          })
      })
   })
</script>
</body>
</html>