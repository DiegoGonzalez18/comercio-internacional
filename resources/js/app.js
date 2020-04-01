/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



window.Vue = require('vue');
// ES6 Modules or TypeScript
import swal from 'sweetalert2';
window.swal = swal;



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('slider-component', require('./components/Slider.vue').default);
Vue.component('user', require('./components/User.vue').default);
Vue.component('evento', require('./components/Evento.vue').default);
Vue.component('novedad', require('./components/Novedad.vue').default);
Vue.component('categoria', require('./components/Categoria.vue').default);
Vue.component('archivo', require('./components/Archivo.vue').default);
Vue.component('tramite', require('./components/Tramite.vue').default);
Vue.component('archivo_tramite', require('./components/archivo_tramite.vue').default);
Vue.component('mensaje', require('./components/mensaje.vue').default);
Vue.component('respuesta', require('./components/Respuestas.vue').default);
Vue.component('contenido', require('./components/Contenido.vue').default);
Vue.component('semillero', require('./components/Semillero.vue').default);
Vue.component('a-semillero', require('./components/ActualizarSemillero.vue').default);
Vue.component('proyecto', require('./components/Proyecto.vue').default);
Vue.component('a-proyecto', require('./components/ActualizarProyecto.vue').default);
Vue.component('ar_pr', require('./components/archivo_proyecto.vue').default);

//frontend


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{

        menu:11,

    },
    components: {
  nombre:'slider'
    }
});
