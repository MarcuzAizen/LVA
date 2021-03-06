import Dashboard from '../../pages/enrollment-officer';
import NewStudent from '../../pages/enrollment-officer/enroll/new-student';
import OldStudent from '../../pages/enrollment-officer/enroll/old-student';
import Students from '../../pages/enrollment-officer/students';

const basePath = 'enrollment-officer';

export const enrollmentOfficer = {
    path: `/${basePath}/home`,
    name: `${basePath}.home`,
    component: Dashboard
};

export const newStudent  = {
    path: `/${basePath}/enroll/new-student`,
    name: `${basePath}.enroll.new`,
    component: NewStudent
};

export const oldStudent  = {
    path: `/${basePath}/enroll/old-student`,
    name: `${basePath}.enroll.old`,
    component: OldStudent
};

export const students = {
    path: `/${basePath}/students`,
    name: `${basePath}.students`,
    component: Students
};