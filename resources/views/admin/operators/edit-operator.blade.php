
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
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <h4 class="card-category">Edit Bus Operator</h4>
                </div>
                <div class="card-body mt-4">

                <form method="post" enctype="multipart/form-data"
                action="{{route('operator.update',$operator->id)}}">

                @csrf
                @method('PUT')
                  
                    <div class="row mb-4">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="operator_name">Name</label>
                            <input required class="form-control" type="text" name="operator_name" value="{{$operator->operator_name}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="operator_email">Email</label>
                            <input required class="form-control" type="email" name="operator_email" value="{{$operator->operator_email}}">
                        </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="operator_phone">Phone Number</label>
                            <input required type="number" name="operator_phone" class="form-control"  value="{{$operator->operator_phone}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="operator_address">Address</label>
                            <input value="{{$operator->operator_address}}" required type="text" name="operator_address" class="form-control" "/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div >
                                <label class="control-label" for="image">New Image</label>
                                <br>
                                <input type="file" name="image"  >
                            </div>
                            <!-- <div class="form-group form-file-upload form-file-simple">
                                <input name="operator_logo" type="text" class="form-control inputFileVisible" placeholder="Simple chooser...">
                                <input type="file" class="inputFileHidden">
                            </div> -->
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
                        <input class="btn btn-primary" type="submit" value="Update Operator">
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

