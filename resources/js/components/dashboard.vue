<template>
    <div class="row ">
        <div class="col-md-9">
            <municipio :create="0" :ayuntamientom="ayuntamiento"></municipio>
            <div class="row ">

                <div  v-for="(card , index) in cards" :key="index" class="col-md-6 ">
                    <div class="card ">
                        <div class="row card-home">
                            <div class="col-md-5  d-flex justify-content-center align-items-center" :style="card.color">
                                <img class="center img-circle-2 elevation-2 align-middle" :src="card.imagen"  >
                            </div>
                            <div class="col-md-7 my-auto">
                                    <h2 class="text-center">{{card.titulo}}</h2>
                                    <!-- <h5>Registro y edción</h5> -->
                                    <p class=" mr-3 text-center">{{card.descripcion}}</p>

                                <div class="text-center mb-2">
                                    <a :href="card.href" class=" btn rounded-pill btn-card">Ir al modulo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6 ">
                    <div class="card  ">
                        <div class="row card-home">
                            <div class="col-md-5  d-flex justify-content-center align-items-center" :style="color">
                                <img class="center img-circle-2 elevation-2 align-middle" :src="imagen[1].ayuntamientos"  >
                            </div>
                            <div class="col-md-7">
                                    <h2 class="text-center">Ayuntamientos</h2>
                                    <!-- <h5>Registro y edción</h5>
                                    <p class=" mr-3 text-center">Crea y administra ayuntamientos</p>
                                <div class="text-center mb-2">
                                    <a  class="btn rounded-pill btn-card" :href="href">Ir al modulo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
        <div class="col-md-3">
            <div class="card panel-derecha">
                <div class="card-header"><h5><strong>Opciones generales</strong></h5> </div>
                <div class="card-body " style="padding:0.3rem !important">
                    <div class="card card-panel ">
                        <div class="row">
                            <div class="col-md-2 text-center my-2  "><i class="fas fa-check"></i></div>
                            <div class="col-md-10 my-2 ">Contenido1</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select'
    import 'vue-select/dist/vue-select.css';
    import municipio from './municipio.vue'
    Vue.component('v-select', vSelect)
    export default {
        data(){
            return{
                cards:[
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-collaborator-male-96.png',href: route('empleados.index').template,color:'background-color:#0abab5;',titulo:'Empleados',descripcion:'Crea y administra usuarios para tu ayuntamiento'},
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-organization-96.png', href: route('ayuntamiento.index').template,color:'background-color:#0abab5;',titulo:'Ayuntamientos',descripcion:'Crea, elimina, edita ayuntamientos'},
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-book-96.png', href: route('libro-actas.index').template,color:'background-color:#0abab5;',titulo:'Libros de actas',descripcion:'Crea, elimina, edita actas'},
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-page-96.png', href: route('acuerdo-pendiente.index').template,color:'background-color:#0abab5;',titulo:'Acuerdos pendientes',descripcion:'Crea, elimina, edita acuerdos'},
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-page-96.png', href: route('acta-consejo-desarrollo.index').template,color:'background-color:#0abab5;',titulo:'Actas del consejo de desarrollo',descripcion:'Crea, elimina, edita acuerdos'},
                    {imagen: window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/icons8-page-96.png', href: route('acta-consejo-planeacion.index').template,color:'background-color:#0abab5;',titulo:'Actas del consejo de planeación',descripcion:'Crea, elimina, edita acuerdos'},

                ],
                color:'background-color:#4286f4;',
                href:''
            }

        },
        props:['ayuntamiento','storagepath'],
        mounted() {
            console.log('Component mounted.')
            this.href = route('empleados.index').template
            console.log(storage_path);
        },
        created(){

        },
        components:{
            municipio
        },
        methods:{
            onSubmit(){
                const urlStoreAyuntamiento = route('ayuntamiento.store')
                console.log(urlStoreAyuntamiento)
                console.log('hola que hace')
            }
        }
    }
</script>
<style >
.card-panel{
    background-color: blueviolet;
    color: white
}

</style>
