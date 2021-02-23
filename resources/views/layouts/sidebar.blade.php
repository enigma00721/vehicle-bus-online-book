<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{request()->is('home*')?'active':''}}">
        <a class="nav-link" href="{{route('home')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{request()->is('profile*')?'active':''}}">
        <a class="nav-link" href="{{ route('profile',['id'=>auth()->user()->id]) }}">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item {{request()->is('operator*')?'active':''}}">
      <a class="nav-link" href="{{route('operator.index')}}">
          <i class="material-icons">content_paste</i>
          <p>Operators List</p>
        </a>
      </li>
      <li class="nav-item {{request()->is('bus')?'active':''}}">
        <a class="nav-link" href="{{route('bus.index')}}">
          <i class="material-icons">library_books</i>
          <p>Buses List</p>
        </a>
      </li>
      <li class="nav-item {{request()->is('region*')?'active':''}}">
        <a class="nav-link" href="{{route('region.index')}}">
          <i class="material-icons">bubble_chart</i>
          <p>Region List</p>
        </a>
      </li>
      <li class="nav-item {{request()->is('bus-schedule*')?'active':''}}">
        <a class="nav-link" href="{{route('bus-schedule.index')}}">
          <i class="material-icons">location_ons</i>
          <p>Bus Schedule List</p>
        </a>
      </li>
      <li class="nav-item {{request()->is('booking*')?'active':''}}">
        <a class="nav-link" href="{{route('booking.index')}}">
          <i class="material-icons">notifications</i>
          <p>Booking</p>
        </a>
      </li>
      <li class="nav-item {{request()->is('messages*')?'active':''}}">
        <a class="nav-link" href="{{route('messages')}}">
          <i class="material-icons">notifications</i>
          <p>Message</p>
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