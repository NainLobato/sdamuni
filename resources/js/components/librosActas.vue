<template>
<div>
    <b-card
        align="center"
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        no-body
        >
        <template slot="header">
        <span>Administrador de libros de actas de cabildo</span>
        </template>
    </b-card>
    <div class="row">
        <div class="col-md-4">
            <b-card
                header="Libros"
                header-tag="header"
                align="center"
                style="max-width: auto; font-size: 18px;"
            >
            <b-card-body align="left">
                <ul v-if="libros.length === 0">
                        <li>Sin registros</li>
                    </ul>
                    <b-dropdown v-for="libro in libros" :key="libro.id" dropright :text="libro.clave" variant="primary" class="m-2">
                        <b-dropdown-item @click="verlibro(libro)">Ver</b-dropdown-item>
                        <b-dropdown-item @click="editarlibro(libro)">Editar</b-dropdown-item>
                        <b-dropdown-item @click="deletelibro(libro)">Eliminar</b-dropdown-item>
                    </b-dropdown>
            </b-card-body>
            </b-card>
        </div>
        <div class="col-md-8">
            <b-card
                header="Informacion del libro"
                header-tag="header"
                align="center"
                style="max-width: auto; font-size: 18px;"
            >
                <b-card-body align="left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="clave">Clave:</label>
                                <input type="text" id="clave" name="clave" v-model="libro.clave" class="form-control" placeholder="Ingrese clave" data-vv-as="clave" v-validate="'required|max:255'">
                                <div class="invalid-feedback" v-if="errors.has('clave')">{{ errors.first('clave') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_primer_sesion">Fecha de sesion de primer acta:</label>
                                <input type="date" id="fecha_primer_sesion" name="fecha_primer_sesion" v-model="libro.fecha_primer_sesion" class="form-control" data-vv-as="fecha de primer sesion" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_primer_sesion')">{{ errors.first('fecha_primer_sesion') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_ultima_sesion">Fecha de sesion de ultima acta:</label>
                                <input type="date" id="fecha_ultima_sesion" name="fecha_ultima_sesion" v-model="libro.fecha_ultima_sesion" class="form-control" data-vv-as="fecha de ultima sesion" v-validate="'required'">
                                <div class="invalid-feedback" v-if="errors.has('fecha_ultima_sesion')">{{ errors.first('fecha_ultima_sesion') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primer_folio">Folio de la primer acta:</label>
                                <input type="text" id="primer_folio" name="primer_folio" class="form-control" v-model="libro.primer_folio" placeholder="Ingrese folio de la primer acta" data-vv-as="primer folio" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('primer_folio')">{{ errors.first('primer_folio') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ultimo_folio">Folio de la ultima acta:</label>
                                <input type="text" id="ultimo_folio" name="ultimo_folio" v-model="libro.ultimo_folio" class="form-control" placeholder="Ingrese folio de la ultima acta" data-vv-as="ultimo folio" v-validate="'required|numeric|max:11'">
                                <div class="invalid-feedback" v-if="errors.has('ultimo_folio')">{{ errors.first('ultimo_folio') }}</div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="comentarios">Comentarios:</label>
                                <textarea  rows="3" id="comentarios" name="comentarios" v-model="libro.comentarios" class="form-control" placeholder="Ingrese comentarios" data-vv-as="comentarios" v-validate="'max:255'"></textarea>
                                <div class="invalid-feedback" v-if="errors.has('comentarios')">{{ errors.first('comentarios') }}</div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="ubicacion">Ubicacion:</label>
                                <input type="text" id="ubicacion" name="ubicacion" v-model="libro.ubicacion" class="form-control" placeholder="Ingrese ubicacion de comentarios" data-vv-as="ubicacion" v-validate="'max:255'">
                                <div class="invalid-feedback" v-if="errors.has('ubicacion')">{{ errors.first('ubicacion') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button class="btn btn-danger" >Cancelar</button>
                            <button class="btn btn-success" @click="store">Guardar</button>
                        </div>
                    </div>
                </b-card-body>
            </b-card>
        </div>
    </div>
</div>

</template>

<script>
    import urlSdamuni from '.././urlSdamuni';

    export default {
        props: {
            'initialLibros': {
                required: false
            }
        },
        data(){
            return{
                libro: {
                    clave: '',
                    fecha_primer_sesion: '',
                    fecha_ultima_sesion: '',
                    primer_folio: '',
                    'ultimo_folio': '',
                    'comentarios': '',
                    'ubicacion': '',
                },
                urlSdamuni: urlSdamuni,
                libros: JSON.parse(this.initialLibros)
            }
        },
        methods: {
            store () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(`${this.urlSdamuni}/store-libro-actas`, { libro: this.libro })
                        .then( response => {
                            if (response.data.estado == 2) {
                                Vue.swal(
                                    'Exito!',
                                    'Se ha guardado el libro correctamente.',
                                    'success'
                                )
                            } else if(response.data.estado == 1) {
                                Vue.swal(
                                    'Error!',
                                    'Ya existe la clave ingresada.',
                                    'error'
                                )
                            } else {
                                Vue.swal(
                                    'Error!',
                                    'Ha ocurrido un error, intente de nuevo.',
                                    'error'
                                )
                            }
                        })
                        .catch(error => {
                            Vue.swal(
                                'Error!',
                                'Ha ocurrido un error, intente de nuevo.',
                                'error'
                            )
                            console.log(error)

                        })
                    } else {
                        Vue.swal(
                            'Error!',
                            'Complete el formulario.',
                            'error'
                        )
                    }
                })

            },
            verlibro (libro) {
                this.libro = libro
            },
            editarlibro (libro) {
                this.libro = libro
            },
            deletelibro (libro) {
                Vue.swal({
                title: '¿ESTAS SEGURO DE ELIMINAR EL LIBRO DE '+libro.clave+'?',
                text: "NO SE PODRA REVERTIR EL CAMBIO",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                cancelButtonText: 'CANCELAR'
                }).then((result) => {
                if (result.value) {
                    axios.post(`${this.urlSdamuni}/destroy-libro-actas`, {idLibro: libro.id})
                    .then(function (response) {
                        if (response.data.status === 1) {
                            Vue.swal({
                                title: 'Exito',
                                text: "Libro eliminado correctamente.",
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                            })
                        }else {
                            Vue.swal(
                                'Error!',
                                'Ha ocurrido un error, intente de nuevo.',
                                'error'
                            )
                        }

                    })
                    .catch(function (error) {
                            Vue.swal(
                            'Error!',
                            'Ha ocurrido un error, intente de nuevo.',
                            'error'
                        )
                    })
                }
                })
            }
        },
        mounted() {
            console.log('whatever it takes')
        }
    }
</script>
