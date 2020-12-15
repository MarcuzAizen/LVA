<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i> Teachers
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
                            <button class="btn btn-success" type="button" @click="showAddTeacherModal">
                                <i class="fas fa-plus"></i> Add teacher
                            </button>
                        </div>
                        <div class="card-tools mt-1">
                            <div class="input-group" style="width: 200px;">
                                <input type="text" 
                                    class="form-control float-right" 
                                    placeholder="Search"
                                    v-model="teacher_query"
                                    @keyup="searchTeachers"
                                    v-focus
                                />

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default" @click="searchTeachers">
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Specialization</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col" class="text-center">Action</th>
                                </thead>
                                <tbody v-if="teachers.data != undefined && teachers.data.length >= 1">
                                    <tr v-for="teacher in teachers.data" v-bind:key="teacher.id" v-bind:teacher="teacher">
                                        <td>{{ teacher.full_name }}</td>
                                        <td>{{ teacher.sex }}</td>
                                        <td>{{ teacher.specialization }}</td>
                                        <td>{{ teacher.contact_number }}</td>
                                        <td class="text-center">
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="View">
                                                <i class="fas fa-eye text-success mr-2" @click="showTeacherInfoModal(teacher)"></i>
                                            </a>
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit text-info mr-2" @click="showEditTeacherModal(teacher)"></i>
                                            </a>
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash text-danger mr-2" @click="deleteTeacher(teacher.id)"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <th colspan="5" class="text-center">{{ loadingText }}</th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination :data="teachers" @pagination-change-page="loadTeachers" v-bind:limit="1" />
                    </div>
                </div> <!-- /.card -->

                <TeacherFormModal
                    :teacherForm="form"
                    :editMode="editMode"
                    v-on:reload-teachers="loadTeachers"
                />

                <TeacherInfoModal v-bind:teacher="teacher" />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import _ from 'lodash';
import TeacherFormModal from '../../components/principal/TeacherFormModal'
import TeacherInfoModal from '../../components/principal/TeacherInfoModal'

export default {
    name: 'Teacher',

    components: {
        TeacherFormModal,
        TeacherInfoModal
    },

    data() {
        return {
            loadingText: 'Loading...',
            editMode: false,
            teacher_query: '',
            teachers: {},
            teacher: {},
            form: new Form({
                id: '',
                role_id: 5,
                first_name: '',
                middle_name: '',
                last_name: '',
                suffix: '',
                sex: '',
                birthdate: '',
                contact_number: '',
                specialization: '',
                citizenship: '',
                religion: '',
                purok: '',
                barangay: '',
                city: '',
                province: '',
            })
        }
    },

    created() {
        this.$Progress.start();
        this.loadTeachers();
        this.$on('reload-teachers', () => this.loadTeachers());
    },

    mounted() {
        this.searchTeachers = _.debounce(this.searchTeachers, 300);
    },

    methods: {
        loadTeachers(page = 1) {
            this.loadingText = 'Loading...';
            axios.get(`/principal/api/users/teachers?page=${page}`).then(response => {
                this.teachers = response.data;
                this.loadingText = 'No data';
                this.$Progress.finish();
            }).catch(() => {
                this.$Progress.fail();
                this.loadingText = 'No data';
            });
        },

        searchTeachers() {
            if (this.teacher_query) {
                this.loadingText = 'Loading...';
                axios.get(`/principal/api/users/teachers/search?query=${this.teacher_query}`).then(response => {
                    this.teachers = response.data;
                    this.loadingText = 'No data';
                }).catch(() => this.loadingText = 'No data');
            } else {
                this.loadTeachers();
            }
        },

        deleteTeacher(id) {
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
                    axios.delete(`/principal/api/users/${id}`).then(() => {
                        Swal.fire('Deleted!', 'Teacher is deleted.','success');
                        this.$emit('reload-teachers');
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

        showAddTeacherModal() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $('#teacher-form-modal').modal('show');
        },

        showEditTeacherModal(teacher) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(teacher);
            $('#teacher-form-modal').modal('show');
        },

        showTeacherInfoModal(teacher) {
            this.teacher = teacher;
            $('#teacher-info-modal').modal('show');
        }
    }
}
</script>
