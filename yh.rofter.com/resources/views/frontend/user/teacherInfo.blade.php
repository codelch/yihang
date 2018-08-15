@extends('layouts.frontend')

@section('title','考生注册 | 亿航教育')

@section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li><a href="{{url('teacher')}}">师资团队</a></li>
<li><a href="{{url('partner')}}">合作院校</a></li>
@endsection

@section('main')
<div class="page_content">    <div class="container-fluid" style="padding-bottom:55px;padding-top:55px;">
        <div class="container"><!-- 注册 -->
            <div class="logon_container">
                <div>
                    <div class="logon_title">
                        <h3 class="title_blue">师资注册<span>亿航教育</span></h3>
                    </div>
                    <div class="row nopadding logon_progress"><!-- progress start -->
                        <div class="col-sm-4">
                            <div class="logon_progress_item ">
                                账号设置
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="logon_progress_item current">
                                完善信息
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="logon_progress_item ">
                                完成注册
                            </div>
                        </div>
                    </div> <!-- progress end -->
                    <div id="info"> <!-- 完善信息 -->
    <form class="logon_form" name="" method="post" action="">
        <h4 class="title_with_blue_line"><span>个人信息登记</span></h4>
        <div class="logon_form_container">
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">姓名<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="uname" placeholder="姓名">
                </div>
                <font color="red" class="form-warning"></font>
            </div>
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">性别</p>
                <div class="input-group">
                    <input type="radio" name="gender" checked="" value="1">男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="info[gender]" value="2">女
                </div>
                <font color="red" class="form-warning"></font>
            </div>
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">微信账号<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="wechat" placeholder="微信账号">
                </div>
                <font color="red" class="form-warning"></font>
            </div>
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">QQ账号<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="qq" placeholder="QQ账号">
                </div>
                <font color="red" class="form-warning"></font>
            </div>
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">邮箱<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="email" placeholder="邮箱">
                </div>
                <font color="red" class="form-warning"></font>
            </div>
        </div>
        <h4 class="title_with_blue_line"><span>教育信息登记</span></h4>
        <div class="logon_form_container">
           <!--  <div class="form_input_container">
                <p class="form_text" style="color:#000;">邮箱<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="info[edu_email]" placeholder="邮箱">
                </div>
                <font color="red" class="form-warning"></font>
            </div> -->
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">就读学校<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="school" placeholder="就读学校">
                </div>
                <font color="red" class="form-warning"></font>
            </div>
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">就读专业<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="profession" placeholder="就读专业">
                </div>
                <font color="red" class="form-warning"></font>
            </div>
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">擅长专业课<span style="color:red">*</span></p>
                <div class="input-group">
                    <input type="text" class="form-control" name="subject" placeholder="科目代码+科目">
                </div>
                <font color="red" class="form-warning"></font>
            </div>
            <div class="form_input_container">
                <p class="form_text" style="color:#000;">研究生入学年份<span style="color:red">*</span></p>
                <div class="input-group">
                    <select name="year" class="form-control">
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
            </div>
            <div class="form_input_container">
                <div class="input-group">
                    {{csrf_field()}}
                    <input type="submit" value="保存" style="width:auto;display:block" class="btn btn-default btn-lg yhbtn">
                </div>
            </div>
        </div>
    </form>
</div>                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

                    $('#info').on('submit', 'form', function(){
                var $form = $(this), send_data = $form.serializeObject()
                $form.find('.form-warning').text('')

                $.ajax({
                    url : '{{url("doregister/teacher/info")}}',
                    data : send_data,
                    type : 'POST',
                    dataType : 'JSON',
                    beforeSend : function(){
                        var no_warning = true
                        if (! send_data['uname']) {
                            $('input[name="uname"]').formWarning('用户名不能为空!')
                            no_warning = false
                        }

                        if (! send_data['wechat']) {
                            $('input[name="wechat"]').formWarning('微信账号不能为空!')
                            no_warning = false
                        }

                        if (! send_data['qq']) {
                            $('input[name="qq"]').formWarning('QQ账号不能为空!')
                            no_warning = false
                        }

                        if (! send_data['email']) {
                            $('input[name="email"]').formWarning('邮箱不能为空!')
                            no_warning = false
                        }

                        // if (! send_data['info[edu_email]']) {
                        //     $('input[name="info[edu_email]"]').formWarning('邮箱不能为空!')
                        //     no_warning = false
                        // }

                        if (! send_data['school']) {
                            $('input[name="school"]').formWarning('就读学校不能为空!')
                            no_warning = false
                        }

                        if (! send_data['profession']) {
                            $('input[name="profession"]').formWarning('就读专业不能为空!')
                            no_warning = false
                        }

                        if (! send_data['subject']) {
                            $('input[name="subject"]').formWarning('擅长专业课不能为空!')
                            no_warning = false
                        }

                        return no_warning;
                    }
                }).done(function(data){
                    if(data.code == 200){
                        window.location.href = '{{url("register/teacher/success")}}'
                    } else {
                        $.alert({'title': '提示', 'content': data.msg})
                    }
                })

                return false;
            })


    </script>
@endsection
