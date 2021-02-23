
@extends('layouts.header')
@section('content') 
<!-- <div class="navbar-wrapper">
<a class="navbar-brand text-black " href="#pablo">Bus List</a>
 </div> -->
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenteraddbus" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Region</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <h4 class="card-category"> Region List </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($region) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <th>ID</th>
                    <th>Region Name</th>
                    <th>Region Code</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $region as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td><a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$data->id}}"data-toggle="tooltip">{{ $data->region_name }}</a></td>
                        <td>{{ $data->region_code }}</td>
                        <td>
                          @if($data->status == 0)
                            <span class="badge badge-primary">Active</span>
                          @else
                            <span class="badge badge-danger">Inactive</span>
                          @endif
                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                         <button  class="btn btn-sm btn-primary border-white edit-region" >Edit
                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                           </button>
                            <form action="{{ route('region.destroy',  $data->id) }}" method="POST">
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
            @include('admin.regions.add-region')
            @include('admin.regions.edit-region')
@endsection



@section('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            // on button click
            $('.edit-region').on('click',function(){

               $('#editModalRegion').modal('show');


                $tr = $(this).closest('tr');

                // data cotains all td data from the colosed tr i.e selected row/tr
                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();

                console.log(data);          

                $('#id').val(data[0]);
                $('#region_name').val(data[1]);
                $('#region_code').val(data[2]);

                $('#updateRegionForm').on('submit',function(e){
                    e.preventDefault();
                    var id = $('#id').val();

                    console.log(id);

                    $.ajax({
                        type:'PUT',
                        url:"region/"+id,
                        data:$('#updateRegionForm').serialize(),

                        success:function(response){
                            
                            $('#editModalRegion').modal('hide');

                            var title = response.message

                            swal({
                              title: title,
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Okay'
                            }).then((result) => {
                              if (result) {
                                 window.location.reload();
                              }
                            })
                        },
                        error:function(xhr,status,error){
                          $.each(xhr.responseJSON.errors, function (key, item) 
                               {
                                 $("#errors").append("<li class='alert alert-danger'>"+item+"</li>")
                               });
                        }
                    });
                })
            });


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