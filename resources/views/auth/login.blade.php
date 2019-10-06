@extends('layouts.appLogin')

 
@section('content')

	<div class="limiter" style="padding-top: 1%">
		<div class="container-login100" style="">
			<div class="wrap-login100  p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>

				<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    
					<div class="wrap-input100 validate-input"  >
						<input class="input100" type="text" name="username" placeholder="Username">
						 
						{{-- @error('username')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror --}}

						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input"  >
						<input class="input100" type="password" name="password" placeholder="Password">
					 
						{{-- @error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror --}}

						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>
	<div class="row d-flex">
			<div class="col-6">
				 <h3>user</h3>
				 <p>2166541</p>
				 <p>Petrokimia2</p>
			 </div>  
			 <div class="col-6">
				 <h3>admin</h3>
				 <p>2166539</p>
				 <p>P3tr0k1m14888</p>
			 </div>
		  
		 </div>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
@endsection