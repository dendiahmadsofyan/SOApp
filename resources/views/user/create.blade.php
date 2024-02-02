<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>

    <div class="container mt-5">
        <h2>Register User</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
        // Tambahkan event listener untuk mematikan tombol submit jika form tidak valid
        $('#btnSubmit').click(function(event) {
            var username = $('#username').val();
            var namaUser = $('#nama_user').val();
            var password = $('#password').val();
            var confirmPassword = $('#password_confirmation').val();

            if (username === '' || namaUser === '' || password === '' || confirmPassword === '') {
                // Form tidak valid
                alert('Harap isi terlebih dahulu semua field.');
                event.preventDefault();
            } else if (password !== confirmPassword) {
                // Password dan password konfirmasi tidak sama
                alert('Password dengan password konfirmasi tidak sama!');
                event.preventDefault();
            }
        });
    });
    </script>
</body>
</html>
