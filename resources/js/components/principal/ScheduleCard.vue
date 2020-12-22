<template>
    <div class="card card-purple card-outline mb-4">
        <div class="card-header">
            <h3 class="card-title">
                {{ section.name }}
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Set schedule
                        </button>
                    </li>
                </ul>
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
                            <td>
                                Add action here
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
</template>

<script>
import moment from 'moment';

export default {
    name: 'ScheduleCard',

    props: {
        section: Object
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
        }
    }
}
</script>
