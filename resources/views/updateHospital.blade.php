<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Hospital Data</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('hospital.update', ['id' => $data->id]) }}">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input id="address" type="text" class="form-control" name="address" value="{{ $data->address }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $data->phone }}" required autofocus>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>