<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>laravel for blog</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    {{--<link rel="stylesheet" href="/css/app.css">--}}
    <link rel="stylesheet" href="/www/css/app.css">
    @include('resources.styles')
</head>
<body>
@include('layouts.header')
<div class="container">

    <div class="blog-header">
    </div>

    <div class="row">
        @yield("master.content")

        @include("layouts.sidebar")
    </div><!-- /.row -->
</div><!-- /.container -->
@include("layouts.footer")
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{--<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>--}}
{{--<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
<script src="/www/lib/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/www/js/app.js"></script>
@include('resources.scripts')
</body>
</html>