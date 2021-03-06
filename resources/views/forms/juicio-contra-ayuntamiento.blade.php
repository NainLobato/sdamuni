
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Juicios en proceso promovidos en contra del ayuntamiento')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <jucios-contra-ayuntamiento initial-juicios="{{$juicios}}"></jucios-contra-ayuntamiento>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
