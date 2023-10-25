<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">

        <span class="brand-text font-weight-light">Transaction Report</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('report.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-ul"></i>
                        <p>
                            Report Page
                        </p>
                    </a>
                </li>
                <li class="nav-header">Data</li>
                <li class="nav-item">
                    <a href="{{route('merchants.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>
                            Merchant
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('outlets.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-map-pin"></i>
                        <p>
                            Outlet
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('customers.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('staff.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Staff
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('transactions.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-bar-chart"></i>
                        <p>
                            Transaction
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>