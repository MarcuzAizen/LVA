<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <i class="nav-icon fas fa-chart-pie"></i> Old Student
            </h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <!-- -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <enroll-old-student />
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</template>

<script>
import EnrollOldStudent from "./../../../components/enrollment-officer/enrollOldStudent";

export default {
  name: "OldStudent",

  components: {
    EnrollOldStudent,
  },

  created() {
    this.$Progress.start();
  },

  mounted() {
    this.$Progress.finish();
  },
};
</script>