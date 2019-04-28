<template>
<div>
    <b-card
        align="center"
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        no-body
        >
        <template slot="header">
        <span>Administrador de libros de actas de cabildo</span>
        </template>
    </b-card>
    <div class="row">
        <div class="col-md-4">
            <b-card
                header="Libros"
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
                header="Informacion del libro"
                header-tag="header"
                align="center"
                style="max-width: auto; font-size: 18px;"
            >
                <b-card-body align="left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="clave">Clave:</label>
                                <input type="text" id="clave" name="clave" class="form-control" placeholder="Ingrese clave" data-vv-as="clave" v-validate="'required|max:255'">
                                <div class="invalid-feedback" v-if="errors.has('clave')">{{ errors.first('clave') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_primer_sesion">Fecha de sesion de primer acta:</label>
                                <input type="date" id="fecha_primer_sesion" name="fecha_primer_sesion" class="form-control" data-vv-as="fecha de primer sesion" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_primer_sesion')">{{ errors.first('fecha_primer_sesion') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_ultima_sesion">Fecha de sesion de ultima acta:</label>
                                <input type="date" id="fecha_ultima_sesion" name="fecha_ultima_sesion" class="form-control" data-vv-as="fecha de ultima sesion" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_ultima_sesion')">{{ errors.first('fecha_ultima_sesion') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primer_folio">Primer folio:</label>
                                <input type="text" id="primer_folio" name="primer_folio" class="form-control" placeholder="Ingrese folio de la primer acta" data-vv-as="primer folio" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('primer_folio')">{{ errors.first('primer_folio') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ultimo_folio">Ultimo folio:</label>
                                <input type="text" id="ultimo_folio" name="ultimo_folio" class="form-control" placeholder="Ingrese folio de la ultima acta" data-vv-as="ultimo folio" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('ultimo_folio')">{{ errors.first('ultimo_folio') }}</div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="comentarios">Comentarios:</label>
                                <textarea  rows="3" id="comentarios" name="comentarios" class="form-control" placeholder="Ingrese comentarios" data-vv-as="comentarios" v-validate="'alpha_dash_field|max:255'"></textarea>
                                <div class="invalid-feedback" v-if="errors.has('comentarios')">{{ errors.first('comentarios') }}</div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="ubicacion">Ubicacion:</label>
                                <input type="text" id="ubicacion" name="ubicacion" class="form-control" placeholder="Ingrese ubicacion de comentarios" data-vv-as="ubicacion" v-validate="'alpha_dash_field|max:255'">
                                <div class="invalid-feedback" v-if="errors.has('ubicacion')">{{ errors.first('ubicacion') }}</div>
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
