<template>
<div>
    <b-card
        align="center"
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        no-body
        >
        <template slot="header">
        <span>Administrador de contratos, convenios, o acuerdos.</span>
        </template>
    </b-card>
    <div class="row">
        <div class="col-md-4">
            <b-card
                header="Juicios"
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
                header="Informacion del juicio"
                header-tag="header"
                align="center"
                style="max-width: auto; font-size: 18px;"
            >
                <b-card-body align="left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="concepto">Denominación del contrado, convenio o acuerdo:</label>
                                <input type="text" id="concepto" name="concepto" class="form-control" placeholder="Ingrese materia" data-vv-as="materia" v-validate="'required|max:50'">
                                <div class="invalid-feedback" v-if="errors.has('concepto')">{{ errors.first('concepto') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_suscribio">Fecha en que se suscribió el documento:</label>
                                <input type="date" id="fecha_suscribio" name="fecha_suscribio" class="form-control" data-vv-as="fecha_suscribio de juicio" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_suscribio')">{{ errors.first('fecha_suscribio') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de inicio de valides del documento:</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" data-vv-as="fecha_inicio de juicio" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_inicio')">{{ errors.first('fecha_inicio') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_termino">Fecha de termino de valides del documento:</label>
                                <input type="date" id="fecha_termino" name="fecha_termino" class="form-control" data-vv-as="fecha_termino de juicio" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_termino')">{{ errors.first('fecha_termino') }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monto">Monto que reprecenta la celebración:</label>
                                <input type="text" id="monto" name="monto" class="form-control" placeholder="Ingrese monto" data-vv-as="monto" v-validate="'required|max:100'">
                                <div class="invalid-feedback" v-if="errors.has('monto')">{{ errors.first('monto') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observaciones">Comentarios importantes respecto al documento:</label>
                                <input type="text" id="observaciones" name="observaciones" class="form-control" placeholder="Ingrese observaciones" data-vv-as="observaciones" v-validate="'required|max:20'">
                                <div class="invalid-feedback" v-if="errors.has('observaciones')">{{ errors.first('observaciones') }}</div>
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
