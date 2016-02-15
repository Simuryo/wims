<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BRTTH | Health Highway</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- CSS Declaration -->
    @include('layout.assets.css')
    <!-- /.CSS Declaration -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <!-- Header and Top navigation menu -->
      @include('layout.header')
      <!-- /.Header and Top navigation menu -->

      <!-- Left side column. contains the logo and sidebar -->
      @include('layout.sidebar-menu')
      <!-- /.Left side column. contains the logo and sidebar -->

      <!-- Content Wrapper. Contains page content -->
      @yield('content')
      <!-- /.Content Wrapper -->

      <!-- Footer -->
      @include('layout.footer')
      <!-- /.Footer -->

      <!-- Control Sidebar -->
      @include('layout.sidebar-ctrl')
      <!-- /.control-sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- JS Declaration -->
    @include('layout.assets.js')
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
    </script>
    @yield('script')
    <!-- JS Declaration -->
  </body>
</html>
