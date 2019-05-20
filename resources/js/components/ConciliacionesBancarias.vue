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
                                    <label for="cuenta">Cuenta:</label>
                                    <input type="text" id="cuenta" name="cuenta" v-model="documento.cuenta" class="form-control" placeholder="Ingrese cuenta" data-vv-as="materia" v-validate="'required|numeric|max:11'">
                                    <div class="invalid-feedback" v-if="errors.has('cuenta')">{{ errors.first('cuenta') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="banco">Banco:</label>
                                    <input type="text" id="banco" name="banco" v-model="documento.banco" class="form-control" placeholder="Ingrese banco" data-vv-as="materia" v-validate="'required|numeric|max:11'">
                                    <div class="invalid-feedback" v-if="errors.has('banco')">{{ errors.first('banco') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="depositos_municipio">Fecha en que se suscribió el documento:</label>
                                    <input type="text" id="depositos_municipio" name="depositos_municipio" v-model="documento.depositos_municipio" class="form-control" data-vv-as="deposito" v-validate="'required|digits:10|decimal:2'">
                                    <div class="invalid-feedback" v-if="errors.has('depositos_municipio')">{{ errors.first('depositos_municipio') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cheques_noCobrados">Fecha de inicio de valides del documento:</label>
                                    <input type="text" id="cheques_noCobrados" name="cheques_noCobrados" v-model="documento.cheques_noCobrados" class="form-control" data-vv-as="cheques cobrados" v-validate="'required|digits:10|decimal:2'">
                                    <div class="invalid-feedback" v-if="errors.has('cheques_noCobrados')">{{ errors.first('cheques_noCobrados') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargos_noConsiderados">Fecha de termino de valides del documento:</label>
                                    <input type="text" id="cargos_noConsiderados" name="cargos_noConsiderados" v-model="documento.cargos_noConsiderados" class="form-control" data-vv-as="cargos_noConsiderados de juicio" v-validate="'required|digits:10|decimal:2'">
                                    <div class="invalid-feedback" v-if="errors.has('cargos_noConsiderados')">{{ errors.first('cargos_noConsiderados') }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="depositos_banco">depositos_banco que reprecenta la celebración:</label>
                                    <input type="text" id="depositos_banco" name="depositos_banco" v-model="documento.depositos_banco" class="form-control" placeholder="Ingrese depositos_banco" data-vv-as="depositos_banco" v-validate="'required|digits:10|decimal:2'">
                                    <div class="invalid-feedback" v-if="errors.has('depositos_banco')">{{ errors.first('depositos_banco') }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="saldo_actualizado">Comentarios importantes respecto al documento:</label>
                                    <input type="text" id="saldo_actualizado" name="saldo_actualizado" v-model="documento.saldo_actualizado" class="form-control" placeholder="Ingrese saldo actualizado" data-vv-as="saldo_actualizado" v-validate="'required|digits:10|decimal:2'">
                                    <div class="invalid-feedback" v-if="errors.has('saldo_actualizado')">{{ errors.first('saldo_actualizado') }}</div>
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
                </tbody>
            </table>
        </b-card>
    </div>
</template>

<script>
    import urlSdamuni from '.././urlSdamuni';
    export default {
        props: {

        },
        data(){
            return{
                colapsableEstado: false,
                titulo: 'Contratos, convenios o acuerdos registrados',
                estadoFormulario: 1,
                documento: {
                    'cuenta': '',
                    'depositos_municipio': '',
                    'cheques_noCobrados': '',
                    'cargos_noConsiderados': '',
                    'depositos_banco': '',
                },
                urlSdamuni: urlSdamuni,
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
            },
            editar (documento) {
                this.titulo = 'Editar contrato, convenio o acuerdo registrado'
                this.colapsableEstado = true
                this.estadoFormulario = 2
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
