<?php
ufa()->extCss([
    'role/role/edit'
]);
ufa()->extJs([
    '../lib/jquery-form-validator/jquery.form-validator',
    'role/role/edit'
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
                    <p class="top-title">角色添加</p>
                @else
                    <p class="top-title">角色编辑</p>
                @endif
            </div>

            <form class="form-horizontal" id="form" onsubmit="return false">
                <div class="form-group">
                    <label class="col-sm-2 control-label">角色名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$name or ''}}"
                               data-validation="required length"
                               data-validation-length="max255"
                               data-validation-error-msg="请输入账号"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">角色权限</label>
                    <div class="col-sm-10 category">
                        <div class="category-container">
                            <div class="category-item">
                                @foreach(($role_permissions ?? []) as $role_permission)
                                    <span>
                                        <input type="checkbox" id="category{{$role_permission['id']}}"
                                               name="permissions[]"
                                               value="{{$role_permission['id']}}"
                                               data-validation="checkbox_group" data-validation-qty="min1"
                                               data-validation-error-msg="请至少选择1项"
                                               @if(in_array($role_permission['id'],($permissions ?? []))) checked="checked" @endif/>
                                        <label for="category{{$role_permission['id']}}">{{$role_permission['name']}}</label>
                                </span>
                                @endforeach
                            </div>
                        </div>
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
