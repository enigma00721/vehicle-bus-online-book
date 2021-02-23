
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
                  <h4 class="card-category">Edit Bus</h4>
                </div>
                <div class="card-body mt-4">

                <form method="post" enctype="multipart/form-data"
                action="{{route('bus.update',$bus->id)}}">

                @csrf
                @method('PUT')
                  
                    <div class="row mb-4">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="bus_name">Bus Name</label>
                            <input required class="form-control" type="text" name="bus_name" value="{{$bus->bus_name}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="bus_code">Bus Code</label>
                            <input required class="form-control" type="text" name="bus_code" value="{{$bus->bus_code}}">
                        </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                            <select name="operator_id" class="form-control">
                                <option value="" readonly>Select Operator</option>
                                @foreach($operators as $data)
                                    <option value="{{$data->id}}" {{$data->id==$bus->operator_id?'selected':''}} >
                                        {{$data->operator_name}}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="total_seats">Total Seats</label>
                            <input value="{{$bus->total_seats}}" required type="number" name="total_seats" class="form-control" "/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div >
                                <label class="control-label" for="imagefile">New Image</label>
                                <br>
                                <input type="file" name="imagefile"  >
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
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
                        <input class="btn btn-primary" type="submit" value="Update Bus">
                        <a href="{{route('operator.index')}}" class="btn btn-danger" type="submit" >Go Back</a>
                    </div>
                </form>   

                </div><!-- card body end-->
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

