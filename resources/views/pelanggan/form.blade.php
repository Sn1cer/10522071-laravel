<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah/Edit Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Data Pelanggan</h2>
        <hr>

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
        
        <form action="{{ url('pelanggan/create', @$pelanggan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3 row">
                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-5">
                    <input value="{{ old('nama_lengkap', @$pelanggan->nama_lengkap) }}" type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">- Pilih Jenis Kelamin -</option>
                        <option @selected(old('jenis_kelamin', @$pelanggan->jenis_kelamin) == 'Laki-laki') value="Laki-laki">Laki-laki</option>
                        <option @selected(old('jenis_kelamin', @$pelanggan->jenis_kelamin) == 'Perempuan') value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nomor_hp" class="col-sm-2 col-form-label">No. HP</label>
                <div class="col-sm-5">
                    <input value="{{ old('nomor_hp', @$pelanggan->nomor_hp) }}" type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Contoh: 08123456789">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="alamat_email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input value="{{ old('alamat_email', @$pelanggan->alamat_email) }}" type="email" class="form-control" name="alamat_email" id="alamat_email" placeholder="contoh@email.com">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="foto_pelanggan" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-5">
                    @if(@$pelanggan->foto_pelanggan)
                        <div class="mb-2">
                            <img src="{{ $pelanggan->foto_pelanggan }}" alt="Foto Pelanggan" class="img-thumbnail" width="150px">
                            <br>
                            <small class="text-muted">Foto saat ini</small>
                        </div>
                    @endif
                    <input type="file" class="form-control" name="foto_pelanggan" id="foto_pelanggan">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/pelanggan') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>