@extends('layouts.front')

@section('style')
    <style>
        .alert{
            position: absolute; 
            top: 80px; 
            color:#fff !important;
            right: 40px; 
            z-index: 1000;
        }
         .bus-image{
               max-height:210px !important;
         }
         .taglist {
            padding:0;
            padding-left:10px;
            display: inline;
            list-style: none;
         }

         .taglist li {
            display: inline;
         }

         .taglist li:after {
            content: " - ";
         }
         .taglist li:last-child:after {
            content: "";
         }
    </style>
@endsection

@section('content')

  <!-- flash messages -->
    @if(session()->has('msg'))
        <div class="alert alert-success alert-dismissible bg-primary" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success</strong> {{ session()->get('msg') }}
        </div>
    @endif
    @if(session()->has('error_msg'))
        <div class="alert alert-danger alert-dismissible bg-dagner" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> {{ session()->get('error_msg') }}
        </div>
    @endif
    <!-- flash messages end -->

      <div class="site-wrap" id="home-section">
         <div class="hero inner-page" style="background-image: url('{{asset('front-end/assets/images/hero_1_a.jpg')}}');">
            <div class="container">
               <!-- <div class="row align-items-end "> -->
               <div class="row align-items-end">
                  <div class="col-lg-5">
                     <h1><strong>Reserve Seat</strong></h1>
                     <div class="intro">
                        <div class="custom-breadcrumbs"><a href="{{route('front')}}">Home</a> <span class="mx-2">/</span> <strong>Reserve</strong></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
       
         <div class="site-section bg-light">
            <div class="container">

               <div class="row mb-5">
                  <div class="col-md-8">
                     <h2 class="section-heading"><strong>Book Your Seat</strong></h2>
                     <p class="section-heading"><strong>We Will Contact You Soon!</strong></p>

                     <div class="mt-4">
                        <form action="{{route('reserve.submit')}}" method="post">
                           @csrf
                           <input type="hidden" name="customer_id" value={{$user->id}}>
                           <input type="hidden" name="schedule_id" value={{$schedule->id}}>
                           <input type="hidden" name="bus_id" value={{$schedule->bus_id}}>
                           <div class="form-group row mb-4">
                              <div class="col-md-6 mb-4 mb-lg-0">
                                    <input name="name" type="text" class="form-control" placeholder="Full Name" value="{{$user->name}}" required>
                              </div>
                              <div class="col-md-6">
                                    <input name="email" type="email" class="form-control" 
                                    placeholder="Email Address" value="{{$user->email}}" required>
                              </div>
                           </div>
                           <div class="form-group row mb-4">
                              <div class="col-md-12">
                                    <input name="number" type="number" class="form-control" placeholder="Mobile Number" required>
                              </div>
                           </div>
                           <div class="form-group row mb-4">
                              <div class="col-md-12">
                                    <select name="seat_amount" class="form-control" required>
                                       <option readonly value="">Number Of Seats</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                    </select>
                              </div>
                           </div>
                           <div class="form-group row mt-4">
                              <div class="col-md-6 mr-auto">
                                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Submit">
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>

                   <div class="col-md-4">
                      <div class="listing d-block  align-items-stretch">
                              <div class="listing-img h-100 mr-4">
                                   <img src="{{asset('/bus_images/'.$schedule->bus->image)}}" alt="Image"
                               class="img-fluid bus-image" height="250px" width="310px">
                              </div>
                              <div class="listing-contents h-100">
                                 <h3>{{optional($schedule->bus)->bus_name}}</h3>
                                 <div class="rent-price">
                                    <span class="mx-1">Rs.</span>
                                    <strong>{{$schedule->price}}</strong>
                                 </div>
                                 <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                    <div class="listing-feature pr-4">
                                       <span class="pl-1"><i class="icon-map-marker"></i></span>
                                       <ul class="taglist">
                                          <li> {{$schedule->from}} </li>
                                          <li> {{$schedule->destination}} </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div>
                                    <h6>Pickup Address: <span>{{$schedule->pickup_address}}</span></h6>
                                    <h6>Dropoff Address: <span>{{$schedule->dropoff_address}}</span></h6>
                                 </div>
                                 <div class="border-bottom mb-2">
                                    <h6>Depart Time:  {{$schedule->departTime()}} </h6>
                                 </div>
                                 <div class="listing-contens">
                                    <h6> <strong>Available  Seats : {{$availableSeats}}</strong> </h6>
                                 </div>
                              </div>
                           </div>
               </div>
                 
               </div>

               <!-- <div class="row">
                  <div class="col-md-10 mb-5 mx-auto">
                     <form action="{{route('reserve.submit')}}" method="post">
                        @csrf
                        <input type="hidden" name="customer_id" value={{$user->id}}>
                        <input type="hidden" name="schedule_id" value={{$schedule->id}}>
                        <input type="hidden" name="bus_id" value={{$schedule->bus_id}}>
                        <div class="form-group row">
                           <div class="col-md-6 mb-4 mb-lg-0">
                                 <input name="name" type="text" class="form-control" placeholder="Full Name" value="{{$user->name}}" required>
                           </div>
                           <div class="col-md-6">
                                 <input name="email" type="email" class="form-control" 
                                 placeholder="Email Address" value="{{$user->email}}" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                                 <input name="number" type="number" class="form-control" placeholder="Mobile Number" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                                 <select name="seat_amount" class="form-control" required>
                                    <option readonly value="">Number Of Seats</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                 </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-6 mr-auto">
                                 <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Submit">
                           </div>
                        </div>
                     </form>
                  </div>
                  
               </div> -->

               <!-- <div class="col-md-4">
                      <div class="listing d-block  align-items-stretch">
                              <div class="listing-img h-100 mr-4">
                                   <img src="{{asset('/bus_images/'.$schedule->bus->image)}}" alt="Image"
                               class="img-fluid bus-image" height="250px" width="310px">
                              </div>
                              <div class="listing-contents h-100">
                                 <h3>{{optional($schedule->bus)->bus_name}}</h3>
                                 <div class="rent-price">
                                    <span class="mx-1">Rs.</span>
                                    <strong>{{$schedule->price}}</strong>
                                 </div>
                                 <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                    <div class="listing-feature pr-4">
                                       <span class="pl-1"><i class="icon-map-marker"></i></span>
                                       <ul class="taglist">
                                          <li> {{$schedule->from}} </li>
                                          <li> {{$schedule->destination}} </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div>
                                    <h6>Pickup Address: <span>{{$schedule->pickup_address}}</span></h6>
                                 </div>
                                 <div>
                                    <h6>Depart Time:  {{$schedule->departTime()}} </h6>
                                    <p class="mt-3"><a href="{{route('reserve',$schedule->id)}}" class="btn btn-primary btn-sm">Book Now</a></p>
                                 </div>
                              </div>
                           </div>
               </div> -->
                  <!--  -->
              
            </div>
         </div>
         

      </div>

@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
        

            $(".alert-success").fadeTo(5000, 500).slideUp(500, function(){
                $(".alert-success").slideUp(500);
            });

        });
    </script>
@endsection


