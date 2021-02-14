import Vue from 'vue';
import Vuex from 'vuex';
import enroll from './modules/enroll';
import student from './modules/student';
import guardianFather from './modules/guardianFather';
import guardianMother from './modules/guardianMother';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        enroll,
        student,
        guardianFather,
        guardianMother
    }
});