<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>亿航教育 | 登录</title>
    <link href="{{asset('static/admin/css')}}/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('static/admin/css')}}/font-awesome.css" rel="stylesheet">
    <link href="{{asset('static/admin/css')}}/animate.css" rel="stylesheet">
    <link href="{{asset('static/admin/css')}}/style.css" rel="stylesheet">
</head>

<body style="background-color: #f3f3f4;">
    <div style="text-align: center">
        <h1 class="logo-name">亿航教育+</h1>
    </div>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>登录</h3>
            <form class="m-t" action="{{url('admin/login')}}" method="post">
                <div class="form-group">
                    <input type="text" name="user" class="form-control" placeholder="手机号" required="">
                    <font color="red" class="form-warning">
                    {{session()->get('message')}}
                    </font>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码" required="">
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="javascript:void(0);"><small>忘记密码?</small></a>
            </form>
            <p class="m-t"> <small>亿航教育 &copy; 2018</small> </p>
        </div>
    </div>
    <script src="{{asset('static/admin/js')}}/jquery-3.3.1.min.js"></script>
    <script src="{{asset('static/admin/js')}}/bootstrap.min.js"></script>
</body>

</html>
