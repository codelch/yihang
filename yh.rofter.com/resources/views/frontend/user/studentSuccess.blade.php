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
                        <h3 class="title_blue">考生注册<span>亿航教育</span></h3>
                    </div>
                    <div class="row nopadding logon_progress"><!-- progress start -->
                        <div class="col-sm-4">
                            <div class="logon_progress_item ">
                                账号设置
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="logon_progress_item ">
                                完善信息
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="logon_progress_item current">
                                完成注册
                            </div>
                        </div>
                    </div> <!-- progress end -->
                    <div><!-- 注册成功 -->
    <div class="logon_form_container">
        <div class="modal-form-container logon_success_container">
            <h4>注册成功 !</h4>
            <div style="text-align:center;">
                <a class="btn btn-default btn-lg yhbtn" style="padding-left:20%;padding-right:20%;" href="{{url('studentCenter')}}">用户主页</a>
            </div>
        </div>
    </div>
</div><!-- 注册成功 -->                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
