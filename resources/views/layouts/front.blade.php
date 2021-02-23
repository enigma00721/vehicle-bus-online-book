<!doctype html>
<html lang="en">

<head>
    @include('partial.head')
    @yield('style')
</head>
<body>
<div class="site-wrap" id="home-section">


    @include('partial.navbar')

    
    @yield('content')

    
    @include('partial.footer')

</div>

@include('partial.script')

@yield('script')
</body>

</html>
