<?php
ufa()->extCss([
    'role/user/edit'
]);
ufa()->extJs([
    '../lib/jquery-form-validator/jquery.form-validator',
    'role/user/edit',
]);
ufa()->addParam([
    'id' => $id ?? 0
]);
?>
@extends('layouts.master')
@section('master.content')
    <div class="wrapper-box">
        <div class="content-box">
            <div class="button-box">
                @if(empty($id))
                    <p class="top-title">用户添加</p>
                @else
                    <p class="top-title">用户编辑</p>
                @endif
            </div>

            <form class="form-horizontal" id="form" onsubmit="return false">
                <div class="form-group">
                    <label class="col-sm-2 control-label">账号</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="account" value="{{$account or ''}}"
                               data-validation="required length"
                               data-validation-length="max255"
                               data-validation-error-msg="请输入账号"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">公司名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="company_name" value="{{$company_name or ''}}"
                               data-validation="required length"
                               data-validation-length="max255"
                               data-validation-error-msg="请输入公司名称"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">职位</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="position" value="{{$position or ''}}"
                               data-validation="required length"
                               data-validation-length="max100"
                               data-validation-error-msg="请输入职位"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$name or ''}}"
                               data-validation="required length"
                               data-validation-length="max255"
                               data-validation-error-msg="请输入姓名"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">手机号</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" value="{{$phone or ''}}"
                               data-validation="required length"
                               data-validation-length="max50"
                               data-validation-error-msg="请输入手机号"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">邮箱</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{$email or ''}}"
                               data-validation="required length"
                               data-validation-length="max50"
                               data-validation-error-msg="请输入邮箱"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <input type="hidden" name="id" value="{{$id ?? 0}}">
                        <input type="submit" class="button btn-primary" value="保存">
                        <a class="button btn-danger" href="javascript:history.back()">取消</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    @include('common.success-pop')
    @include('common.loading-pop')
    @include('common.prompt-pop',['type'=>1])
@endsection
