<template>
    <div class="container-fluid mt-3">
        <Loading v-if="loading" />
        <ScheduleCard 
            v-for="section in track.sections"
            :key="section.id"
            :section="section" 
            :acad-years="acadYears"
            :prospectuses="prospectuses"
            :teachers="teachers"
        />
    </div>
</template>

<script>
import Loading from '../../../../components/principal/Loading';
import ScheduleCard from '../../../../components/principal/ScheduleCard';

export default {
    name: 'Grade8',

    components: {
        Loading,
        ScheduleCard
    },

    data() {
        return {
            loading: true,
            loadingText: 'Loading Sections...',
            grade_level: 8,
            track: {},
            acadYears: [],
            prospectuses: [],
            teachers: []
        }
    },

    created() {
        this.$Progress.start();
        this.loadAcadYears();
        this.loadSubjects();
        this.loadTeachers();
        this.loadSchedules();
    },

    methods: {
        loadSchedules() {
            axios.get(`/principal/api/schedules/junior-high/${this.grade_level}`).then(response => {
                this.track = response.data.data;
                this.loading = false;
                this.$Progress.finish();
            }).catch(error => {
                console.log(error);
                this.$Progress.fail();
            });
        },

        loadAcadYears() {
            axios.get(`/principal/api/acad-years`).then(response => {
                this.acadYears = response.data.data;
            }).catch(error => {
                console.log(error);
                this.$Progress.fail();
            });
        },

        loadSubjects() {
            axios.get(`/principal/api/subjects/JHS/${this.grade_level}`).then(response => {
                this.prospectuses = response.data.data;
            }).catch(error => {
                console.log(error);
                this.$Progress.fail();
            });
        },

        loadTeachers() {
            axios.get(`/principal/api/users/teachers/all`).then(response => {
                this.teachers = response.data.data;
            }).catch(error => {
                console.log(error);
                this.$Progress.fail();
            });
        }
    }
}
</script>
