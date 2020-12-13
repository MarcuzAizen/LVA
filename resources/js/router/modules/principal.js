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