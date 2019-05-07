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
                                    <label for="denominaciones">Denominación del contrado, convenio o acuerdo:</label>
                                    <input type="text" id="denominaciones" name="denominaciones" v-model="documento.denominaciones" class="form-control" placeholder="Ingrese materia" data-vv-as="materia" v-validate="'required|max:50'">
                                    <div class="invalid-feedback" v-if="errors.has('denominaciones')">{{ errors.first('denominaciones') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_subscripcion">Fecha en que se suscribió el documento:</label>
                                    <input type="date" id="fecha_subscripcion" name="fecha_subscripcion" v-model="documento.fecha_subscripcion" class="form-control" data-vv-as="fecha_subscripcion de juicio" v-validate="'required'">
                                    <div class="invalid-feedback" v-if="errors.has('fecha_subscripcion')">{{ errors.first('fecha_subscripcion') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periodo_inicio">Fecha de inicio de valides del documento:</label>
                                    <input type="date" id="periodo_inicio" name="periodo_inicio" v-model="documento.periodo_inicio" class="form-control" data-vv-as="periodo_inicio de juicio" v-validate="'required'">
                                    <div class="invalid-feedback" v-if="errors.has('periodo_inicio')">{{ errors.first('periodo_inicio') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periodo_final">Fecha de termino de valides del documento:</label>
                                    <input type="date" id="periodo_final" name="periodo_final" v-model="documento.periodo_final" class="form-control" data-vv-as="periodo_final de juicio" v-validate="'required'">
                                    <div class="invalid-feedback" v-if="errors.has('periodo_final')">{{ errors.first('periodo_final') }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="importe">Importe que reprecenta la celebración:</label>
                                    <input type="text" id="importe" name="importe" v-model="documento.importe" class="form-control" placeholder="Ingrese importe" data-vv-as="importe" v-validate="'required|max:100'">
                                    <div class="invalid-feedback" v-if="errors.has('importe')">{{ errors.first('importe') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones">Comentarios importantes respecto al documento:</label>
                                    <input type="text" id="observaciones" name="observaciones" v-model="documento.observaciones" class="form-control" placeholder="Ingrese observaciones" data-vv-as="observaciones" v-validate="'required|max:20'">
                                    <div class="invalid-feedback" v-if="errors.has('observaciones')">{{ errors.first('observaciones') }}</div>
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
                        <th>Fecha suscribió</th>
                        <th>importe</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="documentos.length === 0">
                        <td colspan="4" style="text-align: center;"> Sin registros. </td>
                    </tr>
                    <tr v-for="(documento, index) in documentos" :key="index">
                        <td> {{ documento.denominaciones }} </td>
                        <td> {{ documento.fecha_subscripcion }} </td>
                        <td> {{ documento.importe }} </td>
                        <td> <a class="btn btn-default" @click=editar(documento)><i class="far fa-edit"></i></a> <a class="btn btn-default" @click="eliminar(documento)"><i class="far fa-trash-alt"></i></a>  </td>
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
            'initialDocumentos': {
                required: false
            },
        },
        data(){
            return{
                colapsableEstado: false,
                titulo: 'Contratos, convenios o acuerdos registrados',
                estadoFormulario: 1,
                documento: {
                    'denominaciones': '',
                    'fecha_subscripcion': '',
                    'periodo_inicio': '',
                    'periodo_final': '',
                    'importe': '',
                    'observaciones': '',
                },
                urlSdamuni: urlSdamuni,
                documentos: JSON.parse(this.initialDocumentos)
            }
        },
        methods: {
             agregar () {
                this.titulo = 'Nuevo contrato, convenio o acuerdo'
                this.colapsableEstado = true
                this.estadoFormulario = 1
            },
            cancelar () {
                this.titulo = 'Contratos, convenios o acuerdos registrados'
                this.colapsableEstado = false
                this.documento = {
                    'denominaciones': '',
                    'fecha_subscripcion': '',
                    'periodo_inicio': '',
                    'periodo_final': '',
                    'importe': '',
                    'observaciones': '',
                }
            },
            editar (documento) {
                this.titulo = 'Editar contrato, convenio o acuerdo registrado'
                this.colapsableEstado = true
                this.estadoFormulario = 2
                this.documento = {
                    ...documento
                }
            },
            store () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(`${this.urlSdamuni}/contrato-store`, { documento: this.documento })
                        .then( response => {
                            if (response.data.status == 1) {
                                Vue.swal({
                                title: 'Exito',
                                text: "Registro creado correctamente.",
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                })
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
            update () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(`${this.urlSdamuni}/contrato-update`, { documento: this.documento })
                        .then( response => {
                            if (response.data.status == 1) {
                                Vue.swal({
                                title: 'Exito',
                                text: "Registro actualizado correctamente.",
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                })
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
            eliminar (documento) {
                Vue.swal({
                    title: '¿Estas seguro de eliminar el documento '+documento.denominaciones+'?',
                    text: "No se podra revertir el cambio.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.value) {
                        axios.post(this.urlSdamuni+'/contrato-delete', {documento: { id: documento.id }})
                        .then(function (response) {
                            if (response.data.status === 1) {
                                Vue.swal({
                                    title: 'Exito',
                                    text: "Documento eliminado correctamente.",
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
