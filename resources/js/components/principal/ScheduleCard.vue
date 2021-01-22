<template>
    <div>
        <div class="card card-purple card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    {{ section.name }}
                </h3>
                <div class="card-tools">
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench" />
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="#" class="dropdown-item" @click="showSetScheduleModal">
                                Add new schedule
                            </a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus" />
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times" />
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-head-fixed">
                        <thead>
                            <th scope="col">Time</th>
                            <th scope="col">Day</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Teacher</th>
                            <th scope="col" class="text-center">Action</th>
                        </thead>
                        <tbody v-if="section.schedules != undefined && section.schedules.length >= 1">
                            <tr v-for="sched in section.schedules" :key="sched.id">
                                <td>
                                    {{ sched.time_start | time }} - {{ sched.time_end | time }}
                                </td>
                                <td>
                                    {{ formatDay(sched.day) }}
                                </td>
                                <td>
                                    {{ sched.prospectus.subject.code }}
                                </td>
                                <td>
                                    {{ sched.teacher.full_name }}
                                </td>
                                <td class="text-center">
                                    <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-edit text-info mr-2" @click="showEditScheduleModal(sched)" />
                                    </a>
                                    <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash text-danger mr-2" @click="deleteSchedule(sched.id)" />
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <th colspan="5" class="text-center">No Data</th>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->

        <ScheduleModal 
            :editMode="editMode" 
            :section="section" 
            :acad-years="acadYears"
            :prospectuses="prospectuses"
            :teachers="teachers"
            :scheduleForm="form"
            v-on:reload-schedules="$emit('reload-schedules', 'reload-schedules')" />
    </div>
</template>

<script>
import moment from 'moment';
import ScheduleModal from './ScheduleModal';

export default {
    name: 'ScheduleCard',

    props: {
        section: Object,
        acadYears: Array,
        trackName: String,
        gradeLevel: Number,
        teachers: Array
    },

    data() {
        return {
            editMode: false,
            prospectuses: [],
            form: new Form({
                id: '',
                acad_year_id: '',
                teacher_id: '',
                section_id: this.section.id,
                prospectus_id: '',
                day: '',
                time_start: '',
                time_end: ''
            })
        }
    },

    components: {
        ScheduleModal
    },

    created() {
        this.loadSubjects(this.trackName, this.gradeLevel);
    },

    filters: {
        time(value) {
            if (!value) return '';
            return moment(value, 'hh:mm').format('hh:mm A');
        }
    },

    methods: {
        formatDay(day) {
            switch (day) {
                case 'M':
                    return 'Monday';
                    break;
                case 'T':
                    return 'Tuesday';
                    break;
                case 'W':
                    return 'Wednesday';
                    break;
                case 'H':
                    return 'Thursday';
                    break;
                case 'F':
                    return 'Friday';
                    break;
            }
        },

        showSetScheduleModal() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $(`#schedule-modal-${this.section.name}`).modal('show');
        },
        
        showEditScheduleModal(sched) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            this.form.id = sched.id;
            this.form.acad_year_id = sched.acad_year_id;
            this.form.teacher_id = sched.teacher_id;
            this.form.prospectus_id = sched.prospectus_id
            this.form.day = sched.day;
            this.form.time_start = sched.time_start.slice(0, -3);
            this.form.time_end = sched.time_end.slice(0, -3);
            $(`#schedule-modal-${this.section.name}`).modal('show');
        },

        loadSubjects(track_name, grade_level) {
            axios.get(`/principal/api/subjects/${track_name}/${grade_level}`).then(response => {
                this.prospectuses = response.data.data;
            }).catch(error => {
                console.log(error);
            });
        },

        deleteSchedule(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    this.$Progress.start();
                    axios.delete(`/principal/api/schedules/${id}`).then(() => {
                        Swal.fire('Deleted!', 'Subject schedule is deleted.','success');
                        this.$emit('reload-schedules');
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Something went wrong!'
                        });
                    });
                }
            });
        },
    }
}
</script>
