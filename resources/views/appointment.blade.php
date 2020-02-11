@extends('master')

@section('content')
<div id="app">
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
		    <div id="stepper1" class="bs-stepper linear">
	          	<div class="bs-stepper-header" role="tablist">
		            <div class="step active" data-target="#test-l-1">
		              <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1" aria-selected="true">
		                <span class="bs-stepper-circle">1</span>
		                <span class="bs-stepper-label">Services</span>
		              </button>
		            </div>
		            <div class="bs-stepper-line"></div>
		            <div class="step" data-target="#test-l-2">
		              <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2" aria-selected="false" disabled="disabled">
		                <span class="bs-stepper-circle">2</span>
		                <span class="bs-stepper-label">Staff</span>
		              </button>
		            </div>
		            <div class="bs-stepper-line"></div>
		            <div class="step" data-target="#test-l-3">
		              <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3" aria-selected="false" disabled="disabled">
		                <span class="bs-stepper-circle">3</span>
		                <span class="bs-stepper-label">Time</span>
		              </button>
		            </div>
		            <div class="bs-stepper-line"></div>
		            <div class="step" data-target="#test-l-4">
		              <button type="button" class="step-trigger" role="tab" id="stepper1trigger4" aria-controls="test-l-4" aria-selected="false" disabled="disabled">
		                <span class="bs-stepper-circle">4</span>
		                <span class="bs-stepper-label">Confirm</span>
		              </button>
		            </div>
		        </div>
	          	<div class="bs-stepper-content">
		            <form action="{{ route('appointment.store') }}" method="POST" novalidate>
		              {{ csrf_field() }}
		              <div id="test-l-1" role="tabpanel" class="bs-stepper-pane active dstepper-block" aria-labelledby="stepper1trigger1">
		                <div class="form-group" style="display: flex">

		                  <!-- Card -->
		                  	@foreach($services as $service)
							<div class="card services-list">

							  <!-- Card image -->
							  <!-- <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap"> -->

							  <!-- Card content -->
							  <div class="card-body">

							    <!-- Title -->
							    <h4 class="card-title"><a>{{ $service->service_name }}</a></h4>
							    <!-- Text -->
							    <p class="card-text">{{ $service->service_description }}</p>
							    <p class="card-text">{{ $service->service_duration_mm }}</p>
							    <!-- Button -->
							    <a href="#" class="btn btn-primary btn-sm service_id" onclick="stepper1.next()" data-service-id="{{ $service->id }}" data-service-name="{{ $service->service_name }}">Select</a>

							  </div>

							</div>
							@endforeach
							<!-- Card -->
		                </div>
		                <!-- <button class="btn btn-primary">Next</button> -->
		              </div>
		              <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
		                <div class="form-group" style="display: flex">

		                  <!-- Card -->
		                  	@foreach($staffs as $staff)
							<div class="card services-list">

							  <!-- Card image -->
							  <!-- <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap"> -->

							  <!-- Card content -->
							  <div class="card-body">

							    <!-- Title -->
							    <h4 class="card-title"><a>{{ $staff->employee_name }}</a></h4>
							    <!-- Button -->
							    <a href="#" class="btn btn-primary btn-sm staff_name" onclick="stepper1.next()" data-staff-name="{{ $staff->employee_name }}">Select</a>

							  </div>

							</div>
							@endforeach
							<!-- Card -->
		                </div>
		                <a href="#" class="btn btn-primary" onclick="stepper1.previous();">Previous</a>
		              </div>
		              <div id="test-l-3" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger3">
		                <div class="form-group">
		                  <!-- <label for="exampleInputPassword1">Password</label>
		                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
		                  <p>Available Date & Time for <span id="selected_staff2"></span></p>
		                  <label for="date_time">Date & Time</label>
		                  <input type="datetime-local" class="form-control date_time" required onblur="stepper1.next()">
		                </div>
		                <a href="#" class="btn btn-primary" onclick="stepper1.previous();">Previous</a>
		                <!-- <button class="btn btn-primary" onclick="stepper1.next()">Select Date & Time</button> -->
		              </div>
		              <div id="test-l-4" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger4" id="stepper4">
		              	<div class="form_data">
		              		<h3>Appointment Confirmation</h3>
		              		<p>Service: <span id="selected_service"></span></p>
		              		<p>Provider: <span id="selected_staff1"></span></p>
		              		<p>Date & Time: <span id="selected_datetime"></span></p>
		              		<h3>Customer Information</h3>
		              		<div class="md-form">
							  <input type="text" class="form-control" name="customer_name" id="customer_name" required placeholder="Customer Name">
							  <label for="customer_name">Customer Name</label>
							</div>
							<div class="md-form">
							  <input type="email" class="form-control customer_email" name="customer_email" id="customer_email" required placeholder="Customer Email">
							  <label for="customer_email">Customer Email</label>
							</div>
		              	</div>
		              	<div><a href="#" class="btn btn-primary" onclick="stepper1.previous();">Previous</a>
		                <button type="submit" class="btn btn-primary">Create Appointment</button></div>
		                
		              </div>
		              <div class="form_data" style="display: none;">
		              		<input type="hidden" name="service_name" id="service_name">
		              		<input type="hidden" name="service_id" id="service_id">
		              		<input type="hidden" name="staff_name" id="staff_name">
		              		<input type="datetime-local" name="date_time" id="date_time">
		              </div>
		            </form>
	          	</div>
	        </div>
  		</div>
	</div>
</main>
    </div>

@endsection