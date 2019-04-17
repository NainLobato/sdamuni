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
                    <ul v-if="empleadosE.length===0">
                        <li>Sin registros</li>
                    </ul>
                    <ul v-else>
                        <li v-for="empleado in empleadosE" :key="empleado.id">{{empleado.nombre}} {{empleado.primer_ap}} {{empleado.segundo_ap}}</li>
                    </ul>
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
                                <input type="text" id="nombres" v-model="usuario.nombres" class="form-control" placeholder="Ingrese el nombre" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="primer_ap">Primer apellido</label>
                                <input type="text" id="primer_ap" v-model="usuario.primer_ap" class="form-control" placeholder="Ingrese primer apellido" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="segundo_ap">Segundo apellido</label>
                                <input type="text" id="segundo_ap" v-model="usuario.segundo_ap" class="form-control" placeholder="Ingrese el segundo apellido" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <v-select label="cargo" name="cargo" :options="cargos" v-model="usuario.empleado.cargo" v-validate="'required'" :disabled="formStatus==3"></v-select>
                            </div>
                        </div>
                        <div class="col-md-4 my-auto">
                            <div class="form-group">
                            <label for="">Sexo</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" v-model="usuario.empleado.sexo" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" v-model="usuario.empleado.sexo" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                             <label class="form-check-label" for="inlineCheckbox1"> <strong>Enlace FISM</strong></label>
                            <div class="form-check ">
                                <input class="form-check-input" v-model="usuario.empleado.fism" type="checkbox" id="inlineCheckbox1" value="option1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inicioFun">Inicio de funciones</label>
                                <input type="date" id="inicioFun" v-model="usuario.empleado.inicioFun" class="form-control" v-validate="'required'" :readonly="formStatus==3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="number" id="telefono" v-model="usuario.empleado.telefono" class="form-control" v-validate="'required'" :readonly="formStatus==3">
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                         <div class="col-md-8">
                            <div class="form-group">
                                <label for="profesion">Profesión</label>
                                <input type="text" id="profesion" v-model="usuario.empleado.profesion" class="form-control" placeholder="Ingrese la profesión" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="abrev">Título</label>
                                <input type="text" id="abrev" v-model="usuario.empleado.abrev" class="form-control" placeholder="Ejemplo: Lic." v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                            </div>
                        </div>
                        <!-- <div class="col-md-8">
                            <div class="form-group">
                                <label for="fuenteAct">Fuente de actualización de datos</label>
                                <input type="text" id="fuenteAct" v-model="fuenteAct" class="form-control" placeholder="Ingrese la profesión">
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correoEmp">Correo</label>
                                <input type="email" id="correoEmp" v-model="usuario.email" class="form-control" placeholder="Ejemplo: Lic." v-validate="'required'" :readonly="formStatus==3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" v-model="usuario.password" class="form-control" placeholder="******" v-validate="'required'" :readonly="formStatus==3">
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <!-- <button type="submit" class="btn btn-primary">Guardar</button> -->
                            <button class="btn btn-danger" @click="cancelar">Cancelar</button>
                            <button class="btn btn-success" v-if="formStatus==1" @click="store">Guardar</button>
                            <button class="btn btn-success" v-else-if="formStatus==2" @click="update">Actualizar</button>
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
        props: {
            empleados: {},
            cargos: {}
        },
        data(){
            return{
                formStatus: 1,
                usuario: {
                    nombres:'',
                    primer_ap:'',
                    segundo_ap:'',
                    email: '',
                    password: '',
                    empleado: {
                        cargo:'',
                        sexo:'',
                        fism: '',
                        profesion:'',
                        abrev:'',
                        inicioFun:'',
                        telefono:'',
                        //fuenteAct:'',
                    }
                },
                indexEmpleado: '',
                empleadosE: {}
            }
        },
        // props:['datos'],
        mounted() {
            console.log('Component mounted.')
            this.empleadosE = this.empleados
        },
        created(){

        },
        methods:{
            onSubmit(){
                console.log('hola que hace')
            },
            aMayusculas(){
                this.usuario.nombres = this.usuario.nombres.toUpperCase()
                this.usuario.primer_ap = this.usuario.primer_ap.toUpperCase()
                this.usuario.segundo_ap = this.usuario.segundo_ap.toUpperCase()

                this.usuario.empleado.profesion = this.usuario.empleado.profesion.toUpperCase()
                this.usuario.empleado.abrev = this.usuario.empleado.abrev.toUpperCase()
            },
            store(){
                this.$validator.validate().then(valid => {
                    if (valid) {
                        var url = './empleado-store';
                        this.aMayusculas()
                        axios.post(url, {usuario: this.usuario})
                        .then(response => {
                            if(response.data == 0){
                                Vue.swal({
                                    title: 'Error',
                                    text: "Hubo un error, inténtelo de nuevo.",
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                })
                            }else if(response.data == 1){
                                Vue.swal({
                                    title: 'Atención',
                                    text: "Ya existe un empleado con ese correo, intente con otro.",
                                    type: 'warning',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                })
                            }else{
                                var emp = {
                                    nombre: this.usuario.nombres+' '+this.usuario.primer_ap+' '+this.usuario.segundo_ap
                                }
                                this.empleadosE.push(emp)
                                this.limpiar()
                                Vue.swal({
                                    title: 'Hecho',
                                    text: "Empleado registrado correctamente.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#3085d6',
                                })
                            }
                        })
                        .catch(function (error) {
                            console.log(error)
                        })
                    }else{
                        Vue.swal({
                            title: 'Atención',
                            text: "Por favor completa los campos correctamente.",
                            type: 'warning',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        })
                    }
                });
            },
            limpiar(){
                this.usuario.nombres = ''
                this.usuario.primer_ap = ''
                this.usuario.segundo_ap = ''
                this.usuario.email = ''
                this.usuario.password = ''

                this.usuario.empleado.cargo = ''
                this.usuario.empleado.sexo = ''
                this.usuario.empleado.fism = ''
                this.usuario.empleado.profesion = ''
                this.usuario.empleado.abrev = ''
                this.usuario.empleado.inicioFun = ''
                this.usuario.empleado.telefono = ''
                this.$validator.reset()
                this.formStatus = 1
                this.indexEmpleado = ''
            },
            cancelar(){
                this.limpiar()
            },
        }
    }
</script>
