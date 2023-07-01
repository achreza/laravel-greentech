<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link disabled text-center">
        <img class="image-sidebar" id="img-sidebar" src="/assets/img/uin.png" style="width: 200px;">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if ($role == 'admin')
                    <!-- Admin -->
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/user-list" class="nav-link {{ $page === 'user-list' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/topic" class="nav-link {{ $page === 'topic' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Topics</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/abstract-status"
                                    class="nav-link {{ $page === 'abs-status' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Abstract Status</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/user-role" class="nav-link {{ $page === 'user-role' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/system-status"
                                    class="nav-link {{ $page === 'system-status' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>System Status</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/dashboard/logout"
                                    class="nav-link {{ $page === 'type' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif($role == 'reviewer')
                    <!-- Reviewer -->
                    <li class="nav-item">
                        <a href="/reviewer/dashboard" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/reviewer/dashboard/logout" class="nav-link {{ $page === 'type' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                @else
                    <!-- User -->
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/submission" class="nav-link {{ $page === 'submission' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>New Abstract Submission</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link {{ $page === 'profile' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/logout" class="nav-link {{ $page === 'type' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    function resize() {
        let element = document.getElementById("img-sidebar");
        element.classList.toggle("resize-image");
    }
</script>
