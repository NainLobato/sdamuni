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
                            <label for="clave">Clave de acta donde consta el acuerdo pendiente de cumplir:</label>
                            <input type="text" id="clave" name="clave" class="form-control" placeholder="Ingrese clave" data-vv-as="clave" v-validate="'required|numeric|max:11'">
                            <div class="invalid-feedback" v-if="errors.has('clave')">{{ errors.first('clave') }}</div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="fecha_acta">Fecha de acta:</label>
                            <input type="date" id="fecha_acta" name="fecha_acta" class="form-control" data-vv-as="fecha de acta" v-validate="'required'">
                            <div class="invalid-feedback" v-if="errors.has('fecha_acta')">{{ errors.first('fecha_acta') }}</div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="acuerdo">Acuerdo:</label>
                            <input type="text" id="acuerdo" name="acuerdo" class="form-control" placeholder="Igrese descripcion del acuero" data-vv-as="acuerdo" v-validate="'required|max:255'">
                            <div class="invalid-feedback" v-if="errors.has('acuerdo')">{{ errors.first('acuerdo') }}</div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="empleado">Servidor publico responsable:</label>
                            <v-select name="empleado" v-validate="'required'" label="nombre" :options="empleados" placeholder="Elige un empleado" >
                                <slot name="no-options">¡No hay opciones disponibles!</slot>
                            </v-select>
                            <div class="invalid-feedback ver" v-if="errors.has('empleado')">{{ errors.first('empleado') }}</div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="accion_situacion">Acciones o situacion que guarda la atencion del acta:</label>
                            <input type="text" id="accion_situacion" name="accion_situacion" class="form-control" placeholder="Ingrese accion o situacion" data-vv-as="accion o situacion" v-validate="'required|max:255'">
                            <div class="invalid-feedback" v-if="errors.has('accion_situacion')">{{ errors.first('accion_situacion') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="comentarios">Comentarios:</label>
                            <textarea  rows="3" id="comentarios" name="comentarios" class="form-control" placeholder="Ingrese comentarios" data-vv-as="comentarios" v-validate="'max:255'"></textarea>
                            <div class="invalid-feedback" v-if="errors.has('comentarios')">{{ errors.first('comentarios') }}</div>
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
    <b-card
        header=""
        header-tag="header"
        align="center"
        style="max-width: auto; font-size: 18px;"
    >
    <b-card-body align="left">

    </b-card-body>
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
                acuerdos: this.initialAcuerdos,
                urlSdamuni: urlSdamuni,
                titulo: 'titulo',
                colapsableEstado: false,
                empleados: JSON.parse(this.initialEmpleados)
            }
        },
        methods: {
            agregar () {
                this.colapsableEstado = true
            },
            cancelar () {
                this.colapsableEstado = false
            },
            store () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(`${this.urlSdamuni}/store-acuerdo-pendiente`, { acuerdo: this.acuerdo })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal(
                                    'Exito!',
                                    'Se ha guardado el acuerdo pendiente correctamente.',
                                    'success'
                                )
                            } else if(response.data.estado == 1) {
                                Vue.swal(
                                    'Error!',
                                    'Ya existe la clave ingresada.',
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
            }
        },
        mounted() {
            console.log('whatever it takes')
        }
    }
</script>
