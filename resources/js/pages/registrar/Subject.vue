<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <i class="nav-icon fas fa-chalkboard"></i> Subject
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
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <button type="button" class="btn btn-success" @click="showAddSubjectModal">
                                <i class="fas fa-plus"></i> Add Subject
                            </button>
                        </h3>
                        <div class="card-tools mt-1">
                            <div class="input-group" style="width: 200px;">
                                <input 
                                    type="text"
                                    v-model="subject_query" 
                                    @keyup="searchSubject" 
                                    class="form-control float-right" 
                                    placeholder="Search"
                                />
                                    
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default" @click="searchSubject">
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
                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Unit(s)</th>
                                    <th scope="col" class="text-center">Action</th>
                                </thead>
                                <tbody v-if="subjects.data != undefined && subjects.data.length >= 1">
                                    <tr v-for="subject in subjects.data" v-bind:key="subject.id">
                                        <th v-if="subject == []">no data</th>
                                        <th scope="row">{{ subject.code }}</th>
                                        <td>{{ subject.description }}</td>
                                        <td>{{ subject.unit }}</td>
                                        <td class="text-center">
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit text-info mr-2" @click="showEditSubjectModal(subject)"></i>
                                            </a>
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash text-danger mr-2" @click="deleteSubject(subject.id)"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <th colspan="4" class="text-center">{{ loadingText }}</th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination :data="subjects" @pagination-change-page="loadSubjects" v-bind:limit="1" />
                    </div>
                </div><!-- /.card -->

                <SubjectModal v-bind:subjectForm="form" v-bind:editMode="editMode" v-on:reload-subjects="loadSubjects" />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import _ from 'lodash';
import SubjectModal from '../../components/registrar/SubjectModal';

export default {
    name: 'Subject',
    components: {
        SubjectModal
    },
    data() {
        return {
            loadingText: '',
            subjects: {},
            subject_query: '',
            editMode: false,
            form: new Form({
                id: '',
                code: '',
                description: '',
                unit: '',
            }),
        }
    },
    mounted() {
        this.searchSubject = _.debounce(this.searchSubject, 300);
    },
    created() {
        this.loadingText = 'Loading...';
        this.$Progress.start();
        this.loadSubjects();
        this.$on('reload-subjects', () => this.loadSubjects());
    },
    methods: {
        showAddSubjectModal() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $('#subject-modal').modal('show');
        },
        showEditSubjectModal(subject) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(subject);
            $('#subject-modal').modal('show');
        },
        loadSubjects(page = 1) {
            this.loadingText = 'Loading...';
            axios.get(`/registrar/api/subjects?page=${page}`).then(response => {
                this.subjects = response.data;
                this.loadingText = 'No data';
                this.$Progress.finish();
            }).catch(() => {
                this.$Progress.fail();
                this.loadingText = 'No data';
            });
        },
        searchSubject() {
            if (this.subject_query) {
                axios.get(`/registrar/api/subjects/search?query=${this.subject_query}`)
                    .then(response => this.subjects = response.data)
                    .catch();
            } else {
                this.loadSubjects();
            }
        },
        deleteSubject(id) {
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
                    this.form.delete(`/registrar/api/subjects/${id}`).then(() => {
                        Swal.fire('Deleted!', 'Subject is deleted.','success');
                        this.$emit('reload-subjects');
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
        }
    }
}
</script>