

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('posts', require('./components/posts.vue').default);

const app = new Vue({
    el: '#app',
});
