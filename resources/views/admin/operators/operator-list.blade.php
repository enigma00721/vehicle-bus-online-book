@extends('layouts.header')

@section('content') 

@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#addOperatorModal" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Operator</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <h4 class="card-category">Operators List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($operators) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <th>ID</th>
                    <th>Operator Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $operators as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td><a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$data->operator_id}}"data-toggle="tooltip">{{ $data->operator_name }}</a></td>
                        <td>{{ $data->operator_email }}</td>
                        <td>{{ $data->operator_phone }}</td>
                        <td>{{ $data->operator_address }}</td>
                        <td>
                          <img width="120px" height="100px" style="object-fit:cover;" src="{{asset('/operator_images/'.$data->operator_logo)}}">
                        </td>
                         <td>
                           @if($data->status == 0)
                          <span class="badge badge-primary">Active</span>
                          @else
                          <span class="badge badge-danger">Inactive</span>
                          @endif
                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                           <a class="btn btn-sm btn-primary border-white edit-operator" 
                             href="{{route('operator.edit',$data->id)}}">
                           Edit
                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                           </a>
                            <form action="{{ route('operator.destroy',  $data->id) }}" 
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="delete-confirm btn btn-sm btn-danger"
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
            @include('admin.operators.add-operator')
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