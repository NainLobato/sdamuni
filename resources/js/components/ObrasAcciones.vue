<template>
<div>
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
                            <input v-money="obra.fuente_financiamiento" id="fuente_financiemiento" name="fuente_financiemiento" class="form-control" data-vv-as="fuente de financiemiento" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('fuente_financiemiento')">{{ errors.first('fuente_financiemiento') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aportacion_municipal">Aportacion municipal:</label>
                            <input v-money="obra.aportacion_municipal" id="aportacion_municipal" name="aportacion_municipal" class="form-control" data-vv-as="aportacion municipal" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('aportacion_municipal')">{{ errors.first('aportacion_municipal') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aportacion_beneficiarios">Aportacion beneficiarios:</label>
                            <input v-money="obra.aportacion_beneficiarios" id="aportacion_beneficiarios" name="aportacion_beneficiarios" class="form-control" data-vv-as="aportacion beneficiarios" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('aportacion_beneficiarios')">{{ errors.first('aportacion_beneficiarios') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otras_fuentes_federales">Otras fuentes federales:</label>
                            <input v-money="obra.otras_fuentes_federales" id="otras_fuentes_federales" name="otras_fuentes_federales" class="form-control" data-vv-as="otras fuentes federales" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otras_fuentes_federales')">{{ errors.first('otras_fuentes_federales') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otras_fuentes_estatales">Otras fuentes estatales:</label>
                            <input v-money="obra.otras_fuentes_estatales" id="otras_fuentes_estatales" name="otras_fuentes_estatales" class="form-control" data-vv-as="otras fuentes estatales" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otras_fuentes_estatales')">{{ errors.first('otras_fuentes_estatales') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otros">Otros:</label>
                            <input v-money="obra.otros" id="otros" name="otros" class="form-control" data-vv-as="otros" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('otros')">{{ errors.first('otros') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="costo_total">Costo total:</label>
                            <input v-money="obra.costo_total" id="costo_total" name="costo_total" class="form-control" data-vv-as="costo total" v-validate="'required'"/>
                            <div class="invalid-feedback" v-if="errors.has('costo_total')">{{ errors.first('costo_total') }}</div>
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
                        <th>Num obra</th>
                        <th>Descripcion</th>
                        <th>Fecha programada inicio</th>
                        <th>Fecha programada termino</th>
                        <th>Fecha de acta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

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
                titulo: 'Obras y acciones registradas',
                colapsableEstado: false,
                estadoFormulario: 1,
                obra: {
                    fuente_financiamiento: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                    },
                    aportacion_municipal: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                    },
                    aportacion_beneficiarios: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                    },
                    otras_fuentes_federales: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                    },
                    otras_fuentes_estatales: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                    },
                    otros: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
                    },
                    costo_total: {
                        decimal: '.',
                        thousands: ',',
                        prefix: '$ ',
                        precision: 2,
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
                this.acuerdo = {
                    'num_acta': '',
                    'fecha_acta': '',
                    'acuerdo': '',
                    'empleado': '',
                    'accion_situacion': '',
                    'comentarios': '',
                }
            },
            editar (acuerdo) {
                this.titulo = 'Editar accion o acuerdo registrado'
                this.colapsableEstado = true
                this.estadoFormulario = 2
                this.acuerdo = {
                    ...acuerdo,
                    empleado: {
                        id: acuerdo.empleado.id,
                        nombre: `${acuerdo.empleado.user.nombres} ${acuerdo.empleado.user.primer_ap} ${acuerdo.empleado.user.segundo_ap}`
                    }
                }
            },
            store () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(route('acuerdo-pendiente.store').template, { acuerdo: this.acuerdo })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal({
                                title: 'Exito',
                                text: "Acuerdo creado correctamente.",
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
                        axios.post(`${this.urlSdamuni}/update-acuerdo-pendiente`, { acuerdo: this.acuerdo })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal({
                                title: 'Exito',
                                text: "Acuerdo actualizado correctamente.",
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
            eliminar (acuerdo) {
                Vue.swal({
                    title: '¿Estas seguro de eliminar el acuerdo '+acuerdo.num_acta+'?',
                    text: "No se podra revertir el cambio.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.value) {
                        axios.post(this.urlSdamuni+'/eliminar-acuerdo-pendiente', {idAcuerdo: acuerdo.id})
                        .then(function (response) {
                            if (response.data.estado === 1) {
                                Vue.swal({
                                    title: 'Exito',
                                    text: "Acuerdo eliminado correctamente.",
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
