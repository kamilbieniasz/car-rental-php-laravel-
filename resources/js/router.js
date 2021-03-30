import Vue from 'vue';
import VueRouter from 'vue-router';
import AdminLogin from './components/AdminLogin';
import AdminCars from './components/AdminCars';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {path: '/admin/login', component: AdminLogin},
        {path: "/admin/cars", component: AdminCars}
    ],
    mode: 'history'
});