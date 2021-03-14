<template>
  <div class="card card-danger card-outline">
    <div class="card-header">
      <div class="card-title">
        <form @submit.prevent="searchStudents">
          <div class="input-group" style="width: 500px">
            <input
              type="text"
              class="form-control float-right"
              placeholder="Search student"
              v-model="student_query"
              v-focus
            />

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card-body">
      <loading v-if="loading" />
      <div class="table-responsive" v-if="!isNotEmptyObject(student)">
        <table class="table table-bordered table-hover table-head-fixed">
          <tbody v-if="students != undefined && students.length >= 1">
            <tr
              v-for="student in students"
              :key="student.id"
              style="cursor: pointer"
            >
              <td @click="enroll(student)">
                {{ student.full_name }}
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <th colspan="5" class="text-center">No data</th>
          </tbody>
        </table>
      </div>

      <enroll
        :student="student"
        v-if="isNotEmptyObject(student)"
        @student-event="setStudentEmpty"
      />
    </div>
  </div>
</template>

<script>
import Loading from "./../../Loading";
import Enroll from "./enroll";
import _ from "lodash";

export default {
  name: "EnrollOldStudent",

  components: {
    Loading,
    Enroll,
  },

  data() {
    return {
      base_path: "/enrollment-officer/api",
      student_query: "",
      students: [],
      student: {},
      loading: false,
    };
  },

  methods: {
    searchStudents() {
      this.loading = true;
      axios
        .get(`${this.base_path}/students/search?query=${this.student_query}`)
        .then((response) => {
          this.loading = false;
          this.student_query = "";
          this.student = {};
          this.students = response.data.data;
        })
        .catch((error) => {
          this.loading = false;
          console.log(error);
        });
    },

    enroll(student) {
      this.student = student;
    },

    isNotEmptyObject(obj) {
      return !_.isEmpty(obj);
    },

    setStudentEmpty(obj) {
      this.student = obj;
    },
  },
};
</script>
