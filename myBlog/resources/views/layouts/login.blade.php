<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>用户登录界面</title>
    <link href="{{asset('sign/css/default.css')}}" rel="stylesheet" type="text/css" />
    <!--必要样式-->
    <link href="{{asset('sign/css/styles.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('sign/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('sign/css/loaders.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>

@yield('content')

<div class="OverWindows"></div>
<link href="{{asset('sign/layui/css/layui.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('sign/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('sign/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src='{{asset('sign/js/stopExecutionOnTimeout.js?t=1')}}'></script>
<script src="{{asset('sign/layui/layui.js')}}" type="text/javascript"></script>
<script src="{{asset('sign/js/Particleground.js')}}" type="text/javascript"></script>
<script src="{{asset('sign/js/Treatment.js')}}" type="text/javascript"></script>
<script src="{{asset('sign/js/jquery.mockjax.js')}}" type="text/javascript"></script>
@yield('js')


</body>
</html>
