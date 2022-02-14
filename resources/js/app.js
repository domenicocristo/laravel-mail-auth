require('./bootstrap');

window.Vue = require('vue');

Vue.component('videogames-component', require('./components/VideogamesComponent.vue').default);

const app = new Vue({
    el: '#app',
});