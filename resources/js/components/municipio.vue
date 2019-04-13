<template>
     <div class="card ">
                <div class="card-header">
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mx-auto">
                                         <img :src="logo" class="mx-auto" alt="">
                                    </div>
                                   <div>
                                       <div class="form-group">
                                            <label for="claveMunicipio">Clave del municipio</label>
                                            <input type="text" id="claveMunicipio" v-model="claveMunicipio" class="form-control" placeholder="Ingrese la clave">
                                        </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombreMunicipio">Municipio</label>
                                            <p v-html="nombreMunicipio"></p>
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
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        data(){
            return{
                logo:'../../public/admin/dist/img/avatar2.png',
                claveMunicipio:'',
                nombreMunicipio:'ZONGOLICA',
                distrito:'',
                telefono1:'',
                telefono2:'',
                correo:'',
                partido:'',
            }

        },
        props:{},
        mounted() {
            console.log('Component mounted.')
        },
        created(){

        }
    }
</script>
