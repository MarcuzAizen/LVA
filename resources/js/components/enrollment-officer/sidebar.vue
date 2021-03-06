<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-danger elevation-4">
        <router-link :to="{ name: 'enrollment-officer.home' }" class="brand-link navbar-danger">
            <img src="/images/app/apple-touch-icon.png" alt="LVA Logo" class="brand-image img-circle" style="opacity: .8">
            <span class="brand-text font-weight-normal text-light">Enrollment Officer</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <router-link :to="{ name: 'enrollment-officer.home' }" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Dashboard
                            </p>
                        </router-link>
                    </li>
                    <!-- /.Dashboard -->

                    <!-- Enroll -->
                    <li class="nav-item has-treeview">
                        <a style="cursor: pointer;" 
                            class="nav-link" 
                            :class="{ 
                                'active' : (
                                    $route.name == 'enrollment-officer.enroll.new' ||
                                    $route.name == 'enrollment-officer.enroll.old') 
                            }">
                            <i class="nav-icon fas fa-school"></i>
                            <p>
                                Enroll
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link :to="{ name: 'enrollment-officer.enroll.new' }" class="nav-link">
                                    <i class="nav-icon fas fa-id-card"></i>
                                    <p>New Student</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{ name: 'enrollment-officer.enroll.old' }" class="nav-link">
                                    <i class="nav-icon fas fa-id-card-alt"></i>
                                    <p>Old Student</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <!-- /.Enroll -->

                     <!-- Students -->
                    <li class="nav-item">
                        <router-link :to="{ name: 'enrollment-officer.students' }" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Students
                            </p>
                        </router-link>
                    </li>
                    <!-- /.Students -->
                    
                </ul>
            </nav><!-- /.sidebar-menu -->
        </div><!-- /.sidebar -->
    </aside>
</template>

<script>
export default {
    name: 'Sidebar',

    methods: {
        test() {
            console.log(this.$route.name);
        }
    }
}
</script>
