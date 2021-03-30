require('./bootstrap');

import Vue from 'vue';
import App from './components/App';
import AddCar from './components/AddCar';
import router from './router.js';

Vue.component('addCar', AddCar);

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});