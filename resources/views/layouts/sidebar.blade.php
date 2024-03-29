<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fab fa-discourse"></i>
                        <p>
                            Khoa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách khoa </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add-course') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Khoa </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-book-open"></i>
                        <p>
                            Môn học
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subjects') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách môn học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add-subjects') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm môn học</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-user-graduate"></i>
                        <p>
                            Sinh Viên
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sinh viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add-students') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm sinh viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-poll-h"></i>
                        <p>
                            Kết quả
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('results') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách kết quả</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add-results') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm kết quả</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="" aria-labelledby="">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>