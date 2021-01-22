import Vue from 'vue';
import VueRouter from 'vue-router';
import { registrarHome, subject, track, section, schoolYear } from './modules/registrar';
import { principalHome, teachers, subjectOfferings, schedules } from './modules/principal';
import { teacherHome } from './modules/teacher';
import { enrollmentOfficer } from './modules/enrollment-officer';

Vue.use(VueRouter);

const routes = [
    registrarHome,
    subject,
    track,
    section,
    schoolYear,
    principalHome,
    teachers,
    subjectOfferings,
    schedules,
    teacherHome,
    enrollmentOfficer
];

export default new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: 'active'
}); 