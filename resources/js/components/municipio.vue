<template>
    <div>
        <div class="card ">
                <div v-if="editando==true || create==1" class="card-header">
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
                    <div v-if="editando==false && create==0" class="row ">
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
                                                <!-- <h6 name="distrito" v-html="distriSel.nombre"></h6> -->
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
                    <form v-if="editando==true || create==1" v-on:submit.prevent="onSubmit">
                        <div  class="row mx-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="file" v-on:change="onFileChange" name="" id="">
                                        <!-- <div class="text-center">
                                            <file-pond
                                            v-model="imgEscudo"
                                                name="test"
                                                ref="pond"
                                                class-name="my-pond"
                                                label-idle="Drop files here..."
                                                allow-multiple="false"
                                                accepted-file-types="image/jpeg, image/png"
                                                v-bind:files="logo"
                                                v-on:init="handleFilePondInit()"/>
                                            <img :src='logo' class="img-circle-2 elevation-2" alt="">
                                        </div> -->
                                    <div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div>
                                            <div class="form-group">
                                                <label for="claveMunicipio">Clave del municipio</label>
                                                <v-select :options="claveMunicipio" v-model="claveMunicSelec" label="nombre" placeholder="Elige un municipio" >
                                                    <slot name="no-options">¡No hay opciones disponibles!</slot>
                                                </v-select>
                                            </div>
                                        </div> -->
                                            <div class="form-group">
                                                <label for="nombreMunicipio">Municipio</label>
                                                <v-select :options="munic" v-model="municSel" name="nombreMunicipio" id="nombreMunicipio" label="nombre" @input="selecMunic()" placeholder="Elige un municipio" data-vv-as="nombre del municipio" v-validate="'required'" >
                                                    <slot name="no-options">¡No hay opciones disponibles!</slot>
                                                </v-select>
                                                <div class="invalid-feedback" v-if="errors.has('nombreMunicipio')">{{ errors.first('nombreMunicipio') }}</div>
                                                <h6 class="mt-2"><strong>Clave del municipio</strong> <span v-html="claveMunicSelec"></span> </h6>
                                                <!-- <p v-html="nombreMunicipio"></p> -->
                                                <!-- <input type="text" id="nombreMunicipio" v-model="nombreMunicipio" class="form-control" placeholder="Ingrese la clave"> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="distrito">Distrito</label>
                                                <v-select :options="distri" v-model="distriSel" label="nombre" @input="selecMunic()"  placeholder="Elige un distrito" >
                                                    <slot name="no-options">¡No hay opciones disponibles!</slot>
                                                </v-select>
                                                <!-- <input type="text" id="distrito" v-model="distrito" class="form-control" placeholder="Ingrese la clave"> -->
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
                                            <v-select :options="partidox" v-model="partido" label="nombre"  :multiple="true" placeholder="Elige un partido" >
                                                    <slot name="no-options">¡No hay opciones disponibles!</slot>
                                                </v-select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mb-2">
                                <button type="button" v-if="editando==true" v-on:click="cancelarEdicion()" class="btn btn-secondary">Cancelar edición</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div v-if="create==1" class="card">
                    <div class="card-header text-center">
                        <h6><strong>Ayuntamientos registrados</strong></h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Municipio</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(ayunta, index) in ayuntamientos" :key="index">
                                <td>{{ayunta.id}}</td>
                                <td>{{ayunta.correo}}</td>
                                <td>{{ayunta.telefono1}}</td>
                                <td><i class="fas fa-edit"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select'
    import 'vue-select/dist/vue-select.css';
    import vueFilePond from 'vue-filepond';
    import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
    import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';

    // Import styles
    import 'filepond/dist/filepond.min.css';
    import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
    const FilePond = vueFilePond( FilePondPluginFileValidateType, FilePondPluginImagePreview );
    Vue.component('v-select', vSelect)
    export default {
        data(){
            return{
                logo: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/avatar5.png',
                claveMunicipio:'',
                claveMunicSelec:'',
                munic:[],
                municSel:'',
                distri:[],
                distriSel:'',
                telefono1:'22558141145',
                telefono2:'2251488787',
                correo:'municipio@munic.com',
                partidox:[],
                partido:[],
                editando:false,
                claveNombre:'',
                municNombre:'',
                imgEscudo:'',
                ayuntamiento:[]

            }

        },
        props:['municipios','create','distritos','partidos','ayuntamientos'],
        mounted() {
            if(this.editando==false){
                console.log('es falso')
                this.claveNombre= this.claveMunicSelec.nombre
                this.municNombre= this.municSel.nombre
            }
            if(this.municipios){
                this.munic = this.municipios
            }
            if(this.distritos){
                this.distri = this.distritos
            }
            if(this.partidos){
                this.partidox = this.partidos
            }
            // if(this.ayuntamientos){
            //     this.ayuntamiento
            // }
            console.log('Component mounted.')
        },
        created(){

        },
        components:{
            FilePond
        },
        methods:{
            onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
                this.imgEscudo= files[0]
                this.createImage(files[0]);
            },
            createImage(file) {
                var imgEscudo = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.imgEscudo = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            onSubmit(file){
                 this.$validator.validate().then(valid => {
                     if (valid) {}
                     else{}
                 })
                const urlStoreAyuntamiento = route('ayuntamiento.store').template
                console.log(urlStoreAyuntamiento)
                let ayuntamiento={
                    municipio_id : this.municSel.id,
                    distrito_id: this.distriSel.id,
                    partido_id:this.partido,
                    escudo: this.imgEscudo,
                    telefono1: this.telefono1,
                    telefono2: this.telefono2,
                    correo: this.correo
                }
                axios.post(urlStoreAyuntamiento,{ayuntamiento:ayuntamiento}).then(response => {
                   console.log(reponse.data)
                })
                .catch(error => {
                    console.log(error)
                })
                console.log(ayuntamiento)
            },
            editar(){
                const urlCreateAyuntamiento = route('ayuntamiento.create')
                console.log(urlCreateAyuntamiento);
                this.editando = true
            },
            cancelarEdicion(){
                this.editando=false
            },
            handleFilePondInit() {
            // console.log('FilePond has initialized');

            // example of instance method call on pond reference
            this.imgEscudo =this.$refs.pond.getFiles()

            },
            selecMunic(data){
                this.claveMunicSelec = this.municSel.clave

            },

        }
    }
</script>
