

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('posts', require('./components/posts.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
});
