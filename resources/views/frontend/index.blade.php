@extends('layouts.front')

@section('content')

    <!-- navbar body form main section -->
    <div class="hero" style="background-image: url('{{asset('front-end/assets/images/hero_1_a.jpg')}} ');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-5">
                        <div class="col-lg-7 intro">
                            <h1><strong>Book your Vehicle</strong>  within your finger tips.</h1>
                        </div>
                    </div>
                    <form class="trip-form" method="get" action="{{route('listing')}}">
                        <div class="row align-items-center">
                            <div class="mb-3 mb-md-0 col-md-3">
                                <select name="from" id="" class="custom-select form-control" required>
                                    <option readonly value="">Travelling From</option>
                                    @foreach($regions as $data)
                                        <option value="{{$data->region_name}}"> {{$data->region_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mb-md-0 col-md-3">
                                <div class="form-control-wrap">
                                    <select name="destination"  class="custom-select form-control" required>
                                    <option readonly value="">Destination</option>
                                    @foreach($regions as $data)
                                        <option value="{{$data->region_name}}"> {{$data->region_name}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 mb-md-0 col-md-3">
                                <div class="form-control-wrap">
                                    <input type="text" name="depart_date" id="datepicker" required 
                                        placeholder="Departure Date" class="form-control datepicker" >
                                    <span class="icon icon-date_range"></span>
                                </div>
                            </div>
                            <div class="mb-3 mb-md-0 col-md-3">
                                <input type="submit" value="Search" class="btn btn-primary btn-block py-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar body form main section end-->


    <!-- how it works section -->
    <div class="site-section">
        <div class="container">
            <h2 class="section-heading"><strong>How it works?</strong></h2>
            <p class="mb-5">Easy steps to get you started</p>
            <div class="row mb-5">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="step">
                        <span>1</span>
                        <div class="step-inner">
                            <span class="number text-primary">01.</span>
                            <h3>Select Your Bus</h3>
                            <p>From Bus Schedules you can select when and where you want to travel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="step">
                        <span>2</span>
                        <div class="step-inner">
                            <span class="number text-primary">02.</span>
                            <h3>Reserve Seat</h3>
                            <p>You can reserve as many seats as you want online from anywhere!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="step">
                        <span>3</span>
                        <div class="step-inner">
                            <span class="number text-primary">03.</span>
                            <h3>Payment</h3>
                            <p>Payment is made when customer boards the bus with online ticket proof!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- how it works section end -->


    <!-- mission section -->
    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center order-lg-2">
                    <div class="img-wrap-1 mb-5">
                        <img src="{{asset('front-end/assets/images/bus_5.jpg')}}" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4 ml-auto order-lg-1">
                    <h3 class="mb-4 section-heading"><strong>Our Mission</strong></h3>
                    <p class="mb-5">
                        Our Company ensures the tickets booking accessible to passengers at 
                        transparent prices with no booking charges. Passengers can get the
                         most accurate real time data of bus seat availability from among the
                          list of operators.
                    <p><a href="{{route('schedules')}}" class="btn btn-primary">See Schedules</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- mission section end -->


    <!-- testimonials section -->
    <div class="site-section bg-light">
        <div class="container">

            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Testimonials</strong></h2>
                    <p class="mb-5">Reviews from our regular and satisfied customers.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>
                                "This is a great site I came across.I have been using
                                 this system for bus booking and  we are planning to go ahead
                                  with this service."
                            </p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{asset('front-end/assets/images/person_1.jpg')}}" alt="Image" class="img-fluid mr-3">
                            <div class="author-name">
                                <span class="d-block">Pawan Maharjan</span>
                                <span>Customer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>
                                " We want to express our great satisfaction with 
                                the travel experience .This trip was indeed comfortable and   
                                 delightful experience. "
                            </p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{asset('front-end/assets/images/person_3.jpg')}}" alt="Image" class="img-fluid mr-3">
                            <div class="author-name">
                                <span class="d-block">Ravi Jung Karki</span>
                                <span>Customer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>
                                "This is a great site I came across.I have been using
                                 this system for bus booking and  we are planning to go ahead
                                  with this service."
                            </p>
                                
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{asset('front-end/assets/images/person_2.jpg')}}" alt="Image" class="img-fluid mr-3">
                            <div class="author-name">
                                <span class="d-block">Vanu Shrestha</span>
                                <span>Traveler</span>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- testimonials section end -->


    <!-- what are you waiting for section -->
    <div class="site-section bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-md-0">
                    <h2 class="mb-0 text-white">What are you waiting for?</h2>
                    <p class="mb-0 opa-7">
                        To find out more on how to book tickets , Click here.
                    </p>
                </div>
                <div class="col-lg-5 text-md-right">
                    <a href="{{route('schedules')}}" class="btn btn-primary btn-white">Reserve Bus Now</a>
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