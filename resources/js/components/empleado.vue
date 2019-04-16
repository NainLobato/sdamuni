<template>
<div class="">
    <div class=" col-md-12 card">
        <div class="text-center">
            <h5><strong>Administrador de empleados</strong> </h5>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4  ">
            <div class="card">
                <div class="card-header">
                <h5 class="card-title text-center">Empleados</h5>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-8 card ">
         <div class="card-header">
                    <h5 class="card-title text-center">Info empleado</h5>
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
                    <form v-on:submit.prevent="onSubmit">
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input type="text" id="nombre" v-model="nombre" class="form-control" placeholder="Ingrese el nombre">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="primerAp">Primer apellido</label>
                                <input type="text" id="primerAp" v-model="primerAp" class="form-control" placeholder="Ingrese primer apellido">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="segundoAp">Segundo apellido</label>
                                <input type="text" id="segundoAp" v-model="segundoAp" class="form-control" placeholder="Ingrese el segundo apellido">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input type="text" id="cargo" v-model="cargo" class="form-control" placeholder="Ingrese el cargo">
                            </div>
                        </div>
                         <div class="col-md-4 text-center">
                             <label class="form-check-label" for="inlineCheckbox1"> <strong>Enlace FISM</strong></label>
                            <div class="form-check ">
                                <input class="form-check-input" v-model="enlace" type="checkbox" id="inlineCheckbox1" value="option1">
                            </div>
                        </div>
                        <div class="col-md-4 my-auto">
                            <div class="form-group">
                            <label for="">Sexo</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" v-model="sexo" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" v-model="sexo" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inicioFun">Inicio de funciones</label>
                                <input type="date" id="inicioFun" v-model="inicioFun" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="number" id="telefono" v-model="telefono" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                         <div class="col-md-8">
                            <div class="form-group">
                                <label for="profesion">Profesión</label>
                                <input type="text" id="profesion" v-model="profesion" class="form-control" placeholder="Ingrese la profesión">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="abrev">Titulo</label>
                                <input type="text" id="abrev" v-model="abrev" class="form-control" placeholder="Ejemplo: Lic.">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="fuenteAct">Fuente de actualización de datos</label>
                                <input type="text" id="fuenteAct" v-model="fuenteAct" class="form-control" placeholder="Ingrese la profesión">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correoEmp">Correo</label>
                                <input type="email" id="correoEmp" v-model="correoEmp" class="form-control" placeholder="Ejemplo: Lic.">
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>

</template>

<script>
import vSelect from 'vue-select'

Vue.component('v-select', vSelect)
    export default {
        data(){
            return{
                primerAp:'',
                nombre:'',
                segundoAp:'',
                inicioFun:'',
                sexo:'',
                telefono:'',
                profesion:'',
                abrev:'',
                cargo:'',
                correoEmp:'',
                enlace:'',
                fuenteAct:'',

            }

        },
        // props:['datos'],
        mounted() {
            console.log('Component mounted.')
        },
        created(){

        },
        methods:{
            onSubmit(){
                console.log('hola que hace')
            }
        }
    }
</script>
