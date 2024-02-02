<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload Master Stock dan Barang</title>
        <link href="{{ asset('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
                margin: 20px;
            }

            .container {
                max-width: 500px;
                margin: auto;
            }

            .form-container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            
            .mb-4{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Import Data to Master Data Table</div>

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

                            <form action="{{ route('master_data.import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="file">Choose Excel File:</label>
                                    <input type="file" name="file" class="form-control" accept=".xls, .xlsx" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Import Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
