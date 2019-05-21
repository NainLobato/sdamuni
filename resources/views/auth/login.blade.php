<!DOCTYPE html>
<html ang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SDAM | @yield('title', 'Inicar sesión')</title>
	<link rel="icon" href="{{ asset('admin/dist/img/AdminLTELogo.png') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
	{{--
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/all.min.js') }}">
    --}}
    <style>
        body{
            padding: 5% 0;
        }
        #hijo {

            padding-top: 1%;
            padding-bottom: 5.2%;
        }
    </style>
</head>

<body>
    <div class="grid align__item" id="hijo">
        <div class="register">
            {{--  <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412"><defs><linearGradient id="a" x1="0%" y1="0%" y2="0%"><stop offset="0%" stop-color="#8ceabb"/><stop offset="100%" stop-color="#378f7b"/></linearGradient></defs><path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z"/></svg>  --}}
            <img src="{{ asset('admin/dist/img/escudo.png') }}" class="site__logo" width="150" height="150" alt="">
            <h3>SDAM</h3>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                <div class="form__field">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                  {{-- <input type="email" placeholder="info@mailaddress.com"> --}}
                </div>
                <div class="form__field">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="••••••••••••">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    {{-- <input type="password" placeholder="••••••••••••"> --}}
                </div>
                <div class="form__field">
                        <input type="submit" value="Iniciar sesión">
                </div>
                <div class="form-group row justify-content-center">
                        <div class="col-md-6 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Recordar
                                </label>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

	{{--@routes--}}
	<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
	{{-- <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
	<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
	<script src="{{asset ('plugins/sweetalert/sweetalert.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		});
	</script>
	@include('sweet::alert')
</body>
</html>
