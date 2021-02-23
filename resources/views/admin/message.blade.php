@if ( Session::has('msg') )
<div class="alert alert-info alert-dismissible">
	 <p >{{ Session::get('msg') }}</p>
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   		 <span aria-hidden="true">&times;</span>
  		</button>
</div>
@endif
@if ( Session::has('error_msg') )
<div class="alert alert-danger alert-dismissible">
	 <p >{{ Session::get('error_msg') }}</p>
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   		 <span aria-hidden="true">&times;</span>
  		</button>
</div>
@endif

          @if ( count($errors) > 0 ) 
            @foreach ( $errors->all() as $error ) 
			<div class="alert alert-danger alert-dismissible">
              <p >{{ $error }}</p>
		       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			 </div>
            @endforeach
          @endif