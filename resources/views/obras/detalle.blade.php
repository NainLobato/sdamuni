
@extends('template.main')

@section('title', 'Detalle de obra')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-dark">
                    Detalle de la obra: 2019300010001
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title"><strong>Ubicación</strong></h4>
                            <p class="card-text">Localidad: Acajete</p>
                            <h5 class="card-title">2019300010001</h5>
                            <p class="card-text">Pavimentación de la calle 5 de Mayo</p>
                        </div>
                        <div class="col-6">
                            <h4 class="card-title"><strong>DATOS GENERALES</strong></h4>
                            <p class="card-text">Municipio o ente fiscalizable: Acajete</p>
                            <p class="card-text">Programa: Pavimemtación</p>
                            <p class="card-text">Ejercicio: 2019</p>
                            <p class="card-text">Fondo: FISMDF</p>
                            <p class="card-text">Fecha programada de inicio: 22 de enero de 2019</p>
                            <p class="card-text">Fecha programada de término: 22 de marzo de 2019</p>
                            <p class="card-text">Tipo de beneficiario: PERSONA</p>
                            <p class="card-text">Cantidad de beneficiarios: 7000</p>
                            <p class="card-text">Modalidad de ejecución: CONTRATO</p>
                        </div>
                        <div class="col-6">
                                <h4 class="card-title"><strong>REPORTE FOTOGRÁFICO</strong></h4>
                        <img src="{{ asset('admin/dist/img/icons8-organization-96.png') }}" alt="">
                        </div>
                        <div class="col-12">
                                <h4 class="card-title"><strong>Monto aprobado</strong></h4>
                            <table class="table striped">
                                <thead>
                                    <tr>
                                        <th>Fuente de financiamiento</th>
                                        <th>Aportación municipal</th>
                                        <th>Aportación de beneficiarios</th>
                                        <th>Otras fuentes federales</th>
                                        <th>Otras fuentes estatales</th>
                                        <th>Otros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <td>$ 5 000 000</td>
                                        <td>$ 0</td>
                                        <td>$ 0</td>
                                        <td>$ 0</td>
                                        <td>$ 0</td>
                                        <td>$ 0</td>
                                </tbody>
                            </table>
                            <h5 class="card-title">Avance (pagado) 75%</h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
