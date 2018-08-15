@extends('layouts.frontend') @section('title','考生注册 | 亿航教育') @section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li><a href="{{url('teacher')}}">师资团队</a></li>
<li><a href="{{url('partner')}}">合作院校</a></li>
@endsection @section('main')
<div class="page_content">
    <div class="container-fluid" style="padding-bottom:55px;padding-top:55px;">
        <div class="container">
            <!-- 注册 -->
            <div class="logon_container">
                <div>
                    <div class="logon_title">
                        <h3 class="title_blue">师资注册<span>亿航教育</span></h3>
                    </div>
                    <div class="row nopadding logon_progress">
                        <!-- progress start -->
                        <div class="col-sm-4">
                            <div class="logon_progress_item current">
                                账号设置
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="logon_progress_item ">
                                完善信息
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="logon_progress_item ">
                                完成注册
                            </div>
                        </div>
                    </div>
                    <!-- progress end -->
                    <div id="account">
                        <!-- 账号设置 -->
                        <div class="logon_form_container">
                            <form class="logon_form" name="account[form]" method="post" action="javascript:void(0)">
                                <div class="form_input_container">
                                    <p class="form_text" style="color:#000;">用户名<span style="color:red">*</span></p>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="user" placeholder="用户名">
                                    </div>
                                    <font color="red" class="form-warning"></font>
                                </div>
                                <div class="form_input_container">
                                    <p class="form_text" style="color:#000;">手机号码<span style="color:red">*</span></p>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="手机号码">
                                    </div>
                                    <font color="red" class="form-warning"></font>
                                </div>
                                <div class="form_input_container">
                                    <p class="form_text" style="color:#000;">验证码<span style="color:red">*</span></p>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="code" placeholder="验证码">
                                        <span class="input-group-btn" id="send-code">
                      <a class="btn btn-default" href="javascript:void(0)" >获取验证码</a>
                    </span>
                                    </div>
                                    <font color="red" class="form-warning"></font>
                                </div>
                                <div class="form_input_container">
                                    <p class="form_text" style="color:#000;">密码<span style="color:red">*</span></p>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="密码">
                                    </div>
                                    <font color="red" class="form-warning"></font>
                                </div>
                                <div class="form_input_container">
                                    <p class="form_text" style="color:#000;">确认密码<span style="color:red">*</span></p>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="repassword" placeholder="密码">
                                    </div>
                                    <font color="red" class="form-warning"></font>
                                </div>
                                <div class="form_input_container">
                                    <div class="input-group">
                                        {{csrf_field()}}
                                        <input type="submit" value="注册" class="btn btn-default btn-lg yhbtn" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- 账号设置 -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('js')
<script>
$('#account').on('submit', 'form', function() {
    var $form = $(this),
        send_data = $form.serializeObject()
    $form.find('.form-warning').text('')

    $.ajax({
        url: '{{url("doregister/teacher/account")}}',
        data: send_data,
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
            var no_warning = true
            if (!send_data['user']) {
                $('input[name="user"]').formWarning('用户名不能为空!')
                no_warning = false;
            }

            if (!send_data['phone']) {
                $('input[name="phone"]').formWarning('手机号码不能为空!')
                no_warning = false;
            }

            if (send_data['password'] != send_data['repassword']) {
                $('input[name="password"]').formWarning('两次密码不一致!')
                no_warning = false;
            }

            if (!send_data['password']) {
                $('input[name="password"]').formWarning('密码不能为空!')
                no_warning = false;
            }

            if (!send_data['repassword']) {
                $('input[name="repassword"]').formWarning('确认密码不能为空!')
                no_warning = false;
            }

            if (!send_data['code']) {
                $('input[name="code"]').formWarning('验证码不能为空!')
                no_warning = false;
            }

            return no_warning

        }
    }).done(function(data) {
        if (data.code == 200) {
            window.location.href = '{{url("register/teacher/info")}}'
        } else {
            $.alert({ 'title': '提示', 'content': data.msg })
        }
    })

    return false;
})

$('#send-code').on('click', function() {
    var phone = $('#phone').val()
    console.log(phone)
    $('input[name="phone"]').formWarning('')
    $.ajax({
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        'url': '{{url("register/code")}}',
        'data': 'phone='+ phone ,
        'type': 'POST',
        'dataType': 'JSON',
        'beforeSend': function() {
            if (!/^(\d){11}$/.test(phone)) {
                $('input[name="phone"]').formWarning('手机号不正确!')
                return false
            }

            return true
        }
    }).done(function(data) {
        $.alert({ 'title': '提示', 'content': data.msg })
    })
})
</script>
@endsection
