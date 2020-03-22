@extends('layouts.login')
@section('content')

    <div class='login'>
        <div class='login_title'>
            <span>用户注册</span>
            <a href="/login" style="color:cornflowerblue;font-size: 12px">登录</a>
        </div>
        <div class='login_fields'>
            <form id="form">
                <div class='login_fields__user'>
                    <div class='icon'>
                        <img alt="" src="{{asset('sign/img/user_icon_copy.png')}}">
                    </div>
                    <input  name="name" placeholder='用户名' maxlength="16" type='text' autocomplete="off" value="" required />
                    <div class='validation'>
                        <img alt="" src="{{asset('sign/img/tick.png')}}">
                    </div>
                </div>

                <div class='login_fields__password'>
                    <div class='icon'>
                        <img alt="" src="{{asset('sign/img/email.png')}}" width="14px">
                    </div>
                    <input name="email" placeholder='邮箱'  type='email' autocomplete="off" required>
                    <div class='validation'>
                        <img alt="" src="{{asset('sign/img/tick.png')}}">
                    </div>
                </div>

                <div class='login_fields__password'>
                    <div class='icon'>
                        <img alt="" src="{{asset('sign/img/lock_icon_copy.png')}}">
                    </div>
                    <input name="password" placeholder='密码' maxlength="16" type='password' autocomplete="off" required>
                    <div class='validation'>
                        <img alt="" src="{{asset('sign/img/tick.png')}}">
                    </div>
                </div>

                <div class='login_fields__password'>
                    <div class='icon'>
                        <img alt="" src="{{asset('sign/img/lock_icon_copy.png')}}">
                    </div>
                    <input name="password_confirmation" placeholder='确认密码' maxlength="16" type='password' autocomplete="off" required>
                    <div class='validation'>
                        <img alt="" src="{{asset('sign/img/tick.png')}}">
                    </div>
                </div>

                <div class='login_fields__password'>
                    <div class='icon'>
                        <img alt="" src="{{asset('sign/img/key.png')}}">
                    </div>
                    <input id="captcha"  placeholder='验证码' name="captcha" maxlength="6" type='text' required>
                    <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                </div>

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class='login_fields__submit'>
                    <input type='button' value='注册'>
                </div>
            </form>

        </div>
        <div class='success'>
        </div>

    </div>
    <div class='authent'>
        <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
            <div class="loader-inner ball-clip-rotate-multiple">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <p>注册中...</p>
    </div>
@endsection
@section('js')
    <script>
        /**
         * Created by Administrator on 2020/1/12.
         */
        var canGetCookie = 0;//是否支持存储Cookie 0 不支持 1 支持
        var ajaxmockjax = 0;//是否启用虚拟Ajax的请求响 0 不启用  1 启用


        $(document).keypress(function (e) {
            // 回车键事件
            if (e.which == 13) {
                $('input[type="button"]').click();
            }
        });
        //粒子背景特效
        $('body').particleground({
            dotColor: '#E8DFE8',
            lineColor: '#133b88'
        });


        $('input[type="text"],input[type="password"],input[type="email"]').focus(function () {
            $(this).prev().animate({ 'opacity': '1' }, 200);
        });
        $('input[type="text"],input[type="password"],input[type="email"]').blur(function () {
            $(this).prev().animate({ 'opacity': '.5' }, 200);
        });
        $('input[name="login"],input[name="pwd"]').keyup(function () {
            var Len = $(this).val().length;
            if (!$(this).val() == '' && Len >= 5) {
                $(this).next().animate({
                    'opacity': '1',
                    'right': '30'
                }, 200);
            } else {
                $(this).next().animate({
                    'opacity': '0',
                    'right': '20'
                }, 200);
            }
        });
        var open = 0;
        layui.use('layer', function () {

            //非空验证
            $('input[type="button"]').click(function () {


                //认证中..
                fullscreen();
                $('.login').addClass('test'); //倾斜特效
                setTimeout(function () {
                    $('.login').addClass('testtwo'); //平移特效
                }, 300);
                setTimeout(function () {
                    $('.authent').show().animate({ right: -320 }, {
                        easing: 'easeOutQuint',
                        duration: 600,
                        queue: false
                    });
                    $('.authent').animate({ opacity: 1 }, {
                        duration: 200,
                        queue: false
                    }).addClass('visible');
                }, 500);

                //注册
                var JsonData = $('#form').serialize();
                //此处做为ajax内部判断
                var url = "/register";

                $.ajax({
                    type:'POST',
                    url:url,
                    dataType:'json',
                    data:JsonData,
                    success:function(data,sta){
                        if(data.status==0){
                            layer.msg('注册失败');
                            location.href = '/index';
                        }else{
                            layer.msg('注册失败');
                            $('.login').removeClass('test'); //倾斜特效
                            setTimeout(function () {
                                $('.login').removeClass('testtwo'); //平移特效
                            }, 300);
                            setTimeout(function () {
                                $('.authent').hide().animate({ right: -320 }, {
                                    easing: 'easeOutQuint',
                                    duration: 600,
                                    queue: false
                                });
                                $('.authent').hide({ opacity: 1 }, {
                                    duration: 200,
                                    queue: false
                                }).addClass('visible');
                            }, 500);
                        }
                    },
                    error:function(data){
                        console.log(data)
                    }
                });

            });
        });
        var fullscreen = function () {
            elem = document.body;
            if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.requestFullScreen) {
                elem.requestFullscreen();
            } else {
                //浏览器不支持全屏API或已被禁用
            }
        }
    </script>
@endsection