<div class="blog-masthead">
    <div class="container">
        <form method="GET">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="blog-nav-item " href="/">首页</a>
                </li>
                <li>
                    <a class="blog-nav-item" href="{{route('article.edit',['id'=> 0])}}">写文章</a>
                </li>
                <li>
                    <a class="blog-nav-item" href="/notices">通知</a>
                </li>
                <li>
                    <input name="keyword" type="text" value="{{$appends['keyword'] or ''}}" class="form-control"
                           style="margin-top:10px"
                           placeholder="搜索词">
                </li>
                <li>
                    <button class="btn btn-default" style="margin-top:10px" type="submit">Go!</button>
                </li>
            </ul>
        </form>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a class="blog-nav-item " href="{{route('register')}}">注册</a>
            </li>
            <li class="dropdown">
                <div>
                    <img src="" alt="" class="img-rounded" style="border-radius:500px; height: 30px">
                    <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Kassandra Ankunding2 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/user/5">我的主页</a></li>
                        <li><a href="/user/5/setting">个人设置</a></li>
                        <li><a href="{{route('api.logout')}}">登出</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>