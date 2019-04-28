
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Actas del consejo de desarrollo')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <actas-consejo-planeacion></actas-consejo-planeacion>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
