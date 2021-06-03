
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
        <img src="{{ asset('dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-1">
            @role('superadmin')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @permission('dashboard-read')
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    لوحة التحكم
                                </p>
                            </a>
                        </li>
                    @endpermission

                    @permission('orders-read')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    الطلبات
                                    <i class="fas fa-angle-left left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('orders.index') }}?type=deactive" class="nav-link">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>الطلبات الجديدة</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orders.index') }}?type=done" class="nav-link">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>الطلبات المكتملة</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endpermission

                    @permission('dealers-read')
                        <li class="nav-item">
                            <a href="{{ route('dealers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    التجار
                                </p>
                            </a>
                        </li>
                    @endpermission

                    @permission('halls-read')
                        <li class="nav-item">
                            <a href="{{ route('halls.index') }}?type=1" class="nav-link ">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    الفنادق
                                </p>
                            </a>
                        </li>
                    @endpermission

                    @permission('halls-read')
                        <li class="nav-item">
                            <a href="{{ route('halls.index') }}?type=2" class="nav-link ">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    الصالات
                                </p>
                            </a>
                        </li>
                    @endpermission

                    @permission('users-read')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    @lang('global.users')
                                </p>
                            </a>
                        </li>
                    @endpermission
                </ul>
            @endrole
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>