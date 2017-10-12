<?php
$menus = [
    '系统管理' => [
        '用户管理' => [
            'role.user.index',
            'role.user.edit'
        ],
        '角色管理' => [
            'role.role.index',
            'role.role.edit'
        ]
    ],
    '文章管理' => [
        '文章列表' => [
            'article.index',
            'article.edit'
        ]
    ]
];

$url_name = request()->route()->getName();
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview  @if(in_array($url_name,$menus['系统管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>系统管理</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/permissions">
                            <i class="fa fa-circle-o"></i> 权限管理
                        </a>
                    </li>
                    <li @if(in_array($url_name,$menus['系统管理']['用户管理']) ) class="active" @endif>
                        <a href="{{route('role.user.index')}}">
                            <i class="fa fa-circle-o"></i> 用户管理
                        </a>
                    </li>
                    <li @if(in_array($url_name,$menus['系统管理']['角色管理']) ) class="active" @endif>
                        <a href="{{route('role.role.index')}}">
                            <i class="fa fa-circle-o"></i> 角色管理
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(in_array($url_name,$menus['文章管理']) ) active @endif">
                <a href="{{route('article.index')}}">
                    <i class="fa fa-dashboard"></i> <span>文章管理</span>
                </a>
                <ul class="treeview-menu">
                    <li @if(in_array($url_name,$menus['文章管理']['文章列表']) ) class="active" @endif>
                        <a href="{{route('article.index')}}">
                            <i class="fa fa-circle-o"></i> 文章列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="/admin/topics">
                    <i class="fa fa-dashboard"></i> <span>专题管理</span>
                </a>
            </li>
            <li class="active treeview">
                <a href="/admin/notices">
                    <i class="fa fa-dashboard"></i> <span>通知管理</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>