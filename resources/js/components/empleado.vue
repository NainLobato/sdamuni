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
                    <!-- <ul v-else>
                        <li v-for="empleado in empleadosE" :key="empleado.id">{{empleado.nombre}} {{empleado.primer_ap}} {{empleado.segundo_ap}}</li>
                    </ul> -->
                    <b-dropdown v-for="empleado in empleadosE" :key="empleado.id" dropright :text="empleado.nombre+' '+empleado.primer_ap+' '+empleado.segundo_ap" variant="primary" class="m-2">
                        <b-dropdown-item @click="verEmpleado(empleado.id)" >Ver</b-dropdown-item>
                        <b-dropdown-item href="#">Editar</b-dropdown-item>
                        <b-dropdown-item href="#">Eliminar</b-dropdown-item>
                    </b-dropdown>
                    </br>
                    </br>
                    </br>
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
                                <input type="text" id="nombres" name="nombres" v-model="usuario.nombres" class="form-control" placeholder="Ingrese el nombre" data-vv-as="nombre(s)" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('nombres')">{{ errors.first('nombres') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="primer_ap">Primer apellido</label>
                                <input type="text" id="primer_ap" name="primer_ap" v-model="usuario.primer_ap" class="form-control" placeholder="Ingrese primer apellido" data-vv-as="primer apellido" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('primer_ap')">{{ errors.first('primer_ap') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="segundo_ap">Segundo apellido</label>
                                <input type="text" id="segundo_ap" name="segundo_ap" v-model="usuario.segundo_ap" class="form-control" placeholder="Ingrese el segundo apellido" data-vv-as="segundo apellido" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('segundo_ap')">{{ errors.first('segundo_ap') }}</div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <v-select label="cargo" name="cargo" :options="cargos" v-model="usuario.empleado.cargo" v-validate="'required'" :disabled="formStatus==3"></v-select>
                                <div class="invalid-feedback ver" v-if="errors.has('cargo')">{{ errors.first('cargo') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4 my-auto">
                            <div class="form-group">
                                <label for="">Sexo</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" v-model="usuario.empleado.sexo" type="radio" name="sexo" id="sexo1" value="1" :disabled="formStatus==3">
                                    <label class="form-check-label" for="sexo1">Hombre</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" v-model="usuario.empleado.sexo" type="radio" name="sexo" id="sexo2" value="2" :disabled="formStatus==3">
                                    <label class="form-check-label" for="sexo2">Mujer</label>
                                </div>
                                <div class="invalid-feedback ver" v-if="errors.has('sexo')">{{ errors.first('sexo') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                             <label class="form-check-label" for="fism"> <strong>Enlace FISM</strong></label>
                            <div class="form-check ">
                                <input class="form-check-input" v-model="usuario.empleado.fism" type="checkbox" id="fism" value="1" :disabled="formStatus==3">
                            </div>
                            <div class="invalid-feedback ver" v-if="errors.has('fism')">{{ errors.first('fism') }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inicioFun">Inicio de funciones</label>
                                <input type="date" id="inicioFun" name="inicioFun" v-model="usuario.empleado.inicioFun" class="form-control" data-vv-as="inicio de funciones" v-validate="'required'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('inicioFun')">{{ errors.first('inicioFun') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="number" id="telefono" name="telefono" v-model="usuario.empleado.telefono" class="form-control" data-vv-as="teléfono" v-validate="'required'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('telefono')">{{ errors.first('telefono') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                         <div class="col-md-8">
                            <div class="form-group">
                                <label for="profesion">Profesión</label>
                                <input type="text" id="profesion" name="profesion" v-model="usuario.empleado.profesion" class="form-control" placeholder="Ingrese la profesión" data-vv-as="profesión" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('profesion')">{{ errors.first('profesion') }}</div>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="abrev">Título</label>
                                <input type="text" id="abrev" name="abrev" v-model="usuario.empleado.abrev" class="form-control" placeholder="Ejemplo: Lic." data-vv-as="título" v-validate="'required|alpha_spaces'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('abrev')">{{ errors.first('abrev') }}</div>
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
                                <label for="email">Correo</label>
                                <input type="email" id="email" name="email" v-model="usuario.email" class="form-control" placeholder="ejemplo@gmail.com" data-vv-as="correo" v-validate="'required'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('email')">{{ errors.first('email') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4" v-if="formStatus!=3">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" v-model="usuario.password" class="form-control" placeholder="******" data-vv-as="contraseña" v-validate="'required'" :readonly="formStatus==3">
                                <div class="invalid-feedback" v-if="errors.has('password')">{{ errors.first('password') }}</div>
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
                        sexo:1,
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
            //console.log('Component mounted.')
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
            verEmpleado(id){
                var url = './empleado-get'
                axios.post(url, {idEmpleado: id}).then(response => {
                    //console.log(response.data.nombres)
                    this.asignarCampos(response.data)
                    this.formStatus = 3
                }).catch(function (error) {
                    console.log(error)
                })
            },
            asignarCampos(usuario){
                this.usuario.nombres = usuario.nombres,
                this.usuario.primer_ap = usuario.primer_ap,
                this.usuario.segundo_ap = usuario.segundo_ap,
                this.usuario.email = usuario.email,
                this.usuario.password = (usuario.password) ? usuario.password : '',
                this.usuario.empleado.cargo = {id: usuario.empleado.cargo_id, cargo: usuario.empleado.cargo.cargo},
                this.usuario.empleado.sex = usuario.empleado.sexo,
                this.usuario.empleado.fism = usuario.empleado.fism,
                this.usuario.empleado.profesion = usuario.empleado.profesion,
                this.usuario.empleado.abrev = usuario.empleado.profesion_abrev,
                this.usuario.empleado.inicioFun = usuario.empleado.fecha_inicio_funciones,
                this.usuario.empleado.telefono = usuario.empleado.telefono
            },
        }
    }
</script>
<style>
.ver{
    display: block;
}
</style>
