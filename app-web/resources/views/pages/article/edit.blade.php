<?php
ufa()->extCss([
    '../lib/wangEditor/css/wangEditor.min',
    'article/edit'
]);
ufa()->extJs([
    '../lib/jquery-form-validator/jquery.form-validator',
    '../lib/wangEditor/js/wangEditor.min',
    'article/edit',
]);
ufa()->addParam([
    'id' => $id ?? 0
]);
?>
@extends('layouts.master')
@section('master.content')
    <div class="col-sm-8 blog-main">
        <form onsubmit="return false" id="form">
            {{csrf_field()}}
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="请输入标题" value="{{$title or ''}}"
                       data-validation="required length"
                       data-validation-length="max255"
                       data-validation-error-msg="请输入标题"/>
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea id="content" name="content" class="form-control" style="height:400px;"
                          placeholder="请输入内容"
                          data-validation="required"
                          data-validation-error-msg="请输入内容">{!! $content or '' !!}</textarea>
            </div>
            <input type="hidden" name="id" value="{{$id ?? 0}}">
            <input type="submit" class="btn btn-default" value="提交"/>
        </form>
        <br>
        @include('layouts.error ')
    </div><!-- /.blog-main -->
    @include('common.success-pop')
    @include('common.loading-pop')
    @include('common.prompt-pop',['type'=>1])
@endsection