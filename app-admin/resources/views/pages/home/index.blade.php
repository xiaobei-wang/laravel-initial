<?php
ufa()->extCss([
    'home/index'
]);
ufa()->extJs([
    'home/index',
]);
?>
@extends('layouts.master')
@section('master.content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                欢迎
            </div>
        </div>
    </section>
@endsection