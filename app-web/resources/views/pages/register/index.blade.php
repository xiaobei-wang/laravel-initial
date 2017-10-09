<?php
ufa()->extCss([
    'register/index'
]);
ufa()->extJs([
    '../lib/jquery-form-validator/jquery.form-validator',
    'register/index',
]);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>注册</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/www/lib/bootstrap/css/bootstrap.min.css">
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
        <form onsubmit="return false" id="form">
            <div class="form-group">
                <label>账号</label>
                <input type="text" class="form-control" placeholder="请输入用户名" name="account"
                       data-validation="required length"
                       data-validation-length="max32"
                       data-validation-error-msg="请输入用户名"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="请输入Email" name="email"
                       data-validation="required email"
                       data-validation-error-msg="请输入Email"/>
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="password" class="form-control" name="password"
                       placeholder="请输入密码，6-12位，字母数字组合"
                       data-validation="custom"
                       data-validation-regexp="^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,12}$"
                       data-validation-error-msg="请输入密码，6-12位，字母数字组合"/>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary btn-lg btn-block">注册</button>
        </form>
    </div>
</div>
<script src="/www/lib/jQuery/jquery-2.2.3.min.js"></script>
@include('resources.scripts')
@include('common.success-pop')
@include('common.loading-pop')
@include('common.prompt-pop',['type'=>1])
</body>
</html>