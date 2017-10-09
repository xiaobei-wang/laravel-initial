<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! $meta_title or '管理系统' !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/www/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome --cdn网络字体-- -->
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="/www/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. --模本样式-- -->
    <link rel="stylesheet" href="/www/adminlte/dist/css/skins/_all-skins.min.css">
    @include('resources.styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@section('master.header')
    @include("layouts.header")
@show
<!-- Left side column. contains the logo and sidebar -->
@section('master.main')
    @include("layouts.sidebar")
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('master.content')
        <!-- /.content -->
        </div>
@show
<!-- /.content-wrapper -->
@section('master.footer')
    @include("layouts.footer")
@endsection
<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/www/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/www/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/www/adminlte/dist/js/app.min.js"></script>
@include('resources.scripts')
</body>
</html>