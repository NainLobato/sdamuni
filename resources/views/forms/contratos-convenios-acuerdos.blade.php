
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Administrador de contratos, convenios, o acuerdos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <contratos-convenios-acuerdos></contratos-convenios-acuerdos>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
