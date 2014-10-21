<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>ElegeFácil</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes"> 

		<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ url('css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

		<link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

		<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ url('css/pages/voter.css') }}" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">		
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<a class="brand" href="{{ url('/voter/dashboard') }}">ElegeFácil.com</a>

					<div class="nav-collapse">
						<ul class="nav pull-right">

							<li>
								<a href="{{ route('voter.logout') }}">
									<i class="icon-user"></i>
									Sair
								</a>
							</li>

						</ul>
					</div>
				<!--/.nav-collapse --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /navbar-inner --> 
		</div>

		<div class="main-inner">
			<div class="container">
							
				@if (isset($errors))
					@if ($errors->has())
						<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
								{{ $error }}<br>
							@endforeach
						</div>
					@endif
				@endif

				@if (Session::has('success'))
					<div class="alert alert-success">
						@foreach (Session::get('success')->all() as $bag)
							{{ $bag }}<br>
						@endforeach
					</div>
				@endif

			</div>
		</div>

		<!-- /subnavbar -->
		<div class="main">
			@yield('content')
		</div>

		<!-- /extra -->
		<div class="footer">
			<div class="footer-inner">
				<div class="container">
					<div class="row">
						<div class="span12"> &copy; {{ date('Y') }} <a href="{{ url('/') }}">ElegeFácil.com</a>. </div>
						<!-- /span12 --> 
					</div>
					<!-- /row --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /footer-inner --> 
		</div>
		<!-- /footer --> 

		<!-- Le javascript
		================================================== --> 
		<!-- Placed at the end of the document so the pages load faster --> 
		<script src="{{ url('js/jquery-1.7.2.min.js') }}"></script>  
		<script src="{{ url('js/bootstrap.js') }}"></script>

	</body>
</html>
