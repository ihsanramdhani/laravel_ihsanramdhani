<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="margin: 20px">
<div style="display: flex; margin: 20px">
  <a href="{{ route('patient') }}" class="btn btn-primary">Patient Table</a>
</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="text-align: center">id</th>
        <th style="text-align: center">hospital name</th>
        <th style="text-align: center">address</th>
        <th style="text-align: center">email</th>
        <th style="text-align: center">phone</th>
        <th style="text-align: center">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($hospitals as $data)
        <tr id="cell_{{ $data->id }}">
          <td style="text-align: center">{{ $data->id }}</td>
          <td style="text-align: center">{{ $data->name }}</td>
          <td style="text-align: center">{{ $data->address }}</td>
          <td style="text-align: center">{{ $data->email }}</td>
          <td style="text-align: center">{{ $data->phone }}</td>
          <td style="display:flex; gap:10px; justify-content: center">
            <a href="{{ route('hospital.edit', ['id' => $data->id]) }}" class="btn btn-warning btn-sm">Update</a>
            <a href="javascript:void(0)" id='btn-delete' data-id="{{ $data->id }}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div style="display: flex; flex-direction: row-reverse; margin: 20px">
    <a href="{{ route("hospital.create") }}" class="btn btn-success">
      New Data
    </a>
  </div>

  <script>
  $('body').on('click', '#btn-delete', function () {

  let data_id = $(this).data('id');
  let token   = $("meta[name='csrf-token']").attr("content");

  Swal.fire({
      title: 'Are you sure?',
      text: "This data will be deleted",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'NO',
      confirmButtonText: 'YES'
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({

              url: `/hospital/delete/${data_id}`,
              type: "DELETE",
              cache: false,
              data: {
                  "_token": token
              },
              success:function(response){ 

                  Swal.fire({
                      type: 'success',
                      icon: 'success',
                      title: `${response.message}`,
                      showConfirmButton: false,
                      timer: 3000
                  });

                  $(`#cell_${data_id}`).remove();
              }
          });

          
      }
  })

  });
  </script>
</body>
</html>