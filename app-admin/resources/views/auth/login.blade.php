<?php
ufa()->extCss([
    'auth/login'
]);
ufa()->extJs([
    '../lib/jquery-form-validator/jquery.form-validator',
    'auth/login',
]);
?>
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
    <!-- Theme style -->
    <link rel="stylesheet" href="/www/adminlte/dist/css/AdminLTE.min.css">
    @include('resources.styles')
</head>
<body>
<div class="login-box">
    @if (count($errors) > 0)
        <p class="error-alert">
            @foreach ($errors->all() as $key => $error)
                {{$key + 1}}、 {{ $error }}
            @endforeach
        </p>
    @endif
    <div class="login-box-body">
        <form id="form" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="帐号"
                       value="{{old('name')}}"
                       data-validation="required length"
                       data-validation-length="max20"
                       data-validation-error-msg="请输入帐号"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="密码"
                       value=""
                       data-validation="required length"
                       data-validation-length="20"
                       data-validation-error-msg="请输入密码"/>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary btn-block">登录</button>
        </form>
    </div>
</div>
<script src="/www/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
@include('resources.scripts')
</body>
</html>
