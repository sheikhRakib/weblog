<!-- Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('weblog.index') }}" class="brand-link">
        <img src="https://ui-avatars.com/api/?bold=true&color=272a6b&name=we+blog" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header"></li>
                @can('access articles')
                <!-- Articles -->
                <li class="nav-header">ARTICLES</li>

                @can('manage articles')
                <!-- Manage Articles -->
                <li class="nav-item">
                    <a href="{{ Route('article.manage') }}" class="nav-link">
                        <i class="nav-icon far fa-file-word"></i>
                        <p>Manage Articles</p>
                    </a>
                </li>
                @endcan
                
                @can('view own articles')
                <!-- View Own Articles -->
                <li class="nav-item">
                    <a href="{{ Route('article.drafted') }}" class="nav-link">
                        <i class="nav-icon far fa-copy"></i>
                        <p>Drafted</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ Route('article.published') }}" class="nav-link">
                        <i class="nav-icon far fa-flag"></i>
                        <p>Published</p>
                    </a>
                </li>
                <!-- ./View Own Articles -->
                @endcan

                
                @can('write articles')
                <!-- Write Articles -->
                <li class="nav-item">
                    <a href="{{ Route('article.create') }}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>Create</p>
                    </a>
                </li>
                <!-- ./Write Articles -->
                @endcan
                
                <!-- ./Articles -->
                @endcan
                @can('access roles & permissions')
                <!-- Roles and Permissions -->
                <li class="nav-header">ACCESS MANAGER</li>
                <li class="nav-item">
                    <a href="{{ Route('rolesAndPermissions') }}" class="nav-link">
                        <i class="nav-icon fas fa-terminal"></i>
                        <p>Roles & Permissions</p>
                    </a>
                </li>
                @endcan

                @can('access user section')
                <!-- User Section -->
                <li class="nav-header">MANAGEMENT</li>
                <li class="nav-item">
                    <a href="{{ Route('usermanagement') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>User Management</p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
    </div>
    <!-- /.Sidebar -->
</aside>
<!-- ./Sidebar Container -->
