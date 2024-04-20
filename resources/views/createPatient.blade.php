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
          <div class="card-header">Create New Patient Data</div>
          <div class="card-body">
            <form method="POST" action="{{ route('patient.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="hospital_id">Hospital Id</label>
                    <input id="hospital_id" type="text" class="form-control" name="hospital_id" value="{{ old('phone') }}" required autofocus>
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