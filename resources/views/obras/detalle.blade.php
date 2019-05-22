
@extends('template.main')

@section('title', 'Detalle de obra')
@push('estilos')
<style>
    {{--  .breadcrumb-item a, .breadcrumb-item.active{
        color: white;
    }  --}}

</style>
@endpush
@section('content')

        <div class="col-md-12 mt-2">
            <div class="card h-100">
                <div class="card-header text-white bg-dark">
                  <h4 class="text-center text-bold"> Número de obra: 2019300010001</h4>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6 ">
                    <div class="card h-100 p-2">
                        <h4 class="card-header text-bold text-center">Ubicación</h4>
                        <p class="card-text">Localidad: Acajete</p>
                        {{--  <h5 class="card-title">2019300010001</h5>  --}}
                        <h4 class="card-header text-bold text-center"> Descripción</h4>
                        <p class="card-text">Pavimentación de la calle 5 de Mayo</p>
                    </div>

                </div>
                <div class="col-lg-6 ">
                    <div class="card h-100 p-2">
                        <h4 class="card-header text-center text-bold">Acciones</h4>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 ">
                    <div class="card h-100 p-2">
                        <h4 class="card-header text-center"><strong>DATOS GENERALES</strong></h4>
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
                </div>
                <div class="col-6 ">
                    <div class="card h-100 p-2">
                    <h3 class="card-header text-center text-bold">Reporte fotográfico</h3>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="https://picsum.photos/id/132/1600/1066" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://picsum.photos/id/221/1440/879" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://picsum.photos/id/297/5781/3728" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-12 card p-2 mb-3">

                    <h4 class="card-header text-center text-bold"><strong>Monto aprobado</strong></h4>
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


@endsection

@push('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
