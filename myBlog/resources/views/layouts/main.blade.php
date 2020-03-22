<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <title>个人博客</title>
    <meta name="keywords" content="个人博客模板" />
    <meta name="description" content="个人博客模板" />
    <link href="{{asset('blog/css/base.css')}}" rel="stylesheet">
    @yield('css')

    <link href="{{asset('blog/css/media.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]>
    <script src="{{asset('blog/js/modernizr.js')}}"></script>
    <![endif]-->
</head>
<body>
<div class="ibody">


    <header>
        <h1>随心而动</h1>
        <h2>任何事，任何人，都会成为过去，不要跟它过不去。放下，是为了更好地前行。</h2>
        <div class="logo"><a href="/"></a></div>
        <nav id="topnav">
            @foreach($banner as $k=>$v)
                <a href="{{$k}}">{{$v}}</a>
            @endforeach
        </nav>
    </header>
    @yield('content')

    @yield('aside')

    <script src="{{asset('blog/js/silder.js')}}"></script>

    <div class="clear"></div>
    <!-- 清除浮动 -->
</div>
<div style="text-align:center;">
    <p> </p>
</div>
</body>
</html>
