<template>
     <div class="card ">
                <div v-if="editando==true" class="card-header">
                    <h5 class="card-title text-center">Información municipal</h5>
                    <div class="card-tools">
                         <!-- <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button> -->
                    </div>
                </div>
                <div class="">
                    <div v-if="editando==false" class="row ">
                            <div  class="col-md-12">
                                <div class=" text-center">
                                    <h5><strong>Mi municipio</strong></h5>
                                </div>
                                <div class="row mx-1">
                                    <div class="col-md-2">
                                        <img :src='logo' class="center img-circle-2 elevation-2" alt="">
                                    </div>
                                     <div class="col-md-10">
                                        <div class="row mr-2">
                                            <div class="col-md-4">
                                                <label for="claveMunicipio">Clave del municipio</label>
                                                <h6 v-html="claveNombre"></h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nombreMunicipio">Municipio</label>
                                                <h6 v-html="municNombre"></h6>
                                            </div>
                                            <div class="col-md-2 ">
                                                <label for="distrito">Distrito</label>
                                                <h6 v-html="distrito"></h6>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="partido">Partido político</label>
                                                <h6 v-html="partido"></h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="telefono1">Telefono 1</label>
                                                <h6 v-html="telefono1"></h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="telefono2">Telefono 2</label>
                                                <h6 v-html="telefono2" > </h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="correo">Correo electrónico municipal</label>
                                                <h6 v-html="correo" ></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-12 text-right mr-2">
                            <button class="btn-form" v-on:click="editar()"><i class="fas fa-edit"></i></button>
                        </div>
                    </div>
                    <form v-if="editando==true" v-on:submit.prevent="onSubmit">
                        <div  class="row mx-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <img :src='logo' class="img-circle-2 elevation-2" alt="">
                                        </div>
                                    <div>
                                    <div class="form-group">
                                        <label for="claveMunicipio">Clave del municipio</label>
                                        <v-select :options="claveMunicipio" v-model="claveMunicSelec" label="nombre" placeholder="Elige un municipio" >
                                            <slot name="no-options">¡No hay opciones disponibles!</slot>
                                        </v-select>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombreMunicipio">Municipio</label>
                                                <v-select :options="munic" v-model="municSel" label="nombre" placeholder="Elige un municipio" >
                                                    <slot name="no-options">¡No hay opciones disponibles!</slot>
                                                </v-select>
                                                <!-- <p v-html="nombreMunicipio"></p> -->
                                                <!-- <input type="text" id="nombreMunicipio" v-model="nombreMunicipio" class="form-control" placeholder="Ingrese la clave"> -->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="distrito">Distrito</label>
                                                <input type="text" id="distrito" v-model="distrito" class="form-control" placeholder="Ingrese la clave">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono1">Telefono 1</label>
                                            <input type="text" id="telefono1" v-model="telefono1" class="form-control" placeholder="Ingrese telefono">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono2">Telefono 2</label>
                                            <input type="text" id="telefono2" v-model="telefono2" class="form-control" placeholder="Ingrese telefono">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo">Correo electrónico municipal</label>
                                            <input type="text" id="correo" v-model="correo" class="form-control" placeholder="Ingrese telefono">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="partido">Partido político</label>
                                            <input type="text" id="partido" v-model="partido" class="form-control" placeholder="Ingrese el partido">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mb-2">
                                <button type="button" v-on:click="cancelarEdicion()" class="btn btn-secondary">Cancelar edición</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</template>

<script>
    import vSelect from 'vue-select'
    import 'vue-select/dist/vue-select.css';
    Vue.component('v-select', vSelect)
    export default {
        data(){
            return{
                logo: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/avatar5.png',
                claveMunicipio:[{id:1,nombre:'PERRON'}],
                claveMunicSelec:{id:1,nombre:'PERRON'},
                munic:[{id:1,nombre:'ZONGOLICA'}],
                municSel:{id:1,nombre:'ZONGOLICA'},
                distrito:'DXI',
                telefono1:'22558141145',
                telefono2:'2251488787',
                correo:'municipio@munic.com',
                partido:'PRD-PAN',
                editando:false,
                claveNombre:'',
                municNombre:''

            }

        },
        props:['municipios'],
        mounted() {
            if(this.editando==false){
                console.log('es falso')
                this.claveNombre= this.claveMunicSelec.nombre
                this.municNombre= this.municSel.nombre
            }
            console.log('Component mounted.')
        },
        created(){

        },
        methods:{
            onSubmit(){
                const urlStoreAyuntamiento = route('ayuntamiento.store')
                console.log(urlStoreAyuntamiento)
                console.log('hola que hace')
            },
            editar(){
                this.editando = true
            },
            cancelarEdicion(){
                this.editando=false
            }
        }
    }
</script>
