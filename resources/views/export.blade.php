<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="mb-3">
        <h2>Export Data</h2>
    </div>

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered table-hover" id="masterSoTable">
        <thead>
            <tr>
                <th scope="col">ID SO</th>
                <th scope="col">Tanggal SO</th>
                <th scope="col">Status</th>
                <th scope="col">Mulai SO</th>
                <th scope="col">Selesai SO</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masterSo as $data)
                <tr>
                    <td>{{ $data->id_so }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->status ? 'Selesai' : 'Belum Selesai' }}</td>
                    <td>{{ $data->mulai }}</td>
                    <td>{{ $data->selesai }}</td>
                    <td>
                        <form action="{{ url('/export/final') }}" method="post">
                            @csrf
                            <input type="hidden" name="idSo" value="{{ $data->id_so }}" />
                            <button type="submit" class="btn btn-success mb-2">Export Data Final</button>
                        </form>

                        <form action="{{ url('/export/selisih') }}" method="post">
                            @csrf
                            <input type="hidden" name="idSo" value="{{ $data->id_so }}" />
                            <button type="submit" class="btn btn-warning">Export Data Selisih</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script>
        $(document).ready(function() {
            $('#masterSoTable').DataTable();
        });
    </script>
</body>
</html>