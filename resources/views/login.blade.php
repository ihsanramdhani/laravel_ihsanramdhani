<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.process') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input placeholder="insert: username" id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input placeholder="insert: password" id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}'); 
        </script>
    @endif
</body>
</html>
