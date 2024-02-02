<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
</head>
<body>

    <div class="container mt-5">
        <h2>Data User</h2>

        <table class="table table-bordered table-hover" id="userTable">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Addtime</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->nama_user }}</td>
                        <td>{{ $user->addtime }}</td>
                        <td>
                            <a href="{{ route('user.delete', $user->id_user) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                            <a href="{{ route('user.resetPassword', $user->id_user) }}" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin mereset password user ini?')">Reset Password</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>
