<template>
<div>
    <div >
        <b-input-group class="col-lg-6 mx-auto my-2">
            <b-form-input class="LoginInput" size="lg" placeholder="Ingresa el numero de obra">
            </b-form-input>
            <b-input-group-append>
            <b-button variant="outline-info">Buscar <i class="fas fa-search fa-lg"></i></b-button>
            </b-input-group-append>
        </b-input-group>
    </div>
    <!-- <b-card  class="card-registro ">
        <b-card-header class="text-center">
            <p></p>
        </b-card-header>
        <b-card-body>

        </b-card-body>
        <b-card-footer>

        </b-card-footer>
    </b-card> -->
    <b-card
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        header-bg-variant="dark"
        header-tag="header"
        align="center"
        no-body
        >
        <template slot="header">
            <span>{{ titulo }}</span>
            <div class="card-tools float-right">
                <button v-show="!colapsableEstado" @click="agregar" type="button" class="btn btn-secondary" >
                    <a > <i class="fa fa-plus"></i></a>
                </button>
                <button v-show="colapsableEstado" @click="cancelar" type="button" class="btn btn-secondary" >
                    <a> <i class="fa fa-minus"></i></a>
                </button>
            </div>
        </template>
        <b-collapse id="colapsable" v-model="colapsableEstado">
            <b-card-body align="left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fuente_financiamiento">Fuente de financiamiento:</label>
                            <v-select id="fuente_financiamiento" name="fuente_financiamiento" v-validate="'required'" placeholder="Elige una fuente de financiamiento" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('fuente_financiamiento')">{{ errors.first('fuente_financiamiento') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p>Techo financiero:</p>
                        <p>$9999</p>
                    </div>
                    <div class="col-md-4">
                        <p>Monto Aprobado/presopuestado:</p>
                        <p>$9999</p>
                    </div>
                    <div class="col-md-4">
                        <p>Monto Disponible:</p>
                        <p>$9999</p>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="programa">Programa:</label>
                            <v-select id="programa" name="programa" v-validate="'required'" placeholder="Elige un programa" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('programa')">{{ errors.first('programa') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sub_programa">Subprograma:</label>
                            <v-select id="sub_programa" name="sub_programa" v-validate="'required'" placeholder="Elige un subprograma" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('sub_programa')">{{ errors.first('sub_programa') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipo">Tipo:</label>
                            <v-select id="tipo" name="tipo" v-validate="'required'" placeholder="Elige un tipo" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('tipo')">{{ errors.first('tipo') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="num_obra">Numero de obra:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="num_obra"> 201930001 </span>
                                </div>
                                <input type="number" id="num_obra" name="num_obra" class="form-control" placeholder="Ingrese numero de acta" data-vv-as="numero de obra"  aria-describedby="num_obra" v-validate="'required|numeric|length:4'">
                            </div>
                            <div class="invalid-feedback" v-if="errors.has('num_obra')">{{ errors.first('num_obra') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <v-select id="localidad" name="localidad" v-validate="'required'" placeholder="Elige un localidad" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('localidad')">{{ errors.first('localidad') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desc_obra">Descripcion de la obra:</label>
                            <textarea type="text" id="desc_obra" name="desc_obra" class="form-control" placeholder="Ingrese descripcion de la obra" data-vv-as="descripcion de la obra"  aria-describedby="desc_obra" v-validate="'required'" rows="4"></textarea>
                            <div class="invalid-feedback" v-if="errors.has('desc_obra')">{{ errors.first('desc_obra') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_inicial">Fecha inicial:</label>
                            <input type="date" id="fecha_inicial" name="fecha_inicial" class="form-control" data-vv-as="fecha inicial" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('fecha_inicial')">{{ errors.first('fecha_inicial') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_final">Fecha final:</label>
                            <input type="date" id="fecha_final" name="fecha_final" class="form-control" data-vv-as="fecha final" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('fecha_final')">{{ errors.first('fecha_final') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fuente_financiemiento">Fuente de financiemiento:</label>
                            <input v-model.lazy="obra.fuente_financiamiento.value" v-money="obra.fuente_financiamiento" id="fuente_financiemiento" name="fuente_financiemiento" class="form-control" data-vv-as="fuente de financiemiento" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('fuente_financiemiento')">{{ errors.first('fuente_financiemiento') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aportacion_municipal">Aportacion municipal:</label>
                            <input v-model.lazy="obra.aportacion_municipal.value" v-money="obra.aportacion_municipal" id="aportacion_municipal" name="aportacion_municipal" class="form-control" data-vv-as="aportacion municipal" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('aportacion_municipal')">{{ errors.first('aportacion_municipal') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aportacion_beneficiarios">Aportacion beneficiarios:</label>
                            <input v-model.lazy="obra.aportacion_beneficiarios.value" v-money="obra.aportacion_beneficiarios" id="aportacion_beneficiarios" name="aportacion_beneficiarios" class="form-control" data-vv-as="aportacion beneficiarios" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('aportacion_beneficiarios')">{{ errors.first('aportacion_beneficiarios') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otras_fuentes_federales">Otras fuentes federales:</label>
                            <input v-model.lazy="obra.otras_fuentes_federales.value" v-money="obra.otras_fuentes_federales" id="otras_fuentes_federales" name="otras_fuentes_federales" class="form-control" data-vv-as="otras fuentes federales" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otras_fuentes_federales')">{{ errors.first('otras_fuentes_federales') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otras_fuentes_estatales">Otras fuentes estatales:</label>
                            <input v-model.lazy="obra.otras_fuentes_estatales.value" v-money="obra.otras_fuentes_estatales" id="otras_fuentes_estatales" name="otras_fuentes_estatales" class="form-control" data-vv-as="otras fuentes estatales" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otras_fuentes_estatales')">{{ errors.first('otras_fuentes_estatales') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otros">Otros:</label>
                            <input v-model.lazy="obra.otros.value" v-money="obra.otros" id="otros" name="otros" class="form-control" data-vv-as="otros" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otros')">{{ errors.first('otros') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="costo_total">Costo total:</label>
                            <input v-model.lazy="obra.costo_total.value" v-money="obra.costo_total" id="costo_total" name="costo_total" class="form-control" data-vv-as="costo total" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('costo_total')">{{ errors.first('costo_total') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unidad_proyecto">Unidad proyecto:</label>
                            <v-select id="unidad_proyecto" name="unidad_proyecto" v-validate="'required'" placeholder="Elige una unidad" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('unidad_proyecto')">{{ errors.first('unidad_proyecto') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" data-vv-as="cantidad" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('cantidad')">{{ errors.first('cantidad') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="beneficiario">Beneficiario:</label>
                            <v-select id="beneficiario" name="beneficiario" v-validate="'required'" placeholder="Elige un beneficiario" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('beneficiario')">{{ errors.first('beneficiario') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cantidad_beneficiarios">Cantidad beneficiarios:</label>
                            <input type="number" id="cantidad_beneficiarios" name="cantidad_beneficiarios" class="form-control" placeholder="Ingrese cantidad de beneficiarios" data-vv-as="cantidad de beneficiarios" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('cantidad_beneficiarios')">{{ errors.first('cantidad_beneficiarios') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="modalidad_ejecucion">Modalidad ejecucion:</label>
                            <v-select id="modalidad_ejecucion" v-model="obra.modalidad_ejecucion" :options="modalidades_ejecucion" label="nombre" name="modalidad_ejecucion" v-validate="'required'" placeholder="Elige un modalidad" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('modalidad_ejecucion')">{{ errors.first('modalidad_ejecucion') }}</div>
                        </div>
                    </div>
                     <div class="col-md-6" v-if="obra.modalidad_ejecucion.value == 2">
                        <div class="form-group">
                            <label for="modalidad_contrato">Modalidad ejecucion:</label>
                            <v-select id="modalidad_contrato" :options="modalidades_contrato" label="nombre" name="modalidad_contrato" v-validate="'required'" placeholder="Elige un modalidad" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('modalidad_contrato')">{{ errors.first('modalidad_contrato') }}</div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_hora_acta">Fecha y hora Acta Consejo Desarrollo/Cabildo:</label>
                            <input type="datetime" id="fecha_hora_acta" name="fecha_hora_acta" class="form-control" placeholder="Ingrese fecha y hora" data-vv-as="fecha y hora" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('fecha_hora_acta')">{{ errors.first('fecha_hora_acta') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="longitud">Latitud:</label>
                            <input type="number" id="longitud" name="longitud" class="form-control" placeholder="Ingrese latitud" data-vv-as="latitud" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('longitud')">{{ errors.first('longitud') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="latitud">Longitud:</label>
                            <input type="number" id="latitud" name="latitud" class="form-control" placeholder="Ingrese longitud" data-vv-as="longitud" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('latitud')">{{ errors.first('latitud') }}</div>
                        </div>
                    </div>

                    <div class="col-md-12 text-right">
                        <button class="btn btn-danger" @click="cancelar">Cancelar</button>
                        <button v-show="estadoFormulario == 1" class="btn btn-success" @click="store">Guardar</button>
                        <button v-show="estadoFormulario == 2" class="btn btn-success" @click="update">Actualizar</button>
                    </div>
                </div>
            </b-card-body>
        </b-collapse>
    </b-card>
    <b-card>
            <table class="table">
                <thead>
                    <tr>
                        <th>Número de obra</th>
                        <th>Descripción</th>
                        <th>Localidad</th>
                        <th>Fondo</th>
                        <th>Monto total</th>
                        <th>Situación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2019300010001</td>
                        <td>Pavimentación de la calle 5 de Mayo</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 5 000 000</td>
                        <td class="text-center"><b-badge variant="secondary">Sin iniciar</b-badge></td>
                        <td><div class="d-flex justify-content-around">
                             <b-button @click="detalleObra" variant="outline-info"> <i class="fas fa-eye"></i></b-button><b-button @click="addComplemento" id="popover-button-event" variant="outline-success"> <i class="fas fa-plus"></i></b-button> <b-button variant="outline-secondary"> <i class="fas fa-edit "></i></b-button><b-button variant="outline-danger"> <i class="fas fa-trash "></i></b-button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>2019300010002</td>
                        <td>Pavimentación de la calle Hidalgo</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 450 000</td>
                        <td class="text-center"><b-badge variant="success">Bien</b-badge></td>
                        <td><div class="d-flex justify-content-around">
                             <b-button @click="detalleObra" variant="outline-info"> <i class="fas fa-eye"></i></b-button><b-button @click="detalleObra" variant="outline-success"> <i class="fas fa-plus"></i></b-button> <b-button variant="outline-secondary"> <i class="fas fa-edit "></i></b-button><b-button variant="outline-danger"> <i class="fas fa-trash "></i></b-button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>2019300010003</td>
                        <td>Pavimentación de la calle Morelos</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 2 000 000</td>
                        <td class="text-center"><b-badge variant="warning">Preventivo</b-badge></td>
                        <td><div class="d-flex justify-content-around">
                             <b-button @click="detalleObra" variant="outline-info"> <i class="fas fa-eye"></i></b-button><b-button @click="detalleObra" variant="outline-success"> <i class="fas fa-plus"></i></b-button> <b-button variant="outline-secondary"> <i class="fas fa-edit "></i></b-button><b-button variant="outline-danger"> <i class="fas fa-trash "></i></b-button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>2019300010004</td>
                        <td>Pavimentación de la calle Allende</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 34 000</td>
                        <td class="text-center"><b-badge variant="danger">Urgente</b-badge></td>
                        <td><div class="d-flex justify-content-around">
                             <b-button @click="detalleObra" variant="outline-info"> <i class="fas fa-eye"></i></b-button><b-button @click="detalleObra" variant="outline-success"> <i class="fas fa-plus"></i></b-button> <b-button variant="outline-secondary"> <i class="fas fa-edit "></i></b-button><b-button variant="outline-danger"> <i class="fas fa-trash "></i></b-button>
                        </div></td>
                    </tr>
                </tbody>
                <!-- <thead>
                    <tr>
                        <th>Num obra</th>
                        <th>Descripcion</th>
                        <th>Fecha programada inicio</th>
                        <th>Fecha programada termino</th>
                        <th>Fecha de acta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 2019300010001 </td>
                        <td> Descripcion obra </td>
                        <td> 10-10-2019</td>
                        <td> 12-12-2019</td>
                        <td> 09-09-2019</td>
                        <td> <div class="d-flex justify-content-around">
                             <b-button @click="detalleObra" variant="outline-info"> <i class="fas fa-eye"></i></b-button> <b-button variant="outline-secondary"> <i class="fas fa-edit "></i></b-button><b-button variant="outline-danger"> <i class="fas fa-trash "></i></b-button>
                        </div>
                        </td>
                    </tr>
                </tbody> -->
                <!-- <b-popover ref="popover" target="popover-button-event" title="Agregar">
                    <a href="#" class="row mx-1 link-pop">
                        <div class="mr-1">
                             <i class="nav-icon fas fa-tools"></i>
                        </div>
                        <div>
                             Modificaciones presupuestales
                        </div>
                    </a>
                    <a href="#" class="row mx-1 link-pop">
                        <div class="mr-1">
                            <i class="nav-icon fas fa-tools"></i>
                        </div>
                        <div>
                            Avances financieros
                        </div>
                    </a>
                </b-popover> -->
            </table>
    </b-card>
    <div>
  <b-modal ref="modal" size="lg" hide-footer centered id="modal-1" title="Agregar/generar">
  <div class="row">
      <div  v-for="(card , index) in cards" :key="index" class="col-md-6 ">
    <div class="card ">
        <div class="row card-home">
            <div class="col-md-12  d-flex justify-content-center align-items-center" style="background-color:#0abab5">
                <a :href="card.href" class="py-4 link-pop">
                    <img class="center img-circle-2 elevation-2 align-middle" :src="card.imagen"  >
                </a>
            </div>
            <div class="col-md-12 my-auto">
                <h4 class="text-center">{{card.titulo}}</h4>
                       <!-- <h5>Registro y edción</h5> -->
                <p class=" mr-3 text-center">{{card.descripcion}}</p>

            </div>
        </div>
    </div>
   </div>
  </div>

  </b-modal>
</div>
</div>

</template>

<script>
    import urlSdamuni from '.././urlSdamuni';
    import {VMoney} from 'v-money'

    export default {
        props: {
        },
        data(){
            return{
                urlSdamuni: urlSdamuni,
                titulo: 'Obras y acciones registradas',
                colapsableEstado: false,
                estadoFormulario: 1,
                price: 0,
                modalidades_ejecucion: [
                    {nombre: 'Contrato ', value: 1},
                    {nombre: 'Administración directa', value: 2}
                ],
                modalidades_contrato: [
                    {nombre: 'Adjudicación directa ', value: 1},
                    {nombre: 'invitación', value: 2},
                    {nombre: 'licitación pública', value: 3}
                ],
                cards:[
                    // {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-collaborator-male-96.png',href: route('empleados.index').template,color:'background-color:#0abab5;',titulo:'Empleados',descripcion:'Crea y administra usuarios para tu ayuntamiento'},
                    // {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-organization-96.png', href: route('ayuntamiento.index').template,color:'background-color:#0abab5;',titulo:'Ayuntamientos',descripcion:'Crea, elimina, edita ayuntamientos'},
                    // {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-book-96.png', href: route('libro-actas.index').template,color:'background-color:#0abab5;',titulo:'Libros de actas',descripcion:'Crea, elimina, edita actas'},
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-page-96.png', href: route('registro-modificaciones.index').template,color:'background-color:#0abab5;',titulo:'Modificaciones presupuestales',descripcion:''},
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-page-96.png', href: route('acta-consejo-desarrollo.index').template,color:'background-color:#0abab5;',titulo:'Avances financieros',descripcion:''},
                    // {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-page-96.png', href: route('acta-consejo-planeacion.index').template,color:'background-color:#0abab5;',titulo:'Actas del consejo de planeación',descripcion:'Crea, elimina, edita acuerdos'},

                ],
                obra: {
                    modalidad_ejecucion: { nombre: '', value: ''},
                    fuente_financiamiento: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                        value: 0
                    },
                    aportacion_municipal: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                        value: 0,
                    },
                    aportacion_beneficiarios: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                        value: 0,
                    },
                    otras_fuentes_federales: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                        value: 0,
                    },
                    otras_fuentes_estatales: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                        value: 0,
                    },
                    otros: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                        value: 0,
                    },
                    costo_total: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                        value: 0,
                    },
                },
            }
        },
        methods: {
            agregar () {
                this.titulo = 'Nueva obra o accion'
                this.colapsableEstado = true
                this.estadoFormulario = 1
            },
            cancelar () {
                this.titulo = 'Obras y acciones registradas'
                this.colapsableEstado = false
            },
            editar (acuerdo) {
                this.titulo = 'Editar accion o acuerdo registrado'
                this.colapsableEstado = true
                this.estadoFormulario = 2
            },
            detalleObra(){
                window.location.href = route('obras.detalle').template;
            },
            addComplemento(){
                this.$refs.modal.show()
            },
            store () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(route('acuerdo-pendiente.store').template, { acuerdo: this.acuerdo })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal({
                                title: 'Exito',
                                text: "Creado correctamente.",
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                })
                            } else if(response.data.estado == 1) {
                                Vue.swal(
                                    'Error!',
                                    'Ya existe el numero de acta ingresado.',
                                    'error'
                                )
                            } else {
                                Vue.swal(
                                    'Error!',
                                    'Ha ocurrido un error, intente de nuevo.',
                                    'error'
                                )
                            }
                        })
                        .catch(error => {
                            Vue.swal(
                                'Error!',
                                'Ha ocurrido un error, intente de nuevo.',
                                'error'
                            )
                            console.log(error)

                        })
                    } else {
                        Vue.swal(
                            'Error!',
                            'Complete el formulario.',
                            'error'
                        )
                    }
                })
            },
            update () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post('', { })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal({
                                title: 'Exito',
                                text: "Actualizado correctamente.",
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                })
                            } else if(response.data.estado == 1) {
                                Vue.swal(
                                    'Error!',
                                    'Ya existe el numero de acta ingresado.',
                                    'error'
                                )
                            } else {
                                Vue.swal(
                                    'Error!',
                                    'Ha ocurrido un error, intente de nuevo.',
                                    'error'
                                )
                            }
                        })
                        .catch(error => {
                            Vue.swal(
                                'Error!',
                                'Ha ocurrido un error, intente de nuevo.',
                                'error'
                            )
                        })
                    } else {
                        Vue.swal(
                            'Error!',
                            'Complete el formulario.',
                            'error'
                        )
                    }
                })
            },
            eliminar () {
                Vue.swal({
                    title: '¿Estas seguro de eliminar ?',
                    text: "No se podra revertir el cambio.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.value) {
                        axios.post('', { })
                        .then(function (response) {
                            if (response.data.estado === 1) {
                                Vue.swal({
                                    title: 'Exito',
                                    text: "eliminado correctamente.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                    }).then((result) => {
                                        if (result.value) {
                                            location.reload();
                                        }
                                })
                            }else {
                                Vue.swal(
                                    'Error!',
                                    'Ha ocurrido un error, intente de nuevo.',
                                    'error'
                                )
                            }

                        })
                        .catch(function (error) {
                                Vue.swal(
                                'Error!',
                                'Ha ocurrido un error, intente de nuevo.',
                                'error'
                            )
                        })
                    }
                })
            }
        },
        mounted() {
            console.log('whatever it takes')
        }
    }
</script>
<style >
    .card-registro{
        position:absolute;
        width: 90%;
        z-index: 1;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;

    }
    .link-pop{
        transition: all .2s ease-in-out;
    }
    .link-pop:hover{
         transform: scale(1.2);

    }
    .link-pop:hover img{
         -webkit-box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.4);
        -moz-box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.4);
        box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.4);
    }
</style>
