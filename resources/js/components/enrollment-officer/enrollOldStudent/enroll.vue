<template>
  <div>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(submit)">
        <step-6 />

        <div class="float-right">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </ValidationObserver>
  </div>
</template>

<script>
import Step6 from "./../enrollNewStudent/step6";

export default {
  name: "Enroll",

  props: {
    student: Object,
  },

  components: {
    Step6,
  },

  data() {
    return {
      enrollmentForm: new Form({
        enrollment_officer_id: "",
        student_id: "",
        acad_year_id: "",
        section_id: "",
        student_remark_id: "",
        semester: "",
      }),
    };
  },

  created() {
    this.enrollmentForm.student_id = this.student.id;
  },

  methods: {
    submit() {
      //   this.$emit("student-event", {});
      this.fillEnrollmentForm(this.enrollmentForm, this.$store.state.enroll);
    },
    fillEnrollmentForm(form, data) {
      form.enrollment_officer_id = data.enrollment_officer_id;
      form.acad_year_id = data.acad_year_id;
      form.section_id = data.section_id;
      form.student_remark_id = data.student_remark_id;
      form.semester = data.semester;
    },
  },
};
</script>
