<template>
<div>
    <b-card
        align="center"
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        no-body
        >
        <template slot="header">
        <span>Administrador de juicios en proceso promovidos por el ayuntamiento</span>
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
