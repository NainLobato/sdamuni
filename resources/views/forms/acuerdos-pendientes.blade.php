
@extends('template.main')

@push('estilos')
@endpush

@section('title', 'Acuerdos de cabildo pendintes')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <acuerdos-pendientes></acuerdos-pendientes>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
