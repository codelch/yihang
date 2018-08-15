<header class="header">
    <div class="container">
        <div class="logo"><a href="{{asset('/')}}"><img src="{{asset('static/frontend/images')}}/logo.png" alt="亿航教育"></a></div>
        @if(session()->get('userid'))
        <div class="header_nav">
            <div class="header_nav">
                <a href="{{url('checkType')}}" class="people_avatar">
                     @if(session()->get('image'))
                    <img src="{{asset('upload')}}/{{session()->get('image')}}" />
                     @else
                     <img src="{{asset('static\frontend\images')}}/default_avatar.jpg" />
                    @endif
                </a>你好
                <a href="{{url('checkType')}}" class="header_nomarl_a">{{session()->get('username')}}</a>，
                <a href="javascript:void(0);" class="header_nomarl_a" onclick="logout.submit();">
                    <form action="{{url('logout')}}" method="post" name="logout">
                        {{csrf_field()}}
                        退出
                    </form>
                </a>
            </div>
        </div>
        @else
        <div class="header_nav">
            <a href="javascritp:void(0);" data-toggle="modal" data-target="#login_modal">登录</a>
            <a href="javascritp:void(0);" data-toggle="modal" data-target="#logon_modal">注册</a>
        </div>
        @endif
        <!-- login modal -->
        <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="logintitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="logintitle"><div style="padding:15px;"><img src="{{asset('static/frontend/images')}}/logo.png" alt="亿航教育"></div></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="modal-form-container">
                                    <form method="post" action="">
                                        <div>
                                            <p style="color:#000;">登陆</p>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="phone" placeholder="手机号">
                                            </div>
                                            <font color="red" class="form-warning"></font>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" placeholder="密码">
                                            </div>
                                            <font color="red" class="form-warning"></font>
                                            <div class="input-group">
                                                <input type="checkbox" name="remeber">记住密码
                                            </div>
                                            <div class="input-group" style="text-align:center">
                                                {{csrf_field()}}
                                                <input type="submit" value="登录" class="btn btn-default btn-lg yhbtn">
                                            </div>
                                            <p style="padding:5px;color:#000;text-align:center;">还没有账号？注册为<a href="{{url('register/teacher/account')}}">研究生</a>，<a href="{{url('register/student/account')}}">考生</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end -->
        <!-- logon modal -->
        <div class="modal fade" id="logon_modal" tabindex="-1" role="dialog" aria-labelledby="logontitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="logontitle"><div style="padding:15px;"><img src="{{asset('static/frontend/images')}}/logo.png" alt="亿航教育"></div></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row logon_choose">
                            <div class="col-sm-6">
                                <a href="{{url('register/teacher/account')}}">研究生</a>
                            </div>
                            <div class="col-sm-6">
                                <a style="background-color:#0b8ec7;color:#fff;" href="{{url('register/student/account')}}">考生</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end -->
    </div>
    <!-- page nav -->
    <div class="main_nav">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @yield('nav')
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end nav -->
</header>
