
@extends('layouts.header')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
@endsection

@section('content') 

@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenteraddbus" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Bus Schedule</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <h4 class="card-category"> Bus Schedule List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($schedules) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <th>ID</th>
                    <th>Bus Name</th>
                    <th>From</th>
                    <th>Destination</th>
                    <th>Departure Date</th>
                    <th>Pickup Address</th>
                    <th>Dropoff Address</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $schedules as $key => $data )
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ optional($data->bus)->bus_name}}</td>
                        <td>{{ $data->from }}</td>
                        <td>{{ $data->destination }}</td>
                        <td>{{ $data->depart_date_time }}</td>
                        <td>{{ $data->pickup_address }}</td>
                        <td>{{ $data->dropoff_address }}</td>
                        <td>{{ $data->price }}</td>
                        <td>
                          @if($data->status == 0)
                            <span class="badge badge-primary">Active</span>
                          @else
                            <span class="badge badge-danger">Inactive</span>
                          @endif
                        </td>
                        <td>
                          <a  class="btn btn-sm btn-primary border-white edit-schedule" href="{{route('bus-schedule.edit',$data->id)}}">Edit
                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                           </a>
                            <form action="{{ route('bus-schedule.destroy',  $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class=" delete-confirm btn btn-sm btn-danger"
                                value="Delete" >  
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              @endif 
                 </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('admin.bus_schedule.add-schedule')
@endsection


@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
         $(function () {
             $('#datetimepicker1').datetimepicker();
             $('#datetimepicker2').datetimepicker();
         });
</script>

<script type="text/javascript">
      $('.delete-confirm').on('click', function (event) {
          event.preventDefault();
          var form = event.target.form; // storing the form
          console.log(form);
          // const url = $(this).attr('href');
          swal({
              title: 'Are you sure?',
              text: 'This record will be permanantly deleted!',
              icon: 'warning',
              buttons: ["Cancel", "Yes!"],
          }).then(function(value) {
              if (value) {
                  form.submit(); 
              }
          });
      });
    </script>

@endsection