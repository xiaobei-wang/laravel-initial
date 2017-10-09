<?php
ufa()->extCss([
    'article/index'
]);
ufa()->extJs([
    'article/index',
]);
?>
@extends('layouts.master')
@section('master.content')

    <div class="wrapper-box">
        <div class="content-box">
            <div class="button-box">
                <a href="{{route('article.edit',['id'=> 0])}}" class="button add-btn">添加文章</a>
            </div>

            <div class="search-box">

                @if (count($errors) > 0)
                    <p class="error-alert">
                        @foreach ($errors->all() as $key => $error)
                            {{$key + 1}}、 {{ $error }}
                        @endforeach
                    </p>
                @endif

                <form method="GET" action="" id="">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label for="right-label">作者：</label>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <input type="text" name="" value="">
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label for="right-label">文章标题：</label>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <input type="text" name="keyword" value="{{$appends['keyword'] or ''}}"
                                       placeholder="请输入文章标题关键字"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns">
                            <input type="submit" class="btn btn-info" value="搜索"/>
                            <a href="{{route('article.index')}}" class="btn">重置</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-box">
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="5%">编号</th>
                        <th width="15%">作者</th>
                        <th width="40%">文章标题</th>
                        <th width="10%">评论数</th>
                        <th width="20%">发布时间</th>
                        <th width="10%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(($items ?? []) as $item)
                        <tr>
                            <th scope="row">{{$item['id'] or 0}}</th>
                            <td>{{$item[''] or ''}}</td>
                            <td>{{$item['title'] or ''}}</td>
                            <td>{{$item[''] or ''}}</td>
                            <td>{{$item['created_at'] or ''}}</td>
                            <td>
                                <a title="编辑" class="icon-edit"
                                   href="{{route('article.edit',['id'=>$item['id'] ?? 0])}}">
                                    <i class="iconfont">编辑</i>
                                </a>
                                <a title="删除" class="delete" data-id="{{$item['id']}}">
                                    <i class="iconfont">删除</i>
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