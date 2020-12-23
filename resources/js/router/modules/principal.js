import Dashboard from '../../pages/principal/Dashboard';
import Teacher from '../../pages/principal/Teacher';
import SubjectOffering from '../../pages/principal/SubjectOffering';
import Schedules from '../../pages/principal/schedules';
import SchedulesHome from '../../pages/principal/schedules/home';
import SchedulesSeniorHigh from '../../pages/principal/schedules/seniorHigh';
import SchedulesJuniorHigh from '../../pages/principal/schedules/juniorHigh';
import Grade7 from '../../pages/principal/schedules/juniorHigh/grade_7';
import Grade8 from '../../pages/principal/schedules/juniorHigh/grade_8';
import Grade9 from '../../pages/principal/schedules/juniorHigh/grade_9';
import Grade10 from '../../pages/principal/schedules/juniorHigh/grade_10';
import Grade11 from '../../pages/principal/schedules/seniorHigh/grade_11';
import Grade12 from '../../pages/principal/schedules/seniorHigh/grade_12';

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
            component: SchedulesSeniorHigh,
            redirect: {
                name: 'principal.schedules.grade_11'
            },
            children: [
                {
                    path: '/principal/schedules/senior-high/grade-11',
                    name: 'principal.schedules.grade_11',
                    component: Grade11
                },
                {
                    path: '/principal/schedules/senior-high/grade-12',
                    name: 'principal.schedules.grade_12',
                    component: Grade12
                }
            ]
        },
        {
            path: '/principal/schedules/junior-high',
            name: 'principal.schedules.junior_high',
            component: SchedulesJuniorHigh,
            redirect: {
                name: 'principal.schedules.grade_7'
            },
            children: [
                {
                    path: '/principal/schedules/junior-high/grade-7',
                    name: 'principal.schedules.grade_7',
                    component: Grade7
                },
                {
                    path: '/principal/schedules/junior-high/grade-8',
                    name: 'principal.schedules.grade_8',
                    component: Grade8
                },
                {
                    path: '/principal/schedules/junior-high/grade-9',
                    name: 'principal.schedules.grade_9',
                    component: Grade9
                },
                {
                    path: '/principal/schedules/junior-high/grade-10',
                    name: 'principal.schedules.grade_10',
                    component: Grade10
                },
            ]
        }
    ]
};