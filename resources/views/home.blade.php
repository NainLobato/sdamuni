@extends('template.main')

@push('estilos')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
	{{--
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/all.min.js') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jQueryFormValidator/theme-default.min.css') }}">
	--}}
@endpush

@section('title', 'Inicio')

@section('content')
    <div id="app">
        <dashboard></dashboard>
        {{-- <municipio></municipio>
        <empleado></empleado> --}}
    </div>
    {{-- <div class="row">
        <div class="col-md-12">

            {{--<div class="card ">
                <div class="card-header">
                    <h5 class="card-title text-center">Información municipal</h5>
                     <div class="card-tools">

                         <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        {{--<button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>--
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{--@include('dashboard.mantenimientos-table')
                        </div>
                        <div class="col-md-6">
                                {{--@include('dashboard.mantenimientos-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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
