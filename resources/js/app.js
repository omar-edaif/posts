

require('./bootstrap');

window.Vue = require('vue').default;

import router from './router';
import App from './components/App.vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components:{App},
    router
});
