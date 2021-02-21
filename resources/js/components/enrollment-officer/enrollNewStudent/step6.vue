<template>
    <div id="step-6">
        <h4 class="text-primary">
            <i class="fas fa-school" />
            <b>Enroll</b>
        </h4>
        <hr>
        <div class="row">
            <div class="col-6">
                <ValidationProvider name="school_year" rules="required" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            School Year
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <select
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            v-model="acad_year_id"
                        >
                            <option value=""></option>
                            <option 
                                v-for="acad_year in acad_years"
                                :key="acad_year.id"
                                :value="acad_year.id"
                            >
                                {{ acad_year.start }} - {{ acad_year.end }}
                            </option>
                        </select>
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-6">
                <ValidationProvider name="section" rules="required" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            Grade Level &amp; Section
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <select
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            v-model="section_id"
                        >
                            <option value=""></option>
                            <option 
                                v-for="section in sections"
                                :key="section.id"
                                :value="section.id"
                            >
                                Grade {{ section.track.grade_level }} {{ section.track.name }} - {{ section.name }}
                            </option>
                        </select>
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>
                        Semester
                        <small class="text-info">
                            <em>(optional)</em>
                        </small>
                    </label>
                    <select class="form-control" v-model="semester">
                        <option value=""></option>
                        <option value="1">First Semester</option>
                        <option value="2">Second Semester</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>
                        Additional Remarks
                        <small class="text-info">
                            <em>(optional)</em>
                        </small>
                    </label>
                    <select class="form-control" v-model="student_remark_id">
                        <option value=""></option>
                        <option 
                            v-for="student_remark in student_remarks"
                            :key="student_remark.id"
                            :value="student_remark.id"
                        >
                            {{ student_remark.indicator }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Step6',

    computed: {
        student_remark_id: {
            get() {
                return this.$store.state.enroll.student_remark_id;
            },

            set(value) {
                this.$store.commit('enroll/setStudentRemarkId', value)
            }
        },

        enrollment_officer_id: {
            get() {
                return this.$store.state.enroll.enrollment_officer_id;
            },

            set(value) {
                this.$store.commit('enroll/setEnrollmentOfficerId', value)
            }
        },

        student_id: {
            get() {
                return this.$store.state.enroll.student_id;
            },

            set(value) {
                this.$store.commit('enroll/setStudentId', value)
            }
        },

        acad_year_id: {
            get() {
                return this.$store.state.enroll.acad_year_id;
            },

            set(value) {
                this.$store.commit('enroll/setAcadYearId', value)
            }
        },

        section_id: {
            get() {
                return this.$store.state.enroll.section_id;
            },

            set(value) {
                this.$store.commit('enroll/setSectionId', value)
            }
        },

        semester: {
            get() {
                return this.$store.state.enroll.semester;
            },

            set(value) {
                this.$store.commit('enroll/setSemester', value)
            }
        },
    },

    data() {
        return {
            acad_years: [],
            sections: [],
            student_remarks: []
        }
    },

    created() {
        this.loadAcadYears();
        this.loadSections();
        this.loadStudentRemarks();
        this.getEnrollmentOfficerId();
    },

    methods: {
        loadAcadYears() {
            axios.get(`/enrollment-officer/api/acad-years/all`)
                .then(response => {
                    this.acad_years = response.data.data;
                })
                .catch(error => {
                    this.$Progress.fail();
                    console.log(error);
                });
        },

        loadSections() {
            axios.get(`/enrollment-officer/api/sections/all`)
                .then(response => {
                    this.sections = response.data.data;
                })
                .catch(error => {
                    this.$Progress.fail();
                    console.log(error);
                });
        },

        loadStudentRemarks() {
            axios.get(`/enrollment-officer/api/student-remarks`)
                .then(response => {
                    this.student_remarks = response.data.data;
                })
                .catch(error => {
                    this.$Progress.fail();
                    console.log(error);
                });
        },

        getEnrollmentOfficerId() {
            axios.get(`/enrollment-officer/api/user`)
                .then(response => {
                    this.enrollment_officer_id = response.data.id;
                })
                .catch(error => {
                    this.$Progress.fail();
                    console.log(error);
                });
        }
    }
}
</script>
