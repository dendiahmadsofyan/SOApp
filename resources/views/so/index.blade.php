<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Detail SO</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
</head>
<body>

    <div class="container mt-5">
        <h6>ID SO : {{ $idSo ? $idSo->id_so : 'Tidak ada ID So yang aktif!' }} 
            @if ($idSo)
            <form action="{{ route('detail-so.updateSoStatus') }}" method="POST">
                @csrf()
                <input type="hidden" name="id_so" value="{{ $idSo->id_so }}" />
                <button class="btn btn-info" id="btnSoSelesai">Selesaikan Stock Opname!</button>
            </form>
            @endif
        </h6>
        <h2>Data Detail SO</h2>
        <table class="table table-bordered table-hover" id="detailSoTable">
            <thead>
                <tr>
                    <th scope="col">Barcode</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stock Awal</th>
                    <th scope="col">Qty Scan</th>
                    <th scope="col">Qty Adjust</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Waktu Scan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailSo as $item)
                    <tr>
                        <td>{{ $item->barcode }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->stock_awal }}</td>
                        <td>{{ $item->qty_scan }}</td>
                        <td>{{ $item->qty_adjust }}</td>
                        <td>{{ $item->nama_user }}</td>
                        <td>{{ $item->waktu_scan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#detailSoTable').DataTable({
                "searching": true,
                "paging": true,
            });
        });
        
        $(document).on('click', '#btnSoSelesai', function(e){
            return confirm("Apakah Anda yakin untuk menyelesaikan Stock Opname ini?");
        });
    </script>
</body>
</html>
