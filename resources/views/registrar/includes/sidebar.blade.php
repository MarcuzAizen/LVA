{{-- Main Sidebar Container --}}
<aside class="main-sidebar sidebar-light-warning elevation-4">
    <router-link :to="{ name: 'registrar.home' }" class="brand-link navbar-warning">
        <img src="/images/app/apple-touch-icon.png" alt="LVA Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-normal text-dark">Registrar</span>
    </router-link>

    {{-- Sidebar --}}
    <div class="sidebar">

        {{-- Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
                {{-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library --}}
                {{-- Dashboard --}}
                <li class="nav-item">
                    <router-link :to="{ name: 'registrar.home' }" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Dashboard
                        </p>
                    </router-link>
                </li>
                {{-- /.Dashboard --}}
                
                {{-- Subjects --}}
                <li class="nav-item">
                    <router-link :to="{ name: 'registrar.subject' }" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            Subjects
                        </p>
                    </router-link>
                </li>
                {{-- /.Subjects --}}
                
            </ul>
        </nav>{{-- /.sidebar-menu --}}
    </div>{{-- /.sidebar --}}
</aside>