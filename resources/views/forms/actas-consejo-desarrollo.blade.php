
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Actas del consejo de desarrollo')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <actas-consejo-desarrollo initial-empleados="{{ $empleados }}"></actas-consejo-desarrollo>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
