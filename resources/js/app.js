
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');
//new

window._ = require('lodash');

window.$ = window.jQuery = require('jquery');

// import Toastr from 'vue-toastr';

// require('vue-toastr/src/vue-toastr.scss');
import BootstrapVue from 'bootstrap-vue'
import VueSweetalert2 from 'vue-sweetalert2';
import es from 'vee-validate/dist/locale/es';
import VeeValidate, { Validator } from 'vee-validate';
Vue.use(VueSweetalert2);
Vue.use(BootstrapVue);
Vue.use(VeeValidate, {
   classes: true,
   classNames: {
       valid: 'is-valid',
       invalid: 'is-invalid'
   }
});
Validator.localize('es', es);
// Vue.component('vue-toastr', Toastr);
// window.municipio = require('./components/municipio.vue')
Vue.component("dashboard", require("./components/dashboard.vue").default);
Vue.component("municipio", require("./components/municipio.vue").default);
// window.empleado = require('./components/empleado.vue')
Vue.component("empleado", require("./components/empleado.vue").default);
Vue.component("libros-actas", require("./components/librosActas.vue").default);
Vue.component("acuerdos-pendientes", require("./components/acuerdosPendientes.vue").default);
Vue.component("actas-consejo-desarrollo", require("./components/ActasConsejoDesarrollo.vue").default);
Vue.component("actas-consejo-planeacion", require("./components/ActasConsejoPlaneacion.vue").default);
Vue.component("jucios-por-ayuntamiento", require("./components/JuiciosPorAyuntamiento.vue").default);
Vue.component("actas", require("./components/actas.vue").default);
Vue.component("jucios-contra-ayuntamiento", require("./components/JuiciosContraAyuntamiento.vue").default);
Vue.component("contratos-convenios-acuerdos", require("./components/ContratosConveniosAcuerdos.vue").default);
Vue.component("obras-acciones", require("./components/ObrasAcciones.vue").default);
Vue.component("registro-modificaciones", require("./components/registroModificaciones.vue").default);
Vue.component("semaforo-obras", require("./components/SemaforoObras.vue").default);
Vue.component("expediente-tecnico", require("./components/ExpedienteTecnico.vue").default);
Vue.component("avance-financiero", require("./components/avanceFinanciero.vue").default);

const app = new Vue({
   el: '#app',
});
// require('./bootstrap');

// window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i);
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('municipio', require('./components/municipio.vue').default);
// Vue.component('empleado', require('./components/empleado.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app'
// });
