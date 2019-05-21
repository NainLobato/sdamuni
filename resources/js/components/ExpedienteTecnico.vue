<template>
<div>
    <!-- <div >
        <b-input-group class="col-lg-6 mx-auto my-2">
            <b-input-group-prepend>
                <span class="input-group-text"><i class="fas fa-search fa-lg"></i></span>
            </b-input-group-prepend>
            <b-form-input class="LoginInput" size="lg" placeholder="Username">
            </b-form-input>
        </b-input-group>
    </div> -->
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
                <table>
                    <tr></tr>
                </table>
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
                    <tr>
                        <td> 2019300010001 </td>
                        <td> Descripcion obra </td>
                        <td> 10-10-2019</td>
                        <td> 12-12-2019</td>
                        <td> 09-09-2019</td>
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
            'initialCatTenico': {
                required: false
            }
        },
        data(){
            return{
                urlSdamuni: urlSdamuni,
                titulo: 'Expediente técnico unitario de obra pública',
                colapsableEstado: false,
                estadoFormulario: 1,
                catTenico: this.initialCatTenico
            }
        },
        methods: {
            agregar () {
                this.titulo = 'Nueva expediente técnico unitario'
                this.colapsableEstado = true
                this.estadoFormulario = 1
            },
            cancelar () {
                this.titulo = 'Expediente técnico unitario de obra pública'
                this.colapsableEstado = false
            },
            editar (acuerdo) {
                this.titulo = 'Editar expediente técnico unitario registrado'
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
    .card-registro{
        position:absolute;
        width: 90%;
        z-index: 1;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;

    }
</style>
