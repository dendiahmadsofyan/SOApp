<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Data Barang</h2>

        <table class="table table-hover" id="barangTable">
            <thead>
                <tr>
                    <th scope="col">Kode Item</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $item)
                    <tr>
                        <td>{{ $item->kode_item }}</td>
                        <td>{{ $item->barcode }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->qty }}</td>
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
            $('#barangTable').DataTable({
                "searching": true,
                "paging": true
            });
        });
    </script>
</body>
</html>
