
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Obras y acciones')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <obras-acciones></obras-acciones>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
