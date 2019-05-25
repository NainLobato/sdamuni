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
            <b-card-body>
                <div class="col-md-12" >
                    <div class="form-group">
                        <label for="modalidad_contrato">Modalidad ejecucion:</label>
                        <v-select id="modalidad_contrato" :options="modalidades_contrato" v-model="modalidad" label="nombre" name="modalidad_contrato" v-validate="'required'" placeholder="Elige un modalidad" >
                        </v-select>
                        <div class="invalid-feedback" style="display: block;" v-if="errors.has('modalidad_contrato')">{{ errors.first('modalidad_contrato') }}</div>
                    </div>
                    <template v-if="modalidad">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="modalidad.value == 1">
                                    <tr v-for="(item, index) in cat_adju" :key="index">
                                        <td> {{ item.nombre}} </td>
                                        <td> <input type="checkbox" name="" id=""> </td>
                                    </tr>
                                </template>
                                <template v-if="modalidad.value == 2">
                                    <tr v-for="(item, index) in cat_invi" :key="index">
                                        <td> {{ item.nombre}} </td>
                                        <td> <input type="checkbox" name="" id=""> </td>
                                    </tr>
                                </template>
                                <template v-if="modalidad.value == 3">
                                    <tr v-for="(item, index) in cat_lici" :key="index">
                                        <td> {{ item.nombre}} </td>
                                        <td> <input type="checkbox" name="" id=""> </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </template>
                </div>
            <br><br><br><br>
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
            },
            'initialCatAdju': {
                required: false
            },
            'initialCatInvi': {
                required: false
            },
            'initialCatLici': {
                required: false
            }

        },
        data(){
            return{
                urlSdamuni: urlSdamuni,
                titulo: 'Expediente técnico unitario de obra pública',
                colapsableEstado: false,
                estadoFormulario: 1,
                catTenico: this.initialCatTenico,
                modalidades_contrato: [
                    {nombre: 'Adjudicación directa ', value: 1},
                    {nombre: 'invitación', value: 2},
                    {nombre: 'licitación pública', value: 3}
                ],
                cat_adju: JSON.parse(this.initialCatAdju),
                cat_invi: JSON.parse(this.initialCatInvi),
                cat_lici: JSON.parse(this.initialCatLici),
                modalidad: ''

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
