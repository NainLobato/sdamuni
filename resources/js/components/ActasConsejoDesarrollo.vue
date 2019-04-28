<template>
<div>
    <b-card
        align="center"
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        no-body
        >
        <template slot="header">
        <span>Administrador de actas del consejo de desarrollo municipal</span>
        </template>
    </b-card>
    <div class="row">
        <div class="col-md-4">
            <b-card
                header="Actas"
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
                header="Informacion del acta"
                header-tag="header"
                align="center"
                style="max-width: auto; font-size: 18px;"
            >
                <b-card-body align="left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="num_acta">Numero de acta de consejo:</label>
                                <input type="text" id="num_acta" name="num_acta" class="form-control" placeholder="Ingrese numero de acta" data-vv-as="numero de acta" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('num_acta')">{{ errors.first('num_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_levanto_acta">Fecha en que se levanto acta:</label>
                                <input type="date" id="fecha_levanto_acta" name="fecha_levanto_acta" class="form-control" data-vv-as="fecha de acta" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_levanto_acta')">{{ errors.first('fecha_levanto_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="año_acta">Año del acta:</label>
                                <input type="date" id="año_acta" name="año_acta" class="form-control" data-vv-as="año de acta" v-validate="'required|numeric|max:4'">
                                <div class="invalid-feedback" v-if="errors.has('año_acta')">{{ errors.first('año_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asuntos_acta">Descripcion de los asuntos del acta:</label>
                                <input type="text" id="asuntos_acta" name="asuntos_acta" class="form-control" placeholder="Ingrese asunto" data-vv-as="asunto" v-validate="'required|max:255'">
                                <div class="invalid-feedback" v-if="errors.has('asuntos_acta')">{{ errors.first('asuntos_acta') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="num_forjas">Numero de forjas del acta:</label>
                                <input type="text" id="num_forjas" name="num_forjas" class="form-control" placeholder="Ingrese numero de forjas" data-vv-as="numero de forjas" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('num_forjas')">{{ errors.first('num_forjas') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firmas_consejo">Cuenta con todas las firmas del consejo:</label>
                                <input type="checkbox" id="firmas_consejo" name="firmas_consejo" class="form-control" placeholder="Igrese descripcion del acuero">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sellos_validez">Cuenta con los sellos correspondientes:</label>
                                <input type="checkbox" id="sellos_validez" name="sellos_validez" class="form-control" placeholder="Igrese descripcion del acuero">
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
