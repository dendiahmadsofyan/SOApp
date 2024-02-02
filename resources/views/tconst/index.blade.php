<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Config</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Data Configurasi</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">RKey</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Updated Time</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tConsts as $tConst)
                    <tr>
                        <td>{{ $tConst->rkey }}</td>
                        <td>{{ $tConst->desc }}</td>
                        <td>{{ $tConst->status ? 'True' : 'False' }}</td>
                        <td>{{ $tConst->updtime }}</td>
                        <td>
                            <form action="{{ route('tconst.updateStatus', $tConst->rkey) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Toggle Status</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
