
@extends('template.main')

@section('title', 'Semáforo de obras')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <semaforo-obras></semaforo-obras>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
