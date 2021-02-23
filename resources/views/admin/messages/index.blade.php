
@extends('layouts.header')

@section('content') 

@include('admin.message')

  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
           
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <h4 class="card-category"> Contact Messages  </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($messages) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Sent Date</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $messages as $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->fullname() }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            {{$data->message}}
                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <form action="{{ route('message.destroy',  $data->id) }}" method="POST">
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
@endsection



@section('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   
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