import Dashboard from '../../pages/principal/Dashboard';
import Teacher from '../../pages/principal/Teacher';
import SubjectOffering from '../../pages/principal/SubjectOffering';
import Schedules from '../../pages/principal/Schedules';

export const principalHome = {
    path: '/principal/home',
    name: 'principal.home',
    component: Dashboard
};

export const teachers = {
    path: '/principal/teachers',
    name: 'principal.teachers',
    component: Teacher
};

export const subjectOfferings = {
    path: '/principal/subject-offerings',
    name: 'principal.subject-offerings',
    component: SubjectOffering
};

export const schedules = {
    path: '/principal/schedules',
    name: 'principal.schedules',
    component: Schedules
};