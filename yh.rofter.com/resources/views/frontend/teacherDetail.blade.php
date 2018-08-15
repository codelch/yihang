@extends('layouts.frontend') @section('title','主页 | 亿航教育') @section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li><a href="{{url('teacher')}}">师资团队</a></li>
<li><a href="{{url('partner')}}">合作院校</a></li>
@endsection @section('main')
<!-- main content and ending tag in footer -->
<div class="page_content">
    <!-- slier or banner -->
    <div class="page_slider">
    </div>
    <!-- end -->
    <!-- index slider bottom -->
    <div class="slider_bottom">
    </div>
    <!-- end -->
    <div class="container-fluid" style="padding-bottom:55px;padding-top:30px;">
        <div class="container">
            <!-- account info -->
            <div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="account_thumb">

                                     @if($teacher->image)
                                    <img src="{{asset('upload')}}/{{$teacher->image}}" />
                                     @else
                                     <img src="{{asset('static\frontend\images')}}/default_avatar.jpg" />
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7" style="padding-left:10px;padding-right:0px;">
                                <h5 class="account_name">{{$teacher->name}}</h5>
                                <div class="account_state">
                                    <table class="table">
                                        <tr>
                                            <td>专业：</td>
                                            <td>{{$teacher->profession}}</td>
                                        </tr>
                                        <tr>
                                            <td>成绩：</td>
                                            <td>{{$teacher->score}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end account info -->
        <div class="container" style="margin:0px auto;">
            <div style="border-top:1px solid #999;width:100%;margin-bottom:15px;"></div>
        </div>
        <!-- line -->
        <div class="container">
            <div>
                <h4 class="classes_title">教师详情</h4>
                <div class="row classes_items_container">
                    <div class="col-sm-8 col-sm-offset-2">
                        <p>{{nl2br($teacher->description)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
