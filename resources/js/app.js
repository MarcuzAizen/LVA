require('./bootstrap');

import Vue from 'vue';
import router from './router';
import store from './store';
import Swal from 'sweetalert2';
import VueProgressBar from 'vue-progressbar';
import { Form, HasError, AlertError } from 'vform';
import { ValidationProvider } from 'vee-validate/dist/vee-validate.full.esm';
import { ValidationObserver } from 'vee-validate';

window.Form = Form;
window.Swal = Swal;
window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    thickness: '10px',
    autoFinish: false
});

Vue.directive('focus', {
    inserted(el) {
        el.focus();
    }
});

Vue.component('enrollment-officer-sidebar', require('./components/enrollment-officer/sidebar.vue').default);

new Vue({
    el: '#app',
    router,
    store,
    mounted() {
        this.$nextTick(() => {
            $('[data-toggle="tooltip"]').tooltip();
        });
    }
});