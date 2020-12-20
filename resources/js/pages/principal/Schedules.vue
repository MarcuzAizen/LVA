<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <i class="nav-icon fas fa-calendar-week" /> Schedules
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <!-- -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-purple card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <button class="btn btn-success" type="button">
                                <i class="fas fa-plus" /> Create subject schedule
                            </button>
                        </div>
                        <div class="card-tools mt-1">
                            <div class="input-group" style="width: 200px;">
                                <input type="text" 
                                    class="form-control float-right" 
                                    placeholder="Search"
                                />

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default">
                                        <i class="fas fa-search" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-head-fixed">
                                <thead>
                                    <th scope="col">
                                        Section
                                    </th>
                                    <th scope="col">
                                        Subject
                                    </th>
                                    <th scope="col">
                                        Day
                                    </th>
                                    <th scope="col">
                                        Time
                                    </th>
                                    <th scope="col">
                                        Teacher
                                    </th>
                                    <th scope="col" class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody v-if="schedules.data != undefined && schedules.data.length >= 1">
                                    <tr v-for="sched in schedules.data" :key="sched.id">
                                        <td>
                                            {{ sched.section.name }}
                                        </td>
                                        <td>
                                            {{ sched.prospectus.subject.code }}
                                        </td>
                                        <td>
                                            {{ formatDay(sched.day) }}
                                        </td>
                                        <td>
                                            {{ sched.time_start | time }} - {{ sched.time_end | time }}
                                        </td>
                                        <td>
                                            {{ sched.teacher.last_name }}
                                        </td>
                                        <td>
                                            action
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <th colspan="6" class="text-center">
                                        {{ loadingText }}
                                    </th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination :data="schedules" @pagination-change-page="loadSchedules" v-bind:limit="1" />
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import moment from 'moment';

export default {
    name: 'Schedules',

    data() {
        return {
            loadingText: 'Loading...',
            schedules: {}
        }
    },

    created() {
        this.$Progress.start();
        this.loadSchedules();
    },

    filters: {
        time(value) {
            if (!value) return '';
            return moment(value, 'hh:mm').format('hh:mm A');
        }
    },

    mounted() {
        // this.$Progress.finish();
    },

    methods: {
        loadSchedules(page = 1) {
            this.loadingText = 'Loading...';
            axios.get(`/api/schedules?page=${page}`).then(response => {
                this.schedules = response.data;
                this.loadingText = 'No data';
                this.$Progress.finish();
            }).catch(error => {
                console.log(error);
                this.loadingText = 'No data';
                this.$Progress.fail();
            });
        },

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
