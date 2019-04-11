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
	{{--
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/all.min.js') }}">
    --}}
    <style>
        body{
            padding: 5% 0;
        }
        #hijo {
            padding: 6% 0;
        }
    </style>
</head>

<body>
    <div class="container" id="hijo">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">Iniciar sesión</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Correo electrónico</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Recordar
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Iniciar sesión
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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