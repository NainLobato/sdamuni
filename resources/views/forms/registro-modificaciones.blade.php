
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Registro de modificaciones programático presupuestales')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <registro-modificaciones></registro-modificaciones>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
