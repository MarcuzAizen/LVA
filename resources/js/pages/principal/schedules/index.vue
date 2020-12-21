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
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <router-link :to="{ name: 'principal.schedules.home' }" class="nav-link">
                            Home
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'principal.schedules.senior_high' }" class="nav-link">
                            Senior High
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'principal.schedules.junior_high' }" class="nav-link">
                            Junior High
                        </router-link>
                    </li>
                </ul>
                <router-view />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import moment from 'moment';

export default {
    name: 'Index',

    data() {
        return {
            loadingText: 'Loading...',
            schedules: {}
        }
    },

    // created() {
    //     this.$Progress.start();
    //     this.loadSchedules();
    // },

    // filters: {
    //     time(value) {
    //         if (!value) return '';
    //         return moment(value, 'hh:mm').format('hh:mm A');
    //     }
    // },

    // mounted() {
    //     this.$Progress.finish();
    // },

    // methods: {
    //     loadSchedules(page = 1) {
    //         this.loadingText = 'Loading...';
    //         axios.get(`/api/schedules?page=${page}`).then(response => {
    //             this.schedules = response.data;
    //             this.loadingText = 'No data';
    //             this.$Progress.finish();
    //         }).catch(error => {
    //             console.log(error);
    //             this.loadingText = 'No data';
    //             this.$Progress.fail();
    //         });
    //     },

    //     formatDay(day) {
    //         switch (day) {
    //             case 'M':
    //                 return 'Monday';
    //                 break;
    //             case 'T':
    //                 return 'Tuesday';
    //                 break;
    //             case 'W':
    //                 return 'Wednesday';
    //                 break;
    //             case 'H':
    //                 return 'Thursday';
    //                 break;
    //             case 'F':
    //                 return 'Friday';
    //                 break;
    //         }
    //     }
    // }
}
</script>
