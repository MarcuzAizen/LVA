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
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loading from '../../../../components/principal/Loading';
import ScheduleCard from '../../../../components/principal/ScheduleCard';

export default {
    name: 'Grade12',

    components: {
        Loading,
        ScheduleCard
    },

    data() {
        return {
            loading: true,
            grade_level: 12,
            tracks: []
        }
    },

    created() {
        this.$Progress.start();
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
        }
    }
}
</script>
