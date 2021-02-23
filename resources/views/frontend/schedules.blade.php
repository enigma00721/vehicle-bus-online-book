@extends('layouts.front')

@section('style')
<style>
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
    .alert{
            position: absolute; 
            top: 80px; 
            color:#fff !important;
            right: 40px; 
            z-index: 1000;
        }
</style>
@endsection

@section('content')
@include('admin.message')

      <div class="site-wrap" id="home-section">

      
         <div class="hero inner-page" style="background-image: url('{{asset('front-end/assets/images/hero_1_a.jpg')}}');">
            <div class="container">
               <div class="row align-items-end ">
                  <div class="col-lg-5">
                     <div class="intro">
                        <h1><strong>Bus Schedules</strong></h1>
                        <div class="custom-breadcrumbs"><a href="{{route('schedules')}}">Home</a> <span class="mx-2">/</span> <strong>Schedules</strong></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
       
         <div class="site-section bg-light">
            <div class="container">
               <div class="row mb-5">
                  <div class="col-lg-7">
                     <h2 class="section-heading"><strong>Recent Bus Schedules</strong></h2>
                  </div>
               </div>
               <div class="row">
                  @foreach($schedules as $data)
                     <div class="col-md-6 col-lg-4 mb-4">
                        <div class="listing d-block  align-items-stretch">
                           <div class="listing-img h-100 mr-4">
                              <img src="{{asset('/bus_images/'.$data->bus->image)}}" alt="Image"
                               class="img-fluid bus-image" height="250px" width="310px">
                           </div>
                           <div class="listing-contents h-100">
                              <h3>{{optional($data->bus)->bus_name}}</h3>
                              <div class="rent-price mb-2">
                                 <strong><span class="mx-1">Rs.</span> {{$data->price}} </strong>
                              </div>
                              <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                 <div class="listing-feature pr-4">
                                    <span class="pl-1"><i class="icon-map-marker"></i></span>
                                    <ul class="taglist">
                                       <li> {{$data->from}} </li>
                                       <li> {{$data->destination}} </li>
                                    </ul>
                                 </div>
                              </div>
                              <div>
                                 <h6>Pickup Address: <span>{{$data->pickup_address}}</span></h6>
                              </div>
                              <div>
                                 <h6>Depart Time:  {{$data->departTime()}} </h6>
                                 <p class="mt-3"><a href="{{route('reserve',$data->id)}}" class="btn btn-primary btn-sm">Book Now</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
                
               </div>
               <div class="row" style="justify-content:center;">
                  {{$schedules->links()}}
               </div>
               
            </div>
         </div>
         

      </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {   

            $('#datepicker').datepicker({
                format: "yyyy/dd/mm",
                autoclose: true,
            }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

        });      
    </script>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
        
            $(".alert-info").fadeTo(5000, 500).slideUp(500, function(){
                $(".alert-info").slideUp(500);
            });
            $(".alert-danger").fadeTo(5000, 500).slideUp(500, function(){
                $(".alert-danger").slideUp(500);
            });

        });
    </script>
@endsection
