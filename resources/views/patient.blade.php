<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap css -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- bootstrap js -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="margin: 20px">
  <div style="display: flex; justify-content: space-between; margin: 20px;">
    <a href="{{ route('hospital') }}" class="btn btn-primary">Hospital Table</a>
    <div class="dropdown show">
      <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filter
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" id="btn-dropdown" href="javascript:void(0)">Tampilkan semua</a>
        @foreach($hospitals as $dataHospitals)
          <a class="dropdown-item" id="btn-dropdown" href="javascript:void(0)" data-id="{{ $dataHospitals->id }}">{{ $dataHospitals->name }}</a>
        @endforeach
      </div>
    </div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="text-align: center">id</th>
        <th style="text-align: center">patient name</th>
        <th style="text-align: center">address</th>
        <th style="text-align: center">phone</th>
        <th style="text-align: center">hospital id</th>
        <th style="text-align: center">action</th>
      </tr>
    </thead>
    <tbody id='patient-table'>
      @foreach($patients as $data)
        <tr id="cell_{{ $data->id }}">
          <td style="text-align: center">{{ $data->id }}</td>
          <td style="text-align: center">{{ $data->name }}</td>
          <td style="text-align: center">{{ $data->address }}</td>
          <td style="text-align: center">{{ $data->phone }}</td>
          <td style="text-align: center">{{ $data->hospital_id }}</td>
          <td style="display:flex; gap:10px; justify-content: center">
            <a href="{{ route('patient.edit', ['id' => $data->id]) }}" class="btn btn-warning btn-sm">Update</a>
            <a href="javascript:void(0)" id='btn-delete' data-id="{{ $data->id }}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div style="display: flex; flex-direction: row-reverse; margin: 20px">
    <a href="{{ route("patient.create") }}" class="btn btn-success">
      New Data
    </a>
  </div>

  <script>
  // delete patient data
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

              url: `/patient/delete/${data_id}`,
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

  // filter patient data based on hospital
  $('body').on('click', '#btn-dropdown', function() {
    let data_id = $(this).data('id') || 0;
    let token   = $("meta[name='csrf-token']").attr("content");

    $.ajax({
      url: '/filter-patients',
      type: 'GET',
      cache: false,
      data: {
        "_token": token,
        "hospital_id": data_id,
      },
      success: function(response) {
        $('#patient-table').empty();

        $.each(response.patients, function(index, patient){

          var row = '<tr id="cell_' + patient.id + '">' +
                        '<td style="text-align: center">' + patient.id + '</td>' +
                        '<td style="text-align: center">' + patient.name + '</td>' +
                        '<td style="text-align: center">' + patient.address + '</td>' +
                        '<td style="text-align: center">' + patient.phone + '</td>' +
                        '<td style="text-align: center">' + patient.hospital_id + '</td>' +
                        '<td style="display:flex; gap:10px; justify-content: center">' +
                            '<a href="/patient/edit/"' + patient.id + '" class="btn btn-warning btn-sm">Update</a>' +
                            '<a href="javascript:void(0)" class="btn btn-danger btn-sm delete-btn" data-id="' + patient.id + '">Delete</a>' +
                        '</td>' +
                    '</tr>';
                    $('#patient-table').append(row);
        })
      }
    })
  })
  </script>
</body>
</html>