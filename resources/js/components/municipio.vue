<template>
    <div>
        <div class="card card-select">
                <div v-if="editando==true || create==1" class="card-header">
                    <h5 class="card-title text-center">Creación y edición de ayuntamientos</h5>
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
                                        <img :src='ayuntamiento.logo' class="center img-circle-2 elevation-2" alt="">
                                    </div>
                                     <div class="col-md-10">
                                        <div class="row mr-2">
                                            <div class="col-md-4">
                                                <label for="claveMunicipio">Clave del municipio</label>
                                                <h6 v-html="ayuntamiento.claveNombre"></h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nombreMunicipio">Municipio</label>
                                                <h6 v-html="ayuntamiento.municNombre"></h6>
                                            </div>
                                            <div class="col-md-2 ">
                                                <label for="distrito">Distrito</label>
                                                <!-- <h6 name="distrito" v-html="distriSel.nombre"></h6> -->
                                            </div>
                                            <div class="col-md-2">
                                                <label for="partido">Partido político</label>
                                                <h6 v-html="ayuntamiento.partidos"></h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="telefono1">Telefono 1</label>
                                                <h6 v-html="ayuntamiento.telefono1"></h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="telefono2">Telefono 2</label>
                                                <h6 v-html="ayuntamiento.telefono2" > </h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="correo">Correo electrónico municipal</label>
                                                <h6 v-html="ayuntamiento.correo" ></h6>
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
                                    <div class="col-md-6 text-center">
                                        <div id="profile">
                                        <div class="dashes"></div>
                                        <label>Da click para agregar una imagen</label></div>
                                        <input type="file" v-if="editando==true" id="mediaFile"  v-validate="`${ imagenCargada == 1 ? 'image||required' : ''}`"  name="imagen"/>
                                        <input type="file" v-else="" id="mediaFile"  v-validate="'image||required'"  name="imagen"/>

                                    <div>
                                        <div class="invalid-feedback ver errorImagen" v-if="errors.has('imagen')">{{ errors.first('imagen') }}</div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombreMunicipio">Municipio</label>
                                            <v-select :options="municipios" v-model="ayuntamiento.municipio" name="nombreMunicipio"  label="nombre"  placeholder="Elige un municipio"  v-validate="'required'" @input="selecMunic()">
                                                <slot name="no-options">¡No hay opciones disponibles!</slot>
                                            </v-select>
                                            <div class="invalid-feedback ver" v-if="errors.has('nombreMunicipio')">{{ errors.first('nombreMunicipio') }}</div>
                                        </div>
                                        <h6 class="mt-2"><strong>Clave del municipio</strong> <span v-html="claveMunicSelec"></span> </h6>
                                        <div class="form-group">
                                            <label for="distrito">Distrito</label>
                                            <v-select :options="distritos" v-model="ayuntamiento.distrito" name="distrito" label="nombre" @input="selecMunic()" v-validate="'required'"  placeholder="Elige un distrito" >
                                                <slot name="no-options">¡No hay opciones disponibles!</slot>
                                            </v-select>
                                            <div class="invalid-feedback ver" v-if="errors.has('distrito')">{{ errors.first('distrito') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono1">Telefono 1</label>
                                            <input type="text" id="telefono1" v-model="ayuntamiento.telefono1" name="telefono1" class="form-control" placeholder="Ingrese telefono" data-vv-as="teléfono uno" v-validate="'required||length:10'">
                                            <div class="invalid-feedback ver" v-if="errors.has('telefono1')">{{ errors.first('telefono1') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono2">Telefono 2</label>
                                            <input type="text" id="telefono2" v-model="ayuntamiento.telefono2" name="telefono2" class="form-control" placeholder="Ingrese telefono" data-vv-as="teléfono dos" v-validate="'required||length:10'" >
                                            <div class="invalid-feedback ver" v-if="errors.has('telefono2')">{{ errors.first('telefono2') }}</div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo">Correo electrónico municipal</label>
                                            <input type="text" id="correo" v-model="ayuntamiento.correo" name="correo" class="form-control" placeholder="Ingrese email" v-validate="'required||email'">
                                            <div class="invalid-feedback ver" v-if="errors.has('correo')">{{ errors.first('correo') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="partido">Partido político</label>
                                            <v-select :options="partidos" v-model="ayuntamiento.partidos" label="nombre" name="partido" :multiple="true" placeholder="Elige un partido" v-validate="'required'" >
                                                    <slot name="no-options">¡No hay opciones disponibles!</slot>
                                                </v-select>
                                            <div class="invalid-feedback ver" v-if="errors.has('partido')">{{ errors.first('partido') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mb-2">
                                <button type="button" v-if="editando==true" v-on:click="cancelarEdicion()" class="btn btn-secondary">Cancelar edición</button>
                                <button type="button"  v-if="editando==true" v-on:click="update()" class="btn btn-primary">Actualizar</button>
                                <button type="submit" v-else="" class="btn btn-primary">Guardar</button>
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
                                <th class=" text-center">Escudo</th>
                                <th class=" text-center">Ayuntamiento</th>
                                <th class=" text-center">Correo</th>
                                <th class=" text-center">Telefono</th>
                                <th class=" text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(ayunta, index) in ayuntamientos" :key="index">
                                <td class="text-center"><img class="imagenTabla" :src="'data:image/'+ayunta.formato+';base64,' + ayunta.escudo  " alt=""></td>
                                <td class="text-center">{{ayunta.municipio.nombre}}</td>
                                <td class="text-center">{{ayunta.correo}}</td>
                                <td class="text-center">{{ayunta.telefono1}}</td>
                                <td class="text-center">
                                    <button v-on:click="editar(ayunta)" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                                    <button v-on:click="eliminar(ayunta.id)" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
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
    Vue.component('v-select', vSelect)
    export default {
        data(){
            return{
                imagenCargada:0,
                editando:false,
                imgEscudo:window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/escudo.png',
                claveMunicipio:'',
                claveNombre:'',
                municNombre:'',
                claveMunicSelec:'',
                ayuntamiento:{
                    logo: '',
                    municipio:'',
                    partidos:[],
                    distrito:'',
                    telefono1:'',
                    telefono2:'',
                    correo:'',
                    partidox:[],
                    escudo:'',
                    id:'',

                }
                // correo:"ijopuo@munic.com"
                // created_at:"2019-04-25 20:45:02"
                // deleted_at:null
                // escudo:"1556243101.png"
                // id:4
                // municipio:Object
                // municipio_id:29
                // partidos:Array[0]
                // telefono1:"1121578454"
                // telefono2:"2251488787"
                // updated_at:"2019-04-25 20:45:02"

            }

        },
        props:['municipios','create','distritos','partidos','ayuntamientos'],
        mounted() {

            // if(this.ayuntamientos){
            //     this.ayuntamiento
            // }
            console.log('Component mounted.')
        },
        created(){
            if(this.editando==false){
                console.log('es falso')
                this.claveNombre= this.ayuntamiento.municipio.nombre
                this.municNombre= this.ayuntamiento.municipio.nombre
            }
        },
        mounted(){
            var self = this
            $(function() {
                $('#profile').addClass('dragging').removeClass('dragging');
            });
            $('#profile').on('dragover', function() {
                $('#profile').addClass('dragging')
                }).on('dragleave', function() {
                $('#profile').removeClass('dragging')
                }).on('drop', function(e) {
                    $('#profile').removeClass('dragging hasImage');
                    self.onFileChange(e)
                                    })
                $('#profile').on('click', function(e) {
                    console.log('clicked')
                    $('#mediaFile').click();
                });
                window.addEventListener("dragover", function(e) {
                e = e || event;
                e.preventDefault();
                }, false);
                window.addEventListener("drop", function(e) {
                e = e || event;
                e.preventDefault();
                }, false);
                $('#mediaFile').change(function(e) {
                    self.onFileChange(e)
                })
        },
        components:{

        },
        methods:{
            onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
                // this.ayuntamiento.imgEscudo= files[0]
                this.createImage(files[0]);
            },
            createImage(file) {
                var imgEscudo = new Image();
                var reader = new FileReader();
                var vm = this;
                reader.onload = (e) => {
                    $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                    if(vm.editando == true){
                        vm.ayuntamiento.escudo=''
                    }
                    vm.imagenCargada = true
                    vm.ayuntamiento.imgEscudo = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            onSubmit(file){
                 this.$validator.validate().then(valid => {
                     if (valid) {
                    const urlStoreAyuntamiento = route('ayuntamiento.store').template
                    let ayuntamiento={
                        municipio_id : this.ayuntamiento.municipio.id,
                        distrito_id: this.ayuntamiento.distrito.id,
                        partido_id:this.ayuntamiento.partidos,
                        escudo: this.ayuntamiento.imgEscudo,
                        telefono1: this.ayuntamiento.telefono1,
                        telefono2: this.ayuntamiento.telefono2,
                        correo: this.ayuntamiento.correo
                    }
                    axios.post(urlStoreAyuntamiento,{ayuntamiento:ayuntamiento}).then(response => {
                        if(response.data == 0){
                                Vue.swal({
                                    title: 'Error',
                                    text: "Hubo un error, inténtelo de nuevo.",
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                })
                            }else if(response.data == 3){
                                Vue.swal({
                                    title: 'Hecho',
                                    text: "Ayuntamiento registrado correctamente.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#3085d6',
                                    closeOnClickOutside: false,
                                }).then((confirmed) => {
                                    if (confirmed) {
                                        location.reload()
                                    }
                                })
                             }//else{
                            //     var emp = {
                            //         id: response,
                            //         nombres: this.usuario.nombres+' '+this.usuario.primer_ap+' '+this.usuario.segundo_ap
                            //     }
                            //     this.empleadosE.push(emp)
                            //     this.limpiar()
                            //     Vue.swal({
                            //         title: 'Hecho',
                            //         text: "Empleado registrado correctamente.",
                            //         type: 'success',
                            //         showCancelButton: false,
                            //         confirmButtonText: 'Aceptar',
                            //         confirmButtonColor: '#3085d6',
                            //     })
                            // }
                       console.log(reponse.data)
                    })
                    .catch(error => {
                        console.log(error)
                    })
                     }
                     else{}
                 })

            },
            update(){
                const urlUpdateAyuntamiento = route('ayuntamiento.update').template
                console.log(urlUpdateAyuntamiento)
                this.$validator.validate().then(valid => {
                     if (valid) {
                    let ayuntamiento={
                        id:this.ayuntamiento.id,
                        municipio_id : this.ayuntamiento.municipio.id,
                        distrito_id: this.ayuntamiento.distrito.id,
                        partido_id:this.ayuntamiento.partidos,
                        escudo: this.ayuntamiento.imgEscudo,
                        telefono1: this.ayuntamiento.telefono1,
                        telefono2: this.ayuntamiento.telefono2,
                        correo: this.ayuntamiento.correo
                    }
                    axios.post(urlUpdateAyuntamiento,{ayuntamiento:ayuntamiento}).then(response => {
                        if(response.data == 0){
                                Vue.swal({
                                    title: 'Error',
                                    text: "Hubo un error, inténtelo de nuevo.",
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                })
                            }else if(response.data == 3){
                                Vue.swal({
                                    title: 'Hecho',
                                    text: "Ayuntamiento registrado correctamente.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#3085d6',
                                    closeOnClickOutside: false,
                                }).then((confirmed) => {
                                    if (confirmed) {
                                        location.reload()
                                    }
                                })
                             }//else{
                            //     var emp = {
                            //         id: response,
                            //         nombres: this.usuario.nombres+' '+this.usuario.primer_ap+' '+this.usuario.segundo_ap
                            //     }
                            //     this.empleadosE.push(emp)
                            //     this.limpiar()
                            //     Vue.swal({
                            //         title: 'Hecho',
                            //         text: "Empleado registrado correctamente.",
                            //         type: 'success',
                            //         showCancelButton: false,
                            //         confirmButtonText: 'Aceptar',
                            //         confirmButtonColor: '#3085d6',
                            //     })
                            // }
                       console.log(reponse.data)
                    })
                    .catch(error => {
                        console.log(error)
                    })
                     }
                     else{}
                 })
            },
            editar(data){
                this.$validator.reset()
                this.ayuntamiento = data
                this.editando= true
                if(this.ayuntamiento.formato){
                    $('#profile').css('background-image', 'url(data:image/'+this.ayuntamiento.formato+';base64,' + this.ayuntamiento.escudo + ')').addClass('hasImage');
                }

                // this.editando = true
            },
            eliminar(data){
                console.log('Eliminando',data)
                 const urlDeleteAyuntamiento = route('ayuntamiento.delete').template
                 console.log(urlDeleteAyuntamiento)
                 Vue.swal({
                    title: '¡Cuidado!',
                    text: "¿Estas seguro que deseas borrar este ayuntamiento?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((confirmed) => {
                    if (confirmed) {
                        axios.post(urlDeleteAyuntamiento,{id:data}).then(response => {
                        if(response.data == 1){
                                Vue.swal({
                                    title: 'Hecho',
                                    text: "Hubo un error, inténtelo de nuevo.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar',
                                    closeOnClickOutside: false,
                                }).then((confirmed) => {
                                    if (confirmed) {
                                        location.reload()
                                    }
                                })
                            }
                        })
                    }
                })

            },
            cancelarEdicion(){
                this.editando=false
                $('#profile').removeAttr("style").removeClass('hasImage');
                this.ayuntamiento={
                    logo: '',
                    municipio:'',
                    partidos:[],
                    distrito:'',
                    telefono1:'',
                    telefono2:'',
                    correo:'',
                    partidox:[],
                    escudo:'',
                    id:'',
                }
                this.$validator.reset()
            },
            handleFilePondInit() {
            // console.log('FilePond has initialized');
            console.log(this.$refs.pond.getFileEncodeBase64String())
            this.createImage(this.$refs.pond.getFile())
            // example of instance method call on pond reference
            // this.imgEscudo =this.$refs.pond.getFiles()

            },
            selecMunic(data){
                this.claveMunicSelec = this.ayuntamiento.municipio.clave

            },


        }
    }
</script>
<style >
    .ver{
    display: block;
    }
    .imagenTabla{
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        background-color: aliceblue;
    }
    .errorImagen{
        position: absolute;
        bottom: 0;
    }
    .upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    }

    .jom {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: bold;
    }

    .upload-btn-wrapper input[type=file] {
    font-size: 0.8rem;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    }
</style>
