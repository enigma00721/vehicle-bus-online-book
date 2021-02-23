
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
                  <h4 class="card-category">Edit Bus Schedule List</h4>
                </div>
                <div class="card-body mt-4">

                <form method="post" action="{{route('bus-schedule.update',$schedule->id)}}">
                @csrf
                @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="from">Select Region From</label>
                            <select name="from" class="form-control" required>
                                <option readonly="readonly">Select Region From</option>
                                @foreach($regions as $data)
                                    <option value="{{$data->region_name}}" {{$data->region_name==$schedule->from?'selected':''}}>
                                         {{$data->region_name}}
                                     </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="destination">Select Destination</label>
                            <select name="destination" class="form-control" required>
                                <option readonly="readonly">Select Destination</option>
                                @foreach($regions as $data)
                                    <option value="{{$data->region_name}}" {{$data->region_name==$schedule->destination?'selected':''}}>
                                            {{$data->region_name}} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="bus_id">Select Bus</label>
                            <select name="bus_id" class="form-control" required>
                                <option readonly="readonly">Select Bus</option>
                                @foreach($buses as $data)
                                    <option value="{{$data->id}}" {{$data->id==$schedule->bus_id?'selected':''}} >
                                        {{$data->bus_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="operator_id">Select Operator</label>
                            <select name="operator_id" class="form-control" required>
                                <option readonly="readonly">Select Operator</option>
                                @foreach($operators as $data)
                                    <option value="{{$data->id}}" {{$data->id==$schedule->operator_id?'selected':''}}>
                                         {{$data->operator_name}} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- row end -->

                    <div class="row mb-4">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="pickup_address">Pickup Address</label>
                            <input required class="form-control" type="text" name="pickup_address" value="{{$schedule->pickup_address}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="dropoff_address">Dropoff Address</label>
                            <input required class="form-control" type="text" name="dropoff_address" value="{{$schedule->dropoff_address}}">
                        </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="depart_date_time">Departure DateTime</label>
                            <input required type="text" name="depart_date_time" class="form-control datetimepicker"  id="datetimepicker1" value="{{$schedule->depart_date_time}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="return_date_time">Return DateTime</label>
                            <input value="{{$schedule->return_date_time}}" required type="text" name="return_date_time" class="form-control datetimepicker"  id="datetimepicker2" value="{{$schedule->return_date_time}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input required type="number" name="price" class="form-control" value="{{$schedule->price}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"  
                                            name="status" checked>Active
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input class="btn btn-primary" type="submit" value="Update Schedule">
                        <a href="{{route('bus-schedule.index')}}" class="btn btn-danger" type="submit" >Go Back</a>
                    </div>
                </form>   

                </div><!-- card body end-->
              </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script type="text/javascript">
         $(function () {
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker();
         });
</script>

@endsection