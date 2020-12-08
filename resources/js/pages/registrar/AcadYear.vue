<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <i class="nav-icon fas fa-calendar-alt"></i> School Year
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
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" class="btn btn-success" @click="showAddAcadYearModal">
                                <i class="fas fa-plus"></i> Add school year
                            </button>
                        </div>
                        <div class="card-tools mt-1">
                            <div class="input-group" style="width: 200px;">
                                <input type="text" 
                                    class="form-control float-right" 
                                    placeholder="Search"
                                    v-model="acadYear_query"
                                    @keyup="searchAcadYears"
                                    v-focus
                                />

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default" @click="searchAcadYears">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-head-fixed">
                                <thead>
                                    <th scope="col">Year</th>
                                    <th scope="col" class="text-center">Action</th>
                                </thead>
                                <tbody v-if="acadYears.data != undefined && acadYears.data.length >= 1">
                                    <tr v-for="acadYear in acadYears.data" :key="acadYear.id">
                                        <td>
                                            {{ acadYear.start }} - {{ acadYear.end }}
                                        </td>
                                        <td class="text-center">
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit text-info mr-2" @click="showEditAcadYearModal(acadYear)"></i>
                                            </a>
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash text-danger mr-2" @click="deleteAcadYear(acadYear.id)"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <th colspan="3" class="text-center">
                                        {{ loadingText }}
                                    </th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination :data="acadYears" @pagination-change-page="loadAcadYears" v-bind:limit="1" />
                    </div>
                </div><!-- /.card -->

                <acad-year-modal 
                    :acadYearForm="form" 
                    :editMode="editMode" 
                    v-on:reload-acad-years="loadAcadYears" 
                />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import _ from 'lodash';
import AcadYearModal from '../../components/registrar/AcadYearModal'

export default {
    name: 'AcadYear',

    components: {
        AcadYearModal
    },

    data() {
        return {
            acadYears: {},
            acadYear_query: '',
            loadingText: 'Loading...',
            editMode: false,
            form: new Form({
                id: '',
                start: ''
            })
        }
    },

    created() {
        this.$Progress.start();
        this.loadAcadYears();
        this.$on('reload-acad-years', () => this.loadAcadYears());
    },

    mounted() {
        this.searchAcadYears = _.debounce(this.searchAcadYears, 300);
    },

    methods: {
        loadAcadYears(page = 1) {
            this.loadingText = 'Loading...';
            axios.get(`/registrar/api/acad-years?page=${page}`).then(response => {
                this.acadYears = response.data;
                this.loadingText = 'No data';
                this.$Progress.finish();
            }).catch(() => {
                this.$Progress.fail();
                this.loadingText = 'No data';
            });
        },

        searchAcadYears() {
            if (this.acadYear_query) {
                axios.get(`/registrar/api/acad-years/search?query=${this.acadYear_query}`).then(response => {
                    this.acadYears = response.data;
                    this.loadingText = 'No data';
                }).catch(() => this.loadingText = 'No data');
            } else {
                this.loadAcadYears();
            }
        },

        deleteAcadYear(id) {
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
                    this.form.delete(`/registrar/api/acad-years/${id}`).then(() => {
                        Swal.fire('Deleted!', 'School year is deleted.','success');
                        this.$emit('reload-acad-years');
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

        showAddAcadYearModal() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $('#acad-year-modal').modal('show');
        },

        showEditAcadYearModal(acadYear) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            this.form.id = acadYear.id;
            this.form.start = acadYear.start.toString();
            this.form.end = acadYear.end.toString();
            $('#acad-year-modal').modal('show');
        },
    }
}
</script>