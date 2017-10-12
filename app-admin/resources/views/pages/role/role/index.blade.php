<?php
ufa()->extCss([
    'role/role/index'
]);
ufa()->extJs([
    'role/role/index',
]);
?>
@extends('layouts.master')
@section('master.content')

    <div class="wrapper-box">
        <div class="content-box">
            <div class="button-box">
                <div class="add">
                    <a href="{{route('role.role.edit',['id'=>0])}}" class="button add-btn">添加角色</a>
                </div>
            </div>

            <div class="search-box">

                @if (count($errors) > 0)
                    <p class="error-alert">
                        @foreach ($errors->all() as $key => $error)
                            {{$key + 1}}、 {{ $error }}
                        @endforeach
                    </p>
                @endif

                <form method="GET">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label for="right-label">关键字：</label>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <input type="text" name="keyword" value="{{$appends['keyword'] or ''}}"
                                       placeholder="请输入角色名称"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns">
                            <input type="submit" class="btn" value="搜索"/>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-box">
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="5%">编号</th>
                        <th width="10%">角色名称</th>
                        <th width="10%">角色权限</th>
                        <th width="10%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(($items ?? []) as $item)
                        <tr>
                            <th scope="row">{{$item['id'] or 0}}</th>
                            <td>{{$item['name'] or ''}}</td>
                            <td>{{$item['permission_names'] or ''}}</td>
                            <td>
                                <a title="编辑" class="icon-edit"
                                   href="{{route('role.role.edit',['id'=>$item['id'] ?? 0])}}">
                                    <i class="iconfont">编辑</i>
                                </a>
                                <a title="删除" class="delete" data-id="{{$item['id']}}">
                                    <i class="iconfont">删除</i>
                                </a>
                                <a title="密码重置" class="icon-edit"
                                   href="{{route('role.user.set-password',['id'=>$item['id'] ?? 0])}}">
                                    <i class="iconfont">密码重置</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    @include('common.prompt-pop',['type'=>1])
    @include('common.confirm-pop' ,['type' => 2,'confirm_text' => ""])
@endsection