
@extends('layouts.header')
@section('content') 
<!-- <div class="navbar-wrapper">
<a class="navbar-brand text-black " href="#pablo">Bus List</a>
 </div> -->
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div id="errors"></div>
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenteraddbus" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Bus</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <h4 class="card-category"> Bus List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($buses) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <th>ID</th>
                      <th style="display: none;">Operator Id</th>
                    <th>Bus Name</th>
                    <th>Bus Code</th>
                    <th>Total Seats</th>
                    <th>Bus Operator</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $buses as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td style="display: none;">{{$data->operator_id}}</td>
                        <td>
                         {{ $data->bus_name }}
                        </td>
                        <td>{{ $data->bus_code }}</td>
                        <td>{{ $data->total_seats }}</td>
                        <td>{{ optional($data->operator)->operator_name }}</td>
                        <td>
                          <img width="120px" height="100px" style="object-fit:cover;" src="{{asset('/bus_images/'.$data->image)}}" alt="NO Image">
                        </td>
                        <td>
                           @if($data->status == 0)
                          <span class="badge badge-primary">Active</span>
                          @else
                          <span class="badge badge-danger">Inactive</span>
                          @endif
                        </td>
                        <td>
                        
                          <a class="btn btn-sm btn-primary border-white edit-bus" 
                             href="{{route('bus.edit',$data->id)}}">
                           Edit
                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                          </a>
                            <form action="{{ route('bus.destroy',  $data->id) }}" method="POST">
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
            @include('admin.buses.add-bus')
@endsection

@section('script')

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