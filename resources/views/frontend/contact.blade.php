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
    </style>
@endsection

@section('content')

    <!-- flash messages -->
    @if(session()->has('msg'))
        <div class="alert alert-success alert-dismissible bg-primary" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Thank You!</strong> {{ session()->get('msg') }}
        </div>
    @endif
    @if(session()->has('error_msg'))
        <div class="alert alert-danger alert-dismissible bg-dagner" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error</strong> {{ session()->get('error_msg') }}
        </div>
    @endif
    <!-- flash messages end -->

    <div class="hero inner-page" style="background-image: url('{{asset('front-end/assets/images/hero_1_a.jpg')}} ');">
    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">
                <div class="intro">
                <h1><strong>Contact</strong></h1>
                <div class="custom-breadcrumbs"><a href="{{route('front')}}">Home</a> <span class="mx-2">/</span> <strong>Contact Us</strong></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2>Contact Us </h2>
                <p>We Will Get To You Soon!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-5">
                <form action="{{route('contact.submit')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <input name="firstname" type="text" class="form-control" placeholder="First name" required>
                        </div>
                        <div class="col-md-6">
                            <input name="lastname" type="text" class="form-control" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input name="email" type="email" class="form-control" placeholder="Email address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="message" id="" class="form-control" placeholder="Write your message." cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 ml-auto">
                <div class="bg-white p-3 p-md-5">
                <h3 class="text-black mb-4">Contact Info</h3>
                <ul class="list-unstyled footer-link">
                    <li class="d-block mb-3">
                        <span class="d-block text-black">Address:</span>
                        <span>Kathmandu Nepal</span>
                    </li>
                    <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>01-5827772 , 9854182659</span></li>
                    <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>info@onlinebusbook.com</span></li>
                </ul>
                </div>
            </div>
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




        
         