
@extends('template.main')

@push('estilos')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
	{{--
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/all.min.js') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jQueryFormValidator/theme-default.min.css') }}">
	--}}
@endpush

@section('title', 'Empleados')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <empleado :empleados="{{$empleados}}" :cargos="{{$cargos}}"></empleado>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/datatables/datatables.min.js')}}"></script>
	<script src="{{ asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('plugins/select2/es.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>

	{{--
	<script src="{{ asset('plugins/moment/js/moment.min.js') }}"></script>
	<script src="{{ asset('plugins/moment/locales/es.js') }}"></script>
	<script src="{{ asset('plugins/formValidator/bootstrapValidator.min.js')}}"></script>
	<script src="{{asset ('js/moment-with-locales.min.js')}}"></script>
	<script src="{{ asset('plugins/jQueryFormValidator/jquery.form-validator.min.js')}}"></script>
	--}}
	{{--
	<script>
		$.validate({
			validateOnEvent: true,
			lang : 'es',
			modules : 'security'
		});
    </script>--}}
@endpush
