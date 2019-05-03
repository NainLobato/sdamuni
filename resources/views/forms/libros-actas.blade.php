
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Libros de actas de cabildo')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
            <libros-actas initial-libros="{{ json_encode($libros) }}"></libros-actas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
