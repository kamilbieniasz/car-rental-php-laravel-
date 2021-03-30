require('./bootstrap');

import Vue from 'vue';
import App from './components/App';
import AddCar from './components/AddCar';
import EditCar from './components/EditCar';
import router from './router.js';

Vue.component('addCar', AddCar);
Vue.component('editCar', EditCar);

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});