<template>
    <div class="row ">
        <div class="col-md-9">
            <municipio :create="0"></municipio>
            <div class="row ">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="row">
                            <div class="col-md-5  d-flex justify-content-center align-items-center" :style="color">
                                <img class="center img-circle-2 elevation-2 align-middle" :src="imagen"  >
                            </div>
                            <div class="col-md-7">
                                    <h2 class="text-center">Empleados</h2>
                                    <!-- <h5>Registro y edción</h5> -->
                                    <p class=" mr-3">En este modulo puede realizar la creación y edición de tus empleados </p>

                                <div class="text-center mb-2">
                                    <a :href="href" class=" btn rounded-pill btn-card">Ir al modulo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="row">
                            <div class="col-md-5  d-flex justify-content-center align-items-center" :style="color">
                                <img class="center img-circle-2 elevation-2 align-middle" :src="imagen"  >
                            </div>
                            <div class="col-md-7">
                                    <h2 class="text-center">Empleados</h2>
                                    <!-- <h5>Registro y edción</h5> -->
                                    <p class=" mr-3">En este modulo puede realizar la creación y edición de tus empleados </p>

                                <div class="text-center mb-2">
                                    <a  class="btn rounded-pill btn-card" :href="href">Ir al modulo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="card panel-derecha">
                <div class="card-header"> Panel lateral</div>
                <div class="card-body"> Contenido</div>
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
                imagen:window.location.protocol+ '//' + window.location.host+'/'+'admin/dist/img/Smadav-Vector.png',
                color:'background-color:#4286f4;',
                href:''
            }

        },
        props:[],
        mounted() {
            console.log('Component mounted.')
            this.href = route('empleados.index').template
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
