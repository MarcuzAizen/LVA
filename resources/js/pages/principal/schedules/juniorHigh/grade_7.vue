<template>
    <div class="container-fluid mt-3">
        <Loading 
            v-if="loading" 
            :text="loadingText" 
        />
        <ScheduleCard 
            v-for="section in track.sections"
            :key="section.id"
            :section="section" 
        />
    </div>
</template>

<script>
import Loading from '../../../../components/principal/Loading';
import ScheduleCard from '../../../../components/principal/ScheduleCard';

export default {
    name: 'Grade7',

    components: {
        Loading,
        ScheduleCard
    },

    data() {
        return {
            loading: true,
            loadingText: 'Loading Sections...',
            grade_level: 7,
            track: {}
        }
    },

    created() {
        this.$Progress.start();
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
        }
    }
}
</script>
