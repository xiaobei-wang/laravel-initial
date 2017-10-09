<?php
ufa()->extCss([
    'article/detail'
]);
ufa()->extJs([
    'article/detail'
]);
?>
@extends('layouts.master')
@section('master.content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <div style="display:inline-flex">
                <h2 class="blog-post-title">{{$title or ''}}</h2>
                <a style="margin: auto" href="{{route('article.edit',['id'=>$id])}}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <a data-id="{{$id ?? 0}}" class="delete">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </div>

            <p class="blog-post-meta">{{$item['created_at'] or ''}} by <a href="#">Kassandra
                    Ankunding2</a>
            </p>
            <p>{!! $content or '' !!}</p>

            <br>
            <div>
                <a href="/posts/62/zan" type="button" class="btn btn-primary btn-lg">赞</a>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">评论</div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">
                    <h5>2017-05-28 10:15:08 by Kassandra Ankunding2</h5>
                    <div>
                        这是第一个评论这是第一个评论这是第一个评论这是第一个评论这是第一个评论这是第一个评论这是第一个评论这是第一个评论这是第一个评论
                    </div>
                </li>
            </ul>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">发表评论</div>

            <!-- List group -->
            <ul class="list-group">
                {{csrf_field()}}
                <input type="hidden" name="post_id" value="62"/>
                <li class="list-group-item">
                    <textarea name="content" class="form-control" rows="10"></textarea>
                    <button class="btn btn-default" type="submit">提交</button>
                </li>
                </form>

            </ul>
        </div>
    </div><!-- /.blog-main -->
    @include('common.prompt-pop',['type'=>1])
    @include('common.confirm-pop' ,['type' => 2,'confirm_text' => ""])
@endsection