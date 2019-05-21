
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Expediente técnicos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <expediente-tecnico></expediente-tecnico>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
