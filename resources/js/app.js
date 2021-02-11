

require('./bootstrap');

window.Vue = require('vue').default;

import router from './router';
import App from './components/App.vue';
import VueRouter from 'vue-router';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);
Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components:{App},
    router
});
