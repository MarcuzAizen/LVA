require('./bootstrap');

import Vue from 'vue';
import router from './router';

Vue.directive('focus', {
    inserted(el) {
        el.focus();
    }
});

new Vue({
    el: '#app',
    router,
    mounted() {
        this.$nextTick(() => {
            $('[data-toggle="tooltip"]').tooltip();
        });
    }
});