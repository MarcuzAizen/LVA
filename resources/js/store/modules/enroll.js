const getDefaultState = () => {
    return {
        enrollment_officer_id: '',
        student_id: '',
        acad_year_id: '',
        section_id: '',
        student_remark_id: '',
        semester: ''
    };
};

export default {
    namespaced: true,

    state: getDefaultState(),

    mutations: {
        setEnrollmentOfficerId(state, enrollment_officer_id) {
            state.enrollment_officer_id = enrollment_officer_id;
        },

        setStudentId(state, student_id) {
            state.student_id = student_id;
        },

        setAcadYearId(state, acad_year_id) {
            state.acad_year_id = acad_year_id;
        },
        
        setSectionId(state, section_id) {
            state.section_id = section_id;
        },

        setStudentRemarkId(state, student_remark_id) {
            state.student_remark_id = student_remark_id;
        },

        setSemester(state, semester) {
            state.semester = semester;
        },

        resetState(state) {
            Object.assign(state, getDefaultState())
        }
    }
}