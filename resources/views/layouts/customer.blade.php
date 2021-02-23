 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
     Material Dashboard 
   </title>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!-- CSS Files -->
   <!-- <link href="{{ asset('back-end/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" /> -->
   <link href="{{ asset('back-end/assets/css/material-dashboard.min.css')}}" rel="stylesheet" />
   <link href="{{ asset('back-end/assets/css/style.css')}}" rel="stylesheet" />
   <link href="{{ asset('back-end/assets/css/date-picker.css')}}" rel="stylesheet" />

   @yield('style')
 </head>
 
 <body class="">
   <div class="wrapper ">
     <div class="sidebar" data-color="purple" data-background-color="orange" data-image="{{asset('back-end/assets/img/sidebar-1.jpg')}}">
     
       <div class="logo">
         <a href="{{route('front')}}" class="simple-text logo-normal">
            Bus Booking System
         </a>
       </div>
<!--  -->
        <div class="sidebar-wrapper">
            <ul class="nav">
          
            <li class="nav-item {{request()->is('customer')?'active':''}}">
                <a class="nav-link" href="{{ route('profile',['id'=>auth()->user()->id]) }}">
                <i class="material-icons">person</i>
                <p>User Profile</p>
                </a>
            </li>

            <li class="nav-item {{request()->is('customer/history*')?'active':''}}">
                <a class="nav-link" href="{{route('customer.history')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Booking History</p>
                </a>
            </li>
           
          
            <li class="nav-item ">
                <a class="nav-link" href="#" 
                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <i class="material-icons">logout</i>
                Logout
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            
            </ul>
        </div>
      <!--  -->

     </div>
     <div class="main-panel">
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
         <div class="container-fluid">
           <div class="navbar-wrapper">
             <a class="navbar-brand" href="#pablo">Dashboard</a>
           </div>
           <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
             <span class="sr-only">Toggle navigation</span>
             <span class="navbar-toggler-icon icon-bar"></span>
             <span class="navbar-toggler-icon icon-bar"></span>
             <span class="navbar-toggler-icon icon-bar"></span>
           </button>
           <div class="collapse navbar-collapse justify-content-end">
           
             <ul class="navbar-nav">
            
               <li class="nav-item dropdown">
                 <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="material-icons">person</i>
                   <p class="d-lg-none d-md-block">
                     Account
                   </p>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                   <a class="dropdown-item" href="{{route('profile',auth()->user()->id)}}">Profile</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                       Logout
                   </a>    
                   <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                   </form>

                 </div>
               </li>
             </ul>
           </div>
         </div>
       </nav>
       <!-- End Navbar -->
       <div class="content">
            @yield('content')
       </div>
       <footer class="footer">
         <div class="container-fluid">
           <div class="copyright float-right">
             &copy;
             <script>
               document.write(new Date().getFullYear())
             </script>, made with <i class="material-icons">favorite</i> by
             <a href="https://www.creative-tim.com" target="_blank">Roshan Kumar Sah</a> for a better web.
           </div>
         </div>
       </footer>
     </div>
   </div>
  
   <!--   Core JS Files   -->
   <script src="{{asset('back-end/assets/js/core/jquery.min.js')}}"></script>
   <script src="{{asset('back-end/assets/js/core/popper.min.js')}}"></script>
   <script src="{{asset('back-end/assets/js/core/bootstrap-material-design.min.js')}}"></script>
   <script src="{{asset('back-end/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
   <!-- Plugin for the momentJs  -->
   <script src="{{asset('back-end/assets/js/plugins/moment.min.js')}}"></script>
   <!--  Plugin for Sweet Alert -->
   <!-- <script src="{{asset('back-end/assets/js/plugins/sweetalert2.js')}}"></script> -->
   <script type="text/javascript" src="{{asset('back-end/assets/js/sweet-alert.js')}}"></script>

   <!-- Forms Validations Plugin -->
   <script src="{{asset('back-end/assets/js/plugins/jquery.validate.min.js')}}"></script>
   <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
   <script src="{{asset('back-end/assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
   <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
   <script src="{{asset('back-end/assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
   <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
   <script src="{{asset('back-end/assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
   <script src="{{asset('back-end/assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
   <script src="{{asset('back-end/assets/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
  
 

@yield('script')

 </body>

 </html>
 