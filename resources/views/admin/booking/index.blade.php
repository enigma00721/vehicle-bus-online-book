
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
                  <h4 class="card-category"> Booking List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($bookings) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <th>ID</th>
                    <th>Customer Name</th>
                    <th>Mobile Number</th>
                    <th>Bus Name</th>
                    <th>From</th>
                    <th>Destination</th>
                    <th>Departure</th>
                    <th>Seats</th>
                    <th>Sent At</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $bookings as $key => $data )
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ optional($data->user)->name}}</td>
                        <td>{{ $data->number }}</td>
                        <td>{{ optional($data->bus)->bus_name }}</td>
                        <td>{{ $data->schedule->from }}</td>
                        <td>{{ $data->schedule->destination }}</td>
                        <td>{{ $data->schedule->depart_date_time }}</td>
                        <td>{{ $data->seat_amount }}</td>

                        <td>{{ $data->created_at }}</td>
                        <td>
                          @if($data->status == 1)
                            <span class="badge badge-primary">Approved</span>
                          @else
                            <span class="badge badge-danger">Pending</span>
                          @endif
                        </td>
                        <td>
                          <a  class="btn btn-sm btn-primary text-white edit-booking" >
                            Edit
                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                           </a>
                           
                            <form action="{{ route('booking.destroy',  $data->id) }}" method="POST">
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

    @include('admin.booking.edit-modal')
@endsection


@section('script')


 <script>
    $(document).ready(function(){
        // on button click
        $('.edit-booking').on('click',function(){

            $('#editBookingModal').modal('show');

            $tr = $(this).closest('tr');

            // data cotains all td data from the colosed tr i.e selected row/tr
            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            console.log(data);          

            $('#id').val(data[0]);

            $('#updateBookingForm').on('submit',function(e){
                e.preventDefault();
                var id = $('#id').val();

                console.log(id);

                $.ajax({
                    type:'post',
                    url:"booking/"+id,
                    data:$('#updateBookingForm').serialize(),

                    success:function(response){
                        
                        $('#editBookingModal').modal('hide');

                        var title = response.message;
                        console.log(response);

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