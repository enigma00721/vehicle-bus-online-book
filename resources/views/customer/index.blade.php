
@extends('layouts.customer')
@section('content') 

@include('admin.message')
<div class="content">
      <div class="container-fluid">
        <!-- <div class="card"> -->
        <div class="row">

            <div class="card col-md-10 mx-auto">
              <div class="card-header card-header-primary">
                <h4 class="card-title pull-right">Today is: 22-02-2021</h4>
                <h4 class="card-category">Your Profile </h4>
              </div>
              <div class="card-body">
                <form autocomplete="off" method="post" action="{{route('customer.update',$user->id)}}">
                 @csrf
                <div class="form-group mt-4">
                  <label for="name">Name</label>
                  <input name="name" type="text" class="form-control"  placeholder="Enter Name" value="{{$user->name}}">
                </div>
                <div class="form-group mt-4">
                  <label for="email">Email address</label>
                  <input name="email" type="email" class="form-control"  placeholder="Enter email" value="{{$user->email}}">
                </div>
                <div class="form-group mt-4 mb-4">
                  <label for="password">New Password</label>
                  <input name="password" id="password" type="password" class="form-control" placeholder="Enter New Password" value="">
                </div>
               

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
              </div>
            </div>
        </div>
      </div>
      <!-- </div> -->
</div>
@endsection

@section('script')
<script>
 
</script>
@endsection


