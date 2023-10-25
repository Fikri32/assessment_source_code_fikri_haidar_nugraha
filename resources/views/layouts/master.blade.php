<!DOCTYPE html>
<html>

<head>
  <!-- Meta Tag and CSS -->
  @include('layouts.incl_top')
  <!-- End Meta Tag and CSS -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->

      @yield('content')

      <!-- End Main Content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.footer')
    <!-- End Footer -->


  </div>
  <!-- ./wrapper -->
  <!-- ScriptJS -->
  @include('layouts.incl_bottom')
  @stack('scripts')
  <!-- End ScriptJS -->
</body>

</html>