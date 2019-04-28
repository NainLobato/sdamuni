<template>
<div>
    <b-card
        align="center"
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        no-body
        >
        <template slot="header">
        <span>Administrador de acuerdos de cabildo pendientes</span>
        </template>
    </b-card>
    <div class="row">
        <div class="col-md-4">
            <b-card
                header="Acuerdos"
                header-tag="header"
                align="center"
                style="max-width: auto; font-size: 18px;"
            >
            <b-card-body align="left">
                <li>1</li>
                <li>2</li>
            </b-card-body>
            </b-card>
        </div>
        <div class="col-md-8">
            <b-card
                header="Informacion del acuerdo"
                header-tag="header"
                align="center"
                style="max-width: auto; font-size: 18px;"
            >
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
                                <v-select name="empleado" label="nombre" v-validate="'required'"  placeholder="Elige un empleado" >
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
            </b-card>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        data(){
            return{

            }
        },
        mounted() {
            console.log('whatever it takes')
        }
    }
</script>
