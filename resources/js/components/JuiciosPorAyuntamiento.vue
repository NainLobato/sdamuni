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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo">Materia a la que pertenece el juicio:</label>
                                <input type="text" id="tipo" name="tipo" class="form-control" placeholder="Ingrese materia" data-vv-as="materia" v-validate="'required|max:50'">
                                <div class="invalid-feedback" v-if="errors.has('tipo')">{{ errors.first('tipo') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha en que inicio el juicio:</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" data-vv-as="fecha de juicio" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_inicio')">{{ errors.first('fecha_inicio') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instancia">Instancia encargada del analisis y resolucion:</label>
                                <input type="text" id="instancia" name="instancia" class="form-control" placeholder="Ingrese instancia" data-vv-as="instancia" v-validate="'required|max:100'">
                                <div class="invalid-feedback" v-if="errors.has('instancia')">{{ errors.first('instancia') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="etapa">Etapa en la que se encuentra el juicio:</label>
                                <input type="text" id="etapa" name="etapa" class="form-control" placeholder="Ingrese etapa" data-vv-as="etapa" v-validate="'required|max:20'">
                                <div class="invalid-feedback" v-if="errors.has('etapa')">{{ errors.first('etapa') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="imputado">Nombre de la persona contra quien interpuso el juicio el ayuntamiento:</label>
                                <input type="text" id="imputado" name="imputado" class="form-control" placeholder="Ingrese nombre" data-vv-as="nombre" v-validate="'required|max:200'">
                                <div class="invalid-feedback" v-if="errors.has('imputado')">{{ errors.first('imputado') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Motivo por el cual se instauro el juicio por el ayuntamiento:</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese motivo" data-vv-as="motivo" v-validate="'required|max:1000'">
                                <div class="invalid-feedback" v-if="errors.has('descripcion')">{{ errors.first('descripcion') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="acciones">Acciones que deben realizarce opurtanemente en el marco del proceso juridico:</label>
                                <input type="text" id="acciones" name="acciones" class="form-control" placeholder="Ingrese acciones" data-vv-as="acciones" v-validate="'required|max:1000'">
                                <div class="invalid-feedback" v-if="errors.has('acciones')">{{ errors.first('acciones') }}</div>
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
                        <th>Materia</th>
                        <th>Fecha</th>
                        <th>Etapa</th>
                        <th>Motivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="juicios.length === 0">
                        <td colspan="5" style="text-align: center;"> Sin registros. </td>
                    </tr>
                    <tr v-for="(juicio, index) in juicios" :key="index">
                        <td> {{ juicio.num_acta }} </td>
                        <td> {{ juicio.fecha_levanto_acta }} </td>
                        <td> {{ juicio.etapa }} </td>
                        <td> {{ juicio.asuntos_acta }} </td>
                        <td> <a class="btn btn-default" @click=editar(juicio)><i class="far fa-edit"></i></a> <a class="btn btn-default" @click="eliminar(juicio)"><i class="far fa-trash-alt"></i></a>  </td>
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
            'initialJuicios': {
                required: false
            },
            // 'initialEmpleados': {
            //     required: false
            // }
        },
        data(){
            return{
                juicio: {
                    'tipo':'',
                    'fecha_inicio':'',
                    'instancia':'',
                    'etapa':'',
                    'imputado':'',
                    'descripcion':'',
                    'acciones':'',
                },
                juicios: JSON.parse(this.initialJuicios),
                urlSdamuni: urlSdamuni,
                titulo: 'Juicios registrados',
                colapsableEstado: false,
                estadoFormulario: 1
            }
        },
        methods: {
            agregar () {
                this.titulo = 'Nuevo juicio'
                this.colapsableEstado = true
                this.estadoFormulario = 1
            },
            cancelar () {
                this.titulo = 'Juicios registrados'
                this.colapsableEstado = false
                this.juicio = {
                    'tipo':'',
                    'fecha_inicio':'',
                    'instancia':'',
                    'etapa':'',
                    'imputado':'',
                    'descripcion':'',
                    'acciones':'',
                }
            },
            editar (juicio) {
                this.titulo = 'Editar juicio registrado'
                this.colapsableEstado = true
                this.estadoFormulario = 2
                this.juicio = {
                    ...juicio,
                }
            },
            store () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(route('jucios-por-ayuntamiento.store').template, { juicio: this.juicio })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal({
                                title: 'Exito',
                                text: "Acta creada correctamente.",
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
                                    'Ya existe el numero de juicio ingresado.',
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
                        axios.post(route('jucios-por-ayuntamiento.update').template, { juicio: this.juicio })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal({
                                title: 'Exito',
                                text: "juicio actualizado correctamente.",
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
                                    'Ya existe el numero de juicio ingresado.',
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
            eliminar (juicio) {
                Vue.swal({
                    title: '¿Estas seguro de eliminar el juicio '+juicio.num_acta+'?',
                    text: "No se podra revertir el cambio.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.value) {
                        axios.post(route('jucios-por-ayuntamiento.delete').template, {idActa: juicio.id})
                        .then(function (response) {
                            if (response.data.estado === 1) {
                                Vue.swal({
                                    title: 'Exito',
                                    text: "juicio eliminado correctamente.",
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
