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
                            <label for="num_acta">Numero de acta donde consta el acuerdo pendiente de cumplir:</label>
                            <input type="text" id="num_acta" name="num_acta" v-model="acuerdo.num_acta" class="form-control" placeholder="Ingrese numero de acta" data-vv-as="numero" v-validate="'required|numeric|max:11'">
                            <div class="invalid-feedback" v-if="errors.has('num_acta')">{{ errors.first('num_acta') }}</div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="fecha_acta">Fecha de acta:</label>
                            <input type="date" id="fecha_acta" name="fecha_acta" v-model="acuerdo.fecha_acta" class="form-control" data-vv-as="fecha de acta" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('fecha_acta')">{{ errors.first('fecha_acta') }}</div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="acuerdo">Acuerdo:</label>
                            <input type="text" id="acuerdo" name="acuerdo" v-model="acuerdo.acuerdo" class="form-control" placeholder="Ingrese descripcion del acuero" data-vv-as="acuerdo" v-validate="'required|max:255'">
                            <div class="invalid-feedback" v-if="errors.has('acuerdo')">{{ errors.first('acuerdo') }}</div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="empleado">Servidor publico responsable:</label>
                            <v-select id="empleado" name="empleado" label="nombre" v-model="acuerdo.empleado" :options="empleados.map(empleado =>( {id: empleado.id, nombre: empleado.user.nombre}))" v-validate="'required'" placeholder="Elige un empleado" >
                            </v-select>
                            <div class="invalid-feedback" style="display: block;" v-if="errors.has('empleado')">{{ errors.first('empleado') }}</div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="accion_situacion">Acciones o situacion que guarda la atencion del acta:</label>
                            <input type="text" id="accion_situacion" name="accion_situacion" v-model="acuerdo.accion_situacion" class="form-control" placeholder="Ingrese accion o situacion" data-vv-as="accion o situacion" v-validate="'required|max:255'">
                            <div class="invalid-feedback" v-if="errors.has('accion_situacion')">{{ errors.first('accion_situacion') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="comentarios">Comentarios:</label>
                            <textarea  rows="3" id="comentarios" name="comentarios" v-model="acuerdo.comentarios" class="form-control" placeholder="Ingrese comentarios" data-vv-as="comentarios" v-validate="'required|max:255'"></textarea>
                            <div class="invalid-feedback" v-if="errors.has('comentarios')">{{ errors.first('comentarios') }}</div>
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
                        <th>Num acta</th>
                        <th>Fecha</th>
                        <th>Empleado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="acuerdos.length === 0">
                        <td colspan="4" style="text-align: center;"> Sin registros. </td>
                    </tr>
                    <tr v-for="(acuerdo, index) in acuerdos" :key="index">
                        <td> {{ acuerdo.num_acta }} </td>
                        <td> {{ acuerdo.fecha_acta }} </td>
                        <td> {{ acuerdo.empleado.user.nombres }} {{ acuerdo.empleado.user.primer_ap }} {{ acuerdo.empleado.user.segundo_ap }} </td>
                        <td> <a class="btn btn-default" @click=editar(acuerdo)><i class="far fa-edit"></i></a> <a class="btn btn-default" @click="eliminar(acuerdo)"><i class="far fa-trash-alt"></i></a>  </td>
                    </tr>
                </tbody>
            </table>
    </b-card>
</div>

</template>

<script>
    import urlSdamuni from '.././urlSdamuni';

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
                acuerdo: {
                    'num_acta': '',
                    'fecha_acta': '',
                    'acuerdo': '',
                    'empleado': '',
                    'accion_situacion': '',
                    'comentarios': '',
                },
                acuerdos: JSON.parse(this.initialAcuerdos),
                urlSdamuni: urlSdamuni,
                titulo: 'Acuerdos registrados',
                colapsableEstado: false,
                empleados: JSON.parse(this.initialEmpleados),
                estadoFormulario: 1
            }
        },
        methods: {
            agregar () {
                this.titulo = 'Nuevo acuerdo'
                this.colapsableEstado = true
                this.estadoFormulario = 1
            },
            cancelar () {
                this.titulo = 'Acuerdos registrados'
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
                this.titulo = 'Editar acuerdo registrado'
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
