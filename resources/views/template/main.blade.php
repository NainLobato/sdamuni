<!DOCTYPE html>
<html ang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SDAM | @yield('title', 'Inicio')</title>
	<link rel="icon" href="{{ asset('admin/dist/img/AdminLTELogo.png') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
	{{--
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/all.min.js') }}">
	--}}
	@stack('estilos')
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
	<div class="wrapper">
		@include('template.partials.navbar')

		@include('template.partials.sidebar')

		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">@yield('title', 'Inicio')</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Inicio</a></li>
								<li class="breadcrumb-item active">@yield('title', 'Inicio')</li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			<section class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</section>
		</div>

		{{--@include('template.partials.sidebar2')--}}

		@include('template.partials.footer')
	</div>

	{{--@routes--}}
	<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/font-awesome/js/all.js') }}"></script>
	{{-- <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
	<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
	<script src="{{asset ('plugins/sweetalert/sweetalert.min.js')}}"></script>
    @routes
	@stack('scripts')
	<script type="text/javascript">
		$( document ).ready(function() {
			@stack('docready-js');
		});
	</script>
	@include('sweet::alert')
</body>

</html>
