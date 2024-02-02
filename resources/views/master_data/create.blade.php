<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Master Barang</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Master Data</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('master_data.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="kode_item">Kode Item</label>
                                <input type="text" name="kode_item" class="form-control @error('kode_item') is-invalid @enderror" value="{{ old('kode_item') }}" required>
                                @error('kode_item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" value="{{ old('barcode') }}" required>
                                @error('barcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_item">Nama Item</label>
                                <input type="text" name="nama_item" class="form-control @error('nama_item') is-invalid @enderror" value="{{ old('nama_item') }}" required>
                                @error('nama_item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" value="{{ old('jenis') }}">
                                @error('jenis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan') }}">
                                @error('satuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="merek">Merek</label>
                                <input type="text" name="merek" class="form-control @error('merek') is-invalid @enderror" value="{{ old('merek') }}">
                                @error('merek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="satuan_dasar">Satuan Dasar</label>
                                <input type="text" name="satuan_dasar" class="form-control @error('satuan_dasar') is-invalid @enderror" value="{{ old('satuan_dasar') }}">
                                @error('satuan_dasar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="konversi_satuan_dasar">Konversi Satuan Dasar</label>
                                <input type="number" name="konversi_satuan_dasar" class="form-control @error('konversi_satuan_dasar') is-invalid @enderror" value="{{ old('konversi_satuan_dasar') }}">
                                @error('konversi_satuan_dasar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga_pokok">Harga Pokok</label>
                                <input type="number" name="harga_pokok" class="form-control @error('harga_pokok') is-invalid @enderror" value="{{ old('harga_pokok') }}">
                                @error('harga_pokok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" value="{{ old('harga_jual') }}">
                                @error('harga_jual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stok_minimum">Stok Minimum</label>
                                <input type="number" name="stok_minimum" class="form-control @error('stok_minimum') is-invalid @enderror" value="{{ old('stok_minimum') }}">
                                @error('stok_minimum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipe_item">Tipe Item</label>
                                <input type="number" name="tipe_item" class="form-control @error('tipe_item') is-invalid @enderror" value="{{ old('tipe_item') }}">
                                @error('tipe_item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="menggunakan_serial">Menggunakan Serial</label>
                                <input type="text" name="menggunakan_serial" class="form-control @error('menggunakan_serial') is-invalid @enderror" value="{{ old('menggunakan_serial') }}">
                                @error('menggunakan_serial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rak">Rak</label>
                                <input type="text" name="rak" class="form-control @error('rak') is-invalid @enderror" value="{{ old('rak') }}">
                                @error('rak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode_gudang_kantor">Kode Gudang Kantor</label>
                                <input type="text" name="kode_gudang_kantor" class="form-control @error('kode_gudang_kantor') is-invalid @enderror" value="{{ old('kode_gudang_kantor') }}">
                                @error('kode_gudang_kantor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode_supplier">Kode Supplier</label>
                                <input type="text" name="kode_supplier" class="form-control @error('kode_supplier') is-invalid @enderror" value="{{ old('kode_supplier') }}">
                                @error('kode_supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>