<template>
    <div class="card card-danger card-outline">
        <div class="card-body">
            <progress-bar :step="step" :width="width" />

            <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(submit)">
                    <step-1 v-if="isFirst()" />
                    <step-2 v-if="isSecond()" />
                    <step-3 v-if="isThird()" />
                    <step-4 v-if="isFourth()" />
                    <step-5 v-if="isFifth()" />
                    <step-6 v-if="isSixth()" />

                    <div class="float-right">
                        <button
                            type="button" 
                            class="btn btn-primary"
                            v-show="!isFirst()"
                            @click="previous()"
                        >
                            Previous
                        </button>
                        <button
                            type="submit"
                            class="btn btn-primary"
                            v-show="!isSixth()"
                            :disabled="lrnExists && isFirst()"
                        >
                            Next
                        </button>
                        <button
                            type="submit"
                            class="btn btn-success"
                            v-show="isSixth()"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>
import ProgressBar from './../progressBar.vue';
import Step1 from './step1.vue';
import Step2 from './step2.vue';
import Step3 from './step3.vue';
import Step4 from './step4.vue';
import Step5 from './step5.vue';
import Step6 from './step6.vue';

export default {
    name: 'EnrollNewStudent',

    components: {
        ProgressBar,
        Step1,
        Step2,
        Step3,
        Step4,
        Step5,
        Step6
    },

    data() {
        return {
            step: 1,
            width: 18,
            studentForm: new Form({
                id: '',
                lrn:'',
                first_name:'',
                middle_name:'',
                last_name:'',
                suffix:'',
                sex:'',
                birthdate:'',
                mother_tongue:'',
                contact_number:'',
                previous_school:'',
                ethnic:'',
                religion:'',
                purok:'',
                barangay:'',
                city:'',
                province:'' 
            }),
            fatherForm: new Form({
                first_name: '',
                last_name: '',
                suffix: '',
                sex: '',
                birthdate: '',
                contact_number: '',
                religion: '',
                occupation: '',
                relationship: 'father'
            }),
            motherForm: new Form({
                first_name: '',
                last_name: '',
                suffix: '',
                sex: '',
                birthdate: '',
                contact_number: '',
                religion: '',
                occupation: '',
                relationship: 'mother'
            }),
            enrollmentForm: new Form({
                enrollment_officer_id: '',
                student_id: '',
                acad_year_id: '',
                section_id: '',
                student_remark_id: '',
                semester: ''
            })
        }
    },

    computed: {
        lrnExists: {
            get() {
                return this.$store.state.student.lrnExists;
            },

            set(value) {
                this.$store.commit('student/setLrnExists', value)
            }
        },
    },

    methods: {
        next() {
            this.step++;
            this.width += 18;
        },
        
        previous() {
            this.step--;
            this.width -= 18;
        },

        isFirst() {
            return this.step === 1;
        },

        isSecond() {
            return this.step === 2;
        },

        isThird() {
            return this.step === 3;
        },

        isFourth() {
            return this.step === 4;
        },

        isFifth() {
            return this.step === 5;
        },

        isSixth() {
            return this.step === 6;
        },

        fillStudentForm(data) {
            this.studentForm.lrn = data.lrn,
            this.studentForm.first_name = data.first_name,
            this.studentForm.middle_name = data.middle_name,
            this.studentForm.last_name = data.last_name,
            this.studentForm.suffix = data.suffix,
            this.studentForm.sex = data.sex,
            this.studentForm.birthdate = data.birthdate,
            this.studentForm.mother_tongue = data.mother_tongue,
            this.studentForm.contact_number = data.contact_number,
            this.studentForm.previous_school = data.previous_school,
            this.studentForm.ethnic = data.ethnic,
            this.studentForm.religion = data.religion,
            this.studentForm.purok = data.purok,
            this.studentForm.barangay = data.barangay,
            this.studentForm.city = data.city,
            this.studentForm.province = data.province
        },

        fillGuardianForm(form, data) {
            form.first_name = data.first_name;
            form.last_name = data.last_name;
            form.suffix = data.suffix;
            form.sex = data.sex;
            form.birthdate = data.birthdate;
            form.contact_number = data.contact_number;
            form.religion = data.religion;
            form.occupation = data.occupation;
        },

        fillEnrollmentForm(form, data) {
            form.enrollment_officer_id = data.enrollment_officer_id;
            form.acad_year_id = data.acad_year_id;
            form.section_id = data.section_id;
            form.student_remark_id = data.student_remark_id;
            form.semester = data.semester;
        },

        async submitForms(studentForm, fatherForm, motherForm, enrollmentForm, url) {
            try {
                const res = await studentForm.post(`${url}/students`);
                this.enrollmentForm.student_id = this.studentForm.id = res.data.id;
                await fatherForm.post(`${url}/students/${this.studentForm.id}/add-guardian`);
                await motherForm.post(`${url}/students/${this.studentForm.id}/add-guardian`);
                await enrollmentForm.post(`${url}/enrolls`);
            } catch (err) {
                console.log(err);
            }
        },

        submit() {
            if (this.isSixth()) {
                // TODO: Sweet Alert Loading Screen
                let studentUrl = '/enrollment-officer/api';
                this.fillStudentForm(this.$store.state.student);
                this.fillGuardianForm(this.fatherForm, this.$store.state.guardianFather);
                this.fillGuardianForm(this.motherForm, this.$store.state.guardianMother);
                this.fillEnrollmentForm(this.enrollmentForm, this.$store.state.enroll);

                this.submitForms(
                    this.studentForm,
                    this.fatherForm,
                    this.motherForm,
                    this.enrollmentForm,
                    studentUrl
                );
                // TODO: Sweet Alert Confirm Screen
            } else {
                this.next();
            }
        }
    }
}
</script>
