<?php
ufa()->extCss([
    'notice/edit'
]);
ufa()->extJs([
    '../lib/jquery-form-validator/jquery.form-validator',
    'notice/edit'
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
                    <p class="top-title">通知添加</p>
                @else
                    <p class="top-title">通知编辑</p>
                @endif
            </div>

            <form class="form-horizontal" id="form" onsubmit="return false">
                <div class="form-group">
                    <label class="col-sm-2 control-label">发送者</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="请输入发送者" value="{{$from or ''}}"
                               name="from"
                               data-validation="required length"
                               data-validation-length="max50"
                               data-validation-error-msg="请输入发送者"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="请输入标题" value="{{$title or ''}}"
                               name="title"
                               data-validation="required length"
                               data-validation-length="max50"
                               data-validation-error-msg="请输入标题"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">内容</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="请输入内容" value="{{$content or ''}}"
                               name="content"
                               data-validation="required"
                               data-validation-error-msg="请输入内容"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">链接</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="请输入链接" value="{{$link or ''}}"
                               name="link"
                               data-validation="required length"
                               data-validation-length="max255"
                               data-validation-error-msg="请输入链接"/>
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