<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Initial</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
</head>
<body>

    <div class="container mt-5">
        <h2>Data Initial</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-hover" id="table-initial">
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Addtime</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($initials as $initial)
                    <tr>
                        <td>{{ $initial->tanggal }}</td>
                        <td>{{ $initial->username }}</td>
                        <td>{{ $initial->nama_user }}</td>
                        <td>{{ $initial->status ? 'True' : 'False' }}</td>
                        <td>{{ $initial->addtime }}</td>
                        <td>
                            <form action="{{ route('initial.updateStatus', $initial->id_initial_so) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Toggle Status</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#table-initial').DataTable();
        });
    </script>
</body>

</html>
