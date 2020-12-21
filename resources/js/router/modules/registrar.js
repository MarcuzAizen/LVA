import Dashboard from '../../pages/registrar/Dashboard';
import Subject from '../../pages/registrar/Subject';
import Track from '../../pages/registrar/Track';
import Section from '../../pages/registrar/Section';
import AcadYear from '../../pages/registrar/AcadYear';

export const registrarHome = {
    path: '/registrar/home',
    name: 'registrar.home',
    component: Dashboard
};

export const subject = {
    path: '/registrar/subject',
    name: 'registrar.subject',
    component: Subject
};

export const track = {
    path: '/registrar/track',
    name: 'registrar.track',
    component: Track
};

export const section = {
    path: '/registrar/section',
    name: 'registrar.section',
    component: Section
};

export const schoolYear = {
    path: '/registrar/school-year',
    name: 'registrar.school-year',
    component: AcadYear
};