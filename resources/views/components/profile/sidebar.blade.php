<!-- Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('weblog.index') }}" class="brand-link">
        <img src="{{ asset('plugins/adminlte/img/AdminLTELogo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">WEB LINKS</li>
                
                @can('access articles')
                <!-- Articles -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file-word"></i>
                        <p>Article<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview bg-gray rounded">
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
                        @can('write articles')
                        <li class="nav-item">
                            <a href="{{ Route('article.create') }}" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Create</p>
                            </a>
                        </li>  
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('access roles & permissions')
                <!-- Roles and Permissions -->
                <li class="nav-item">
                    <a href="{{ Route('rolesAndPermissions') }}" class="nav-link">
                        <i class="nav-icon fas fa-terminal"></i>
                        <p>Roles & Permissions</p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
    </div>
    <!-- /.Sidebar -->
</aside>
<!-- ./Sidebar Container -->
