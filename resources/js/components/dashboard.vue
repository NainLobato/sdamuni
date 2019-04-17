<template>
    <div class="row ">
        <div class="col-md-9">
            <municipio></municipio>
            <div class="row ">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="row">
                            <div class="col-md-5 text-center align-middle">
                                <img class="center img-circle-2 elevation-2 align-middle" src="http://bit.ly/2tMBBTd"  >
                            </div>
                            <div class="col-md-7">
                                <div class="product-text">
                                    <h2>Empleados</h2>
                                    <!-- <h5>Registro y edción</h5> -->
                                    <p>En este modulo puede realizar la creación y edición de tus empleados </p>
                                </div>
                                <div class="text-center">
                                    <button type="button">Ir al modulo</button>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body"> SOY UNA CARD</div>
                    <div class="card-footer"></div>
                </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body"> SOY OTRA CARD</div>
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

            }

        },
        props:[],
        mounted() {
            console.log('Component mounted.')
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
