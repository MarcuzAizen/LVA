<template>
    <div>
        <Loading v-if="loading" />
        <div v-else>
            <ul class="nav nav-tabs mb-4">
                <li v-for="(track, index) in tracks" :key="track.id" class="nav-item">
                    <a class="nav-link" :class="{ 'active': index === 0 }" data-toggle="tab" :href="`#${track.name}`">
                        {{ track.name }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div v-for="(track, index) in tracks" 
                    :key="track.id"
                    :id="track.name"
                    class="tab-pane fade"
                    :class="{ 'show active' : index === 0 }">
                    <div class="container-fluid mt-3">
                        <ScheduleCard 
                            v-for="section in track.sections"
                            :key="section.id"
                            :section="section"
                            :acad-years="acadYears"
                            :track-name="track.name"
                            :grade-level="track.grade_level"
                            :teachers="teachers"
                            v-on:reload-schedules="loadSchedules"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loading from './../../../../components/Loading';
import ScheduleCard from '../../../../components/principal/ScheduleCard';

export default {
    name: 'Grade11',

    components: {
        Loading,
        ScheduleCard
    },

    data() {
        return {
            loading: true,
            grade_level: 11,
            tracks: [],
            acadYears: [],
            teachers: []
        }
    },

    created() {
        this.$Progress.start();
        this.loadAcadYears();
        this.loadTeachers();
        this.loadSchedules();
    },

    methods: {
        loadSchedules() {
            axios.get(`/principal/api/schedules/senior-high/${this.grade_level}`).then(response => {
                this.tracks = response.data.data;
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

        loadTeachers() {
            axios.get(`/principal/api/users/teachers/all`).then(response => {
                this.teachers = response.data.data;
            }).catch(error => {
                console.log(error);
                this.$Progress.fail();
            });
        },

        test() {
            console.log('Event received from grandchild');
        }
    }
}
</script>
