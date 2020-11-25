import Vue from 'vue';
import VueRouter from 'vue-router';
import { registrarHome } from './modules/registrar';
Vue.use(VueRouter);

const routes = [
    registrarHome
];

export default new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: 'active'
}); 