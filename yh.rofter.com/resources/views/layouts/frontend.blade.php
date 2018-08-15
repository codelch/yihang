<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="VtNQ1CaGFFmeXBKupWITC9w9RdjBAZwzzaGg9twL">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{asset('static/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- mCustomScrollbar -->
    <link href="{{asset('static/frontend/css/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">
    <!-- jQConfirm -->
    <link href="{{asset('static/frontend/css/jquery-confirm.css')}}" rel="stylesheet">

    <link href="{{asset('static/frontend/css/style.css')}}" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="{{asset('static/frontend/js')}}/jquery.min.js"></script> -->
<script src="{{asset('static/frontend/js')}}/jquery-3.3.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('static/bootstrap/js')}}/bootstrap.min.js"></script>
<script src="{{asset('static/frontend/js')}}/jquery.krakatoa.min.js"></script>
<script src="{{asset('static/frontend/js')}}/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- image upload -->
<script src="{{asset('static/frontend/js')}}/jquery.ui.widget.js"></script>
<script src="{{asset('static/frontend/js')}}/jquery.iframe-transport.js"></script>
<script src="{{asset('static/frontend/js')}}/jquery.fileupload.js"></script>

<!-- jQConfirm -->
<script src="{{asset('static/frontend/js')}}/jquery-confirm.js"></script>

<script src="{{asset('static/frontend/js')}}/default.js"></script>

    @yield('css')
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://yh.rofter.com/static/frontend/js/html5shiv.min.js"></script>
    <script src="http://yh.rofter.com/static/frontend/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('public.header_frontend')

@yield('main')

@include('public.footer_frontend')


<script type="text/javascript">
    // 登陆
$('#login_modal').on('submit', 'form', function() {
    var $form = $(this),
        send_data = $form.serializeObject()
    $form.find('.form-warning').text('')
    var modal = $('#login_modal')

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
        url: '{{url("login")}}',
        data: send_data,
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
            if (!send_data['phone']) {
                $('input[name="phone"]').formWarning('手机号必须!')
                return false
            }

            if (!send_data['password']) {
                $('input[name="password"]').formWarning('密码必须!')
                return false
            }

            return true

        }
    }).done(function(data) {
    if (data.code == 200) {
        modal.modal('hide')
        window.location.reload()
    } else {
        $('input[name="phone"]').formWarning(data.msg)
    }
})
    return false;
})
</script>

@yield('js')
</body></html>
