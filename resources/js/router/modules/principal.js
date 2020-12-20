export const principalHome = {
    path: '/principal/home',
    name: 'principal.home',
    component: () => import('../../pages/principal/Dashboard.vue')
};

export const teachers = {
    path: '/principal/teachers',
    name: 'principal.teachers',
    component: () => import('../../pages/principal/Teacher.vue')
};

export const subjectOfferings = {
    path: '/principal/subject-offerings',
    name: 'principal.subject-offerings',
    component: () => import('../../pages/principal/SubjectOffering.vue')
};

export const schedules = {
    path: '/principal/schedules',
    name: 'principal.schedules',
    component: () => import('../../pages/principal/Schedules.vue')
};