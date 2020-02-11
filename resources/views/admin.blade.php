@extends('master')

@section('content')
<div>
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
	<main class="pt-5 mx-lg-5">
	    <div class="row">
	  		<div class="col-md-8 offset-md-2">
	  			<div>
	  				@if(Session::has('message'))
		      		<div class="alert alert-success alert-dismissible" role="alert">
					
					    {{Session::get('message')}}
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
					
					</div>
					@endif
					@if ($errors->any())
					    <div class="alert alert-danger" role="alert">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
	  			</div>
	  			<div id='calendar'>
	  				
	  			</div>
	  		</div>
		</div>
	</main>
</div>
<div id="calendarModal" class="modal fade">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title">Add Appointment</h4>
        </div>
        <form action="{{ route('admin.store') }}" method="POST" novalidate>
        <div id="modalBody" class="modal-body">
        		{{ csrf_field() }}
	        	<div>
	        		<label>Client Name</label>
	        		<input type="text" name="detail_client_name" class="form-control detail-client_name" required>
	        		<input type="hidden" name="detail_client_email" class="form-control detail-client_email" required>
	        	</div>
	        	<div>
	        		<label>Service</label>
	        		<input type="text" name="detail_service_name" class="form-control detail-service_name" required>

	        	</div>
	        	<div>
	        		<label>Provider</label>
	        		<input type="text" name="detail_staff_name" class="form-control detail-staff_name">
	        	</div>
	        	<div class="row">
	        		<div class="col-sm">
	        			<label>Start</label>
	        			<input type="text" name="detail_date_time" class="form-control detail-date_time" id="detail_date_time_start">
	        		</div>
				    <div class="col-sm">
				    	<label>End</label>
	        			<input type="text" name="detail_date_time_end" class="form-control detail-date_time_end" id="detail-date_time_end">
	        			<input type="hidden" name="detail_service_duration" class="form-control detail_service_duration hidden" id="detail_service_duration" required>
	        		</div>
				    <div class="col-sm">
				    	<button type="button" class="btn btn-default btn-sm calculate" style="margin-top: 35px" onclick="calculate()">Calculate</button>
				    </div>
	        	</div>
	        	<div>
	        		<label>Description</label>
	        		<textarea class="form-control" name="detail_note"></textarea>
	        	</div>
	        	<div>
	        		<label>Status</label>
	        		<select class="browser-default custom-select" name="detail_appointment_status">
					  <option selected value="approved">Approved</option>
					  <option value="declined">Declined</option>
					</select>
					<input type="hidden" name="detail_appointment_id" class="detail-appointment_id hidden">
	        	</div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-default confirm_appointment">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
	function calculate(){
		// var date_time_start = moment(document.getElementById("detail_date_time_start").value).format('hh:mm');
		// var duration = document.getElementById("detail_service_duration").value;
		// var formatted = moment.utc(duration*1000).format('HH:mm');
		// var endTime = moment(date_time_start).add(formatted).format('HH:mm');

		// alert(endTime);
		const date_time_start = moment(document.getElementById("detail_date_time_start").value).format('hh:mm:ss');
		const durationInMinutes = document.getElementById("detail_service_duration").value;

		const endTime = moment(date_time_start, 'HH:mm:ss').add(durationInMinutes, 'minutes').format('YYYY-MM-DD HH:mm');

		document.getElementById("detail-date_time_end").value = endTime;
	}
</script>
@endsection