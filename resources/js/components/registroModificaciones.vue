<template>
<div>
    <div class="col-lg-6 mx-auto title-obra ">
        <h5 class="text-center"><strong>No. Obra: 2019300010001</strong> </h5>
    </div>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_acta">Fecha acta</label>
                            <input type="date" id="fecha_acta" name="fecha_acta" class="form-control" data-vv-as="fecha inicial" v-validate="'required'">
                        <div class="invalid-feedback" v-if="errors.has('fecha_acta')">{{ errors.first('fecha_acta') }}</div></div>
                    </div>
                    <div class="col-md-4">
                        <label for="numero_acta">Numero acta</label>
                        <input type="text" id="numero_acta" name="numero_acta" class="form-control" data-vv-as="fecha inicial" v-validate="'required'">
                        <div class="invalid-feedback" v-if="errors.has('numero_acta')">{{ errors.first('numero_acta') }}</div>
                    </div>
                    <div class="col-md-4 text-center">
                        <label for="cancelar_obra">Cancelar obra</label>
                        <b-form-checkbox
                            id="cancelar_obra"
                            v-model="modificacion.cancelar_obra"
                            name="cancelar_obra"
                            value="1"
                            switch
                            class="text-center"
                            >
                        </b-form-checkbox>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="localidad">Localidad</label>
                            <v-select id="localidad" name="localidad" :options="localidades" label="nombre" v-bind="modificacion.localidad" v-validate="'required'" placeholder="Elige un localidad" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('localidad')">{{ errors.first('localidad') }}</div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="modalidad">Modalidad</label>
                            <v-select id="modalidad" name="modalidad" :options="modalidades_ejecucion" label="nombre" v-bind="modificacion.modalidad" v-validate="'required'" placeholder="Elige un modalidad" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('modalidad')">{{ errors.first('modalidad') }}</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha_prog_inicio">Fecha programado inicio</label>
                            <input type="date" id="fecha_prog_inicio" name="fecha_prog_inicio" class="form-control" data-vv-as="fecha inicial" v-validate="'required'">
                        <div class="invalid-feedback" v-if="errors.has('fecha_prog_inicio')">{{ errors.first('fecha_prog_inicio') }}</div></div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha_prog_termino">Fecha programado termino</label>
                            <input type="date" id="fecha_prog_termino" name="fecha_prog_termino" class="form-control" data-vv-as="fecha inicial" v-validate="'required'">
                        <div class="invalid-feedback" v-if="errors.has('fecha_prog_termino')">{{ errors.first('fecha_prog_termino') }}</div></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea  id="descripcion" name="descripcion" class="form-control" data-vv-as="fecha inicial" v-validate="'required'"></textarea>
                        <div class="invalid-feedback" v-if="errors.has('descripcion')">{{ errors.first('descripcion') }}</div></div>
                    </div>
                    <div class="col-lg-12">
                        <h5 class="text-center text-bold">Datos financieros</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fuente_financiemiento">Fuente de financiemiento:</label>
                            <input v-model.lazy="modificacion.fuente_financiamiento.value" v-money="modificacion.fuente_financiamiento" id="fuente_financiemiento" name="fuente_financiemiento" class="form-control" data-vv-as="fuente de financiemiento" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('fuente_financiemiento')">{{ errors.first('fuente_financiemiento') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aportacion_municipal">Aportacion municipal:</label>
                            <input v-model.lazy="modificacion.aportacion_municipal.value" v-money="modificacion.aportacion_municipal" id="aportacion_municipal" name="aportacion_municipal" class="form-control" data-vv-as="aportacion municipal" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('aportacion_municipal')">{{ errors.first('aportacion_municipal') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aportacion_beneficiarios">Aportacion beneficiarios:</label>
                            <input v-model.lazy="modificacion.aportacion_beneficiarios.value" v-money="modificacion.aportacion_beneficiarios" id="aportacion_beneficiarios" name="aportacion_beneficiarios" class="form-control" data-vv-as="aportacion beneficiarios" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('aportacion_beneficiarios')">{{ errors.first('aportacion_beneficiarios') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otras_fuentes_federales">Otras fuentes federales:</label>
                            <input v-model.lazy="modificacion.otras_fuentes_federales.value" v-money="modificacion.otras_fuentes_federales" id="otras_fuentes_federales" name="otras_fuentes_federales" class="form-control" data-vv-as="otras fuentes federales" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otras_fuentes_federales')">{{ errors.first('otras_fuentes_federales') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otras_fuentes_estatales">Otras fuentes estatales:</label>
                            <input v-model.lazy="modificacion.otras_fuentes_estatales.value" v-money="modificacion.otras_fuentes_estatales" id="otras_fuentes_estatales" name="otras_fuentes_estatales" class="form-control" data-vv-as="otras fuentes estatales" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otras_fuentes_estatales')">{{ errors.first('otras_fuentes_estatales') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otros">Otros:</label>
                            <input v-model.lazy="modificacion.otros.value" v-money="modificacion.otros" id="otros" name="otros" class="form-control" data-vv-as="otros" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otros')">{{ errors.first('otros') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="costo_total">Costo total:</label>
                            <input v-model.lazy="modificacion.costo_total.value" v-money="modificacion.costo_total" id="costo_total" name="costo_total" class="form-control" data-vv-as="costo total" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('costo_total')">{{ errors.first('costo_total') }}</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h5 class="text-center text-bold">Metas</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cantidad_unidad_proyecto">Cantidad unidad del proyecto</label>
                            <input type="text" id="cantidad_unidad_proyecto" name="cantidad_unidad_proyecto" class="form-control" data-vv-as="fecha inicial" v-validate="'required'">
                        <div class="invalid-feedback" v-if="errors.has('cantidad_unidad_proyecto')">{{ errors.first('cantidad_unidad_proyecto') }}</div></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cantidad_destinatarios">Cantidad destinatarios</label>
                            <input type="text" id="cantidad_destinatarios" name="cantidad_destinatarios" class="form-control" data-vv-as="fecha inicial" v-validate="'required'">
                        <div class="invalid-feedback" v-if="errors.has('cantidad_destinatarios')">{{ errors.first('cantidad_destinatarios') }}</div></div>
                    </div>
                </div>
            </b-card-body>
        </b-collapse>
    </b-card>
    <b-card>
            <table class="table">
                <thead>
                    <tr>
                        <th>Num acta</th>
                        <th>Descripcion</th>
                        <th>Fecha programada inicio</th>
                        <th>Fecha programada termino</th>
                        <th>Fecha de acta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 62323</td>
                        <td> Modificacion sexta </td>
                        <td> 11-08-2019</td>
                        <td> 12-12-2019</td>
                        <td> 01-05-2019</td>
                        <td> <a class="btn btn-default"><i class="far fa-edit"></i></a> <a class="btn btn-default"><i class="far fa-trash-alt"></i></a>  </td>
                    </tr>
                </tbody>
            </table>
    </b-card>
</div>

</template>

<script>
    import urlSdamuni from '.././urlSdamuni';
    import {VMoney} from 'v-money'

    export default {
        props: {
            'initialAcuerdos': {
                required: false
            },
            'initialEmpleados': {
                required: false
            }
        },
        data(){
            return{
                urlSdamuni: urlSdamuni,
                titulo: 'Listado de modificaciones',
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
                localidades:[{nombre: 'Acatlán', value: 1},
                {nombre: 'Xalapa', value: 2},
                {nombre: 'Veracruz', value: 3}],
                modificacion: {
                    numero_acta:'',
                    fecha_acta: '',
                    cancelar_obra:'',
                    localidad:[],
                    fecha_prog_inicio:'',
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
                this.titulo = 'Nueva modificación'
                this.colapsableEstado = true
                this.estadoFormulario = 1
            },
            cancelar () {
                this.titulo = 'Listado de modificaciones'
                this.colapsableEstado = false
            },
            editar (acuerdo) {
                this.titulo = 'Editar accion o acuerdo registrado'
                this.colapsableEstado = true
                this.estadoFormulario = 2
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
    .title-obra{
        margin-bottom: -.5rem;
        border-radius: 10px 10px 0px 0px;
        -moz-border-radius: 10px 10px 0px 0px;
        -webkit-border-radius: 10px 10px 0px 0px;
        border: 0px solid #000000;
        box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.52);
        padding-top: 0.5rem;
    }

</style>
