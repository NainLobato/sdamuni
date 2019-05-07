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
                                <label for="num_acta">Numero de acta de consejo:</label>
                                <input type="text" id="num_acta" v-model="acta.num_acta" name="num_acta" class="form-control" placeholder="Ingrese numero de acta" data-vv-as="numero de acta" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('num_acta')">{{ errors.first('num_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_levanto_acta">Fecha en que se levanto acta:</label>
                                <input type="date" id="fecha_levanto_acta" v-model="acta.fecha_levanto_acta" name="fecha_levanto_acta" class="form-control" data-vv-as="fecha de acta" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_levanto_acta')">{{ errors.first('fecha_levanto_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="año_acta">Año del acta:</label>
                                <input type="text" id="año_acta" v-model="acta.ao_acta" name="año_acta" class="form-control" data-vv-as="año de acta" v-validate="'required|numeric|max:4'">
                                <div class="invalid-feedback" v-if="errors.has('año_acta')">{{ errors.first('año_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asuntos_acta">Descripcion de los asuntos del acta:</label>
                                <input type="text" id="asuntos_acta" v-model="acta.asunto_acta" name="asuntos_acta" class="form-control" placeholder="Ingrese asunto" data-vv-as="asunto" v-validate="'required|max:255'">
                                <div class="invalid-feedback" v-if="errors.has('asuntos_acta')">{{ errors.first('asuntos_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="num_forjas">Numero de forjas del acta:</label>
                                <input type="text" id="num_forjas" name="num_forjas" v-model="acta.num_forjas" class="form-control" placeholder="Ingrese numero de forjas" data-vv-as="numero de forjas" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('num_forjas')">{{ errors.first('num_forjas') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b-form inline>
                                <label for="firmas_consejo">Cuenta con todas las firmas del consejo:</label>
                                 <b-form-checkbox
                                    id="firmas_consejo"
                                    v-model="acta.firmas_consejo"
                                    name="firmas_consejo"
                                    value="1"
                                    class="mx-3"
                                    switch
                                    >
                                </b-form-checkbox>
                                <!-- <input type="checkbox" id="firmas_consejo" v-model="acta.firmas_consejo" name="firmas_consejo" class="form-control" placeholder="Igrese descripcion del acuero"> -->
                            </b-form>
                        </div>
                        <div class="col-md-6">
                            <b-form inline>
                                <label for="sellos_validez">Cuenta con los sellos correspondientes:</label>
                                <b-form-checkbox
                                    id="sellos_validez"
                                    v-model="acta.sellos_validez"
                                    name="sellos_validez"
                                    value="1"
                                    switch
                                    >
                                </b-form-checkbox>
                                <!-- <input type="checkbox" id="sellos_validez" v-model="acta.sellos_validez" name="sellos_validez" class="form-control" placeholder="Igrese descripcion del acuero"> -->
                            </b-form>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="empleado">Servidor publico responsable:</label>
                                <v-select id="empleado" name="empleado" label="nombre" v-model="acta.empleado" :options="empleados.map(empleado =>( {id: empleado.id, nombre: empleado.user.nombre}))" v-validate="'required'" placeholder="Elige un empleado" >
                                </v-select>
                                <div class="invalid-feedback" style="display: block;" v-if="errors.has('empleado')">{{ errors.first('empleado') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button class="btn btn-danger">Cancelar</button>
                            <button class="btn btn-success">Guardar</button>
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
                        <th>Fecha</th>
                        <th>Empleado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr v-if="acuerdos.length === 0">
                        <td colspan="4" style="text-align: center;"> Sin registros. </td>
                    </tr>
                    <tr v-for="(acuerdo, index) in acuerdos" :key="index">
                        <td> {{ acuerdo.num_acta }} </td>
                        <td> {{ acuerdo.fecha_acta }} </td>
                        <td> {{ acuerdo.empleado.user.nombres }} {{ acuerdo.empleado.user.primer_ap }} {{ acuerdo.empleado.user.segundo_ap }} </td>
                        <td> <a class="btn btn-default" @click=editar(acuerdo)><i class="far fa-edit"></i></a> <a class="btn btn-default" @click="eliminar(acuerdo)"><i class="far fa-trash-alt"></i></a>  </td>
                    </tr> -->
                </tbody>
            </table>
    </b-card>
</div>

</template>

<script>
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
                acta: {
                    'num_acta': '',
                    'fecha_levanto_acta': '',
                    'ao_acta': '',
                    'asunto_acta': '',
                    'num_forjas': '',
                    'firmas_consejo':'0',
                    'sellos_validez': '0',
                    'empleado':'',
                },
                // acuerdos: JSON.parse(this.initialAcuerdos),
                // urlSdamuni: urlSdamuni,
                titulo: 'Actas registradas',
                colapsableEstado: false,
                empleados: JSON.parse(this.initialEmpleados),
                estadoFormulario: 1
            }
        },
        methods: {
            agregar () {
                this.titulo = 'Nueva acta'
                this.colapsableEstado = true
                this.estadoFormulario = 1
            },
            cancelar () {
                this.titulo = 'Actas registradas'
                this.colapsableEstado = false
                this.acta = {
                    'num_acta': '',
                    'fecha_levanto_acta': '',
                    'ao_acta': '',
                    'asunto_acta': '',
                    'num_forjas': '',
                    'firmas_consejo':'0',
                    'sellos_validez': '0',
                }
            },
            editar (acta) {
                this.titulo = 'Editar acta registrada'
                this.colapsableEstado = true
                this.estadoFormulario = 2
                this.acta = {
                    ...acta,
                    // empleado: {
                    //     id: acuerdo.empleado.id,
                    //     nombre: `${acuerdo.empleado.user.nombres} ${acuerdo.empleado.user.primer_ap} ${acuerdo.empleado.user.segundo_ap}`
                    // }
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
