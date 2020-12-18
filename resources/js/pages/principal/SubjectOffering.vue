<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <i class="nav-icon fas fa-chalkboard"></i> Subject Offerings
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
                <SubjectOfferingCardJHS trackType="Junior High" 
                    :data="prospectuses.data"
                    v-on:reload-prospectuses="loadProspectuses"
                />
                <SubjectOfferingCardSHS trackType="Senior High" 
                    :data="prospectuses.data"
                    v-on:reload-prospectuses="loadProspectuses"
                />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import SubjectOfferingCardJHS from '../../components/principal/SubjectOfferingCardJHS';
import SubjectOfferingCardSHS from '../../components/principal/SubjectOfferingCardSHS';

export default {
    name: 'SubjectOffering',

    components: {
        SubjectOfferingCardJHS,
        SubjectOfferingCardSHS
    },

    data() {
        return {
            prospectuses: {},
        }
    },
    
    created() {
        this.$Progress.start();
        this.loadProspectuses();
    },

    methods: {
        loadProspectuses() {
            axios.get('/principal/api/tracks/subject-offerings').then(response => {
                this.prospectuses = response.data;
                this.$Progress.finish();
            }).catch(error => {
                console.log(error);
                this.$Progress.fail();
            });
        },
    }
}
</script>