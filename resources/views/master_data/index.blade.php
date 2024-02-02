<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data</title>
    <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
</head>
<body>
        <div class="container mt-5">
            <h2>Master Data</h2>
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
                <table class="table table-bordered table-hover" id="masterDataTable">
                    <thead>
                        @foreach ($masterData->first()->getAttributes() as $key => $value)
                            <td>{{ $key }}</td>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach ($masterData as $data)
                        <tr>
                            @foreach ($data->getAttributes() as $key => $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#masterDataTable').DataTable({
                "searching": true,
                "paging": true
            });
        });
    </script>
</body>
</html>
