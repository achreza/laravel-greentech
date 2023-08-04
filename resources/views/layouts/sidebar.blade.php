<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link disabled text-center">
        <img class="image-sidebar" id="img-sidebar" src="{{ asset('public/images/Logo_GT.png') }}" style="width: 200px;">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if (request()->session()->get('user.id_role_user') == 1)
                    <!-- Admin -->
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
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
                    <li class="nav-item">
                        <a href="/admin/participant" class="nav-link {{ $page === 'user-list' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Participant Payment</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/paper/payment" class="nav-link {{ $page === 'user-list' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Paper Payment</p>
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
                                <a href="/admin/system"
                                    class="nav-link {{ $page === 'system-status' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>System Status</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/logout" class="nav-link {{ $page === 'type' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(request()->session()->get('user.id_role_user') == 4)
                    <!-- Reviewer -->
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/reviewer/peer-review" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Peer Review</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link {{ $page === 'type' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                @elseif (request()->session()->get('user.id_role_user') == 3)
                    <!-- Reviewer -->
                    <li class="nav-item">
                        <a href="/dashboard-participant" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/participant/type" class="nav-link {{ $page === 'dashboard' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Payment</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link {{ $page === 'type' ? 'active' : '' }}">
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

                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">

                            <p>
                                Abstract's Submission
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview" style="margin-left: 20px">
                            <li class="nav-item">
                                <a href="/submission" class="nav-link {{ $page === 'submission' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Abstract Submission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/payment" class="nav-link {{ $page === 'payment' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Submission Payment</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">

                            <p>
                                Paper's Submission
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview" style="margin-left: 20px">
                            <li class="nav-item">
                                <a href="/paper" class="nav-link {{ $page === 'paper' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Paper Submission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/paper-payment" class="nav-link {{ $page === 'paper' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Paper Payment</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/peer-review" class="nav-link {{ $page === 'paper' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Peer Review</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link {{ $page === 'profile' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link {{ $page === 'type' ? 'active' : '' }}">
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
