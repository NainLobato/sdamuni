
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Juicios en proceso promovidos por el ayuntamiento')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <jucios-por-ayuntamiento></jucios-por-ayuntamiento>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
