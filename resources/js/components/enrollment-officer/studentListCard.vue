<template>
    <div class="card card-danger card-outline">
        <div class="card-header">
            <div class="card-tools">
                <div class="input-group" style="width: 300px;">
                    <input type="text" 
                        class="form-control float-right"
                        placeholder="Search"
                        v-model="student_query"
                        @keyup="searchStudents"
                    />

                    <div class="input-group-append">
                        <button type="button" class="btn btn-default">
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
                        <th scope="col">Religion</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody v-if="students.data != undefined && students.data.length >= 1">
                        <tr v-for="student in students.data" :key="student.id">
                            <td>
                                {{ student.full_name }}
                            </td>
                            <td>
                                {{ student.sex }}
                            </td>
                            <td>
                                {{ student.religion }}
                            </td>
                            <td>
                                {{ student.contact_number }}
                            </td>
                            <td class="text-center">
                                <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fas fa-edit text-info mr-2"></i>
                                </a>
                                <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fas fa-trash text-danger mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <th colspan="5" class="text-center">
                            No data
                        </th>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <pagination :data="students" @pagination-change-page="loadStudents" v-bind:limit="1" />
        </div>
    </div>
</template>

<script>
import _ from 'lodash';

export default {
    name: 'StudentListCard',

    data() {
        return {
            base_path: '/enrollment-officer/api',
            students: {},
            student_query: ''
        }
    },
   
    created() {
        this.$Progress.start();
        this.loadStudents();
    },

    mounted() {
        this.searchStudents = _.debounce(this.searchStudents, 300);
    },

    methods: {
        loadStudents(page = 1) {
            axios.get(`${this.base_path}/students?page=${page}`)
                .then(response => {
                    this.students = response.data;
                    this.$Progress.finish();
                })
                .catch(error => {
                    console.log(error);
                    this.$Progress.fail();
                    this.loadingText = 'No data';
                });
        },

        searchStudents() {
            if (this.student_query) {
                axios.get(`${this.base_path}/students/search?query=${this.student_query}`)
                    .then(response => {
                        this.students = response.data;
                    })
                    .catch(error => console.log(error));
            } else {
                this.loadStudents();
            }
        }
    }
}
</script>
