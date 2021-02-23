
@extends('layouts.customer')


@section('content') 

@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <h4 class="card-category">Your Booking History</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($bookings) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <th>ID</th>
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
                            
                                <form action="{{ route('booking.destroy',  $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class=" delete-confirm btn btn-sm btn-danger"
                                    value="Cancel Booking" >  
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="mt-4 mb-4">
                        <h4>No History</h4>
                    </div>
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



<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        var form = event.target.form; // storing the form
        console.log(form);
        // const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'You Want To Cancel Booking. It will be Deleted!',
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