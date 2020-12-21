import Dashboard from '../../pages/principal/Dashboard';
import Teacher from '../../pages/principal/Teacher';
import SubjectOffering from '../../pages/principal/SubjectOffering';
import Schedules from '../../pages/principal/schedules';
import SchedulesHome from '../../pages/principal/schedules/Home';
import SchedulesSeniorHigh from '../../pages/principal/schedules/SeniorHigh';
import SchedulesJuniorHigh from '../../pages/principal/schedules/JuniorHigh';

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
    component: Schedules,
    redirect: {
        name: 'principal.schedules.home'
    },
    children: [
        {
            path: '/principal/schedules/home',
            name: 'principal.schedules.home',
            component: SchedulesHome,
        },
        {
            path: '/principal/schedules/senior-high',
            name: 'principal.schedules.senior_high',
            component: SchedulesSeniorHigh
        },
        {
            path: '/principal/schedules/junior-high',
            name: 'principal.schedules.junior_high',
            component: SchedulesJuniorHigh
        }
    ]
};