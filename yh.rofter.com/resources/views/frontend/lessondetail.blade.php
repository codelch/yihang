@extends('layouts.frontend')@section('title','亿航微课 | 亿航教育') @section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li class="active"><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li><a href="{{url('teacher')}}">师资团队</a></li>
<li><a href="{{url('partner')}}">合作院校</a></li>
@endsection @section('main')
<div class="page_content">
    <div class="container-fluid" style="padding-bottom:55px;padding-top:55px;">
        <!-- Vedio modal -->
        <div class="modal fade vedio_modal" id="vedio_modal" tabindex="-1" role="dialog" aria-labelledby="logintitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <iframe frameborder="0" width="100%" height="auto" src="" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end -->
        <div class="container">
            <!-- class info -->
            <div class="row micro_info">
                <div class="col-sm-6 micro_info_img">
                    <img src="{{asset('upload')}}/{{$lesson->image}}" alt="课程缩略图" />
                </div>
                <div class="col-sm-6 micro_info_des">
                    <h5 class="micro_info_title">{{$lesson->name}}</h5>
                    <div class="micro_info_meta"><span style="border-left:none;padding-left:0px;">最近在学 {{$lesson->studied}} 人</span><span>累计报名 {{$lesson->sign}} 人</span><span>好评度 {{$lesson->praise}}%</span><a href="#">分享</a><a href="#">收藏</a></div>
                    <div class="micro_info_price">课程价格: <span style="color:red;">{{$lesson->price}}元</span></div>
                    <p class="micro_info_p">{{$lesson->description}}</p>
                    <p class="micro_info_p">适用人群
                        <br />{{$lesson->match}}</p>
                    <div class="micro_info_button"><a class="btn btn-default btn-lg yhbtn" href="javascript:;" data-toggle="modal" data-target="#imgModal">立即报名</a><a data-toggle="modal" data-target="#imgModal" class="btn btn-default btn-lg yhbtn" href="javascript:;">免费咨询</a></div>
                </div>
            </div>
            <!-- end class info -->
            <!-- class list -->
            <ul class="micro_list">
                @foreach($url as $k => $v)
                <li class="micro_list_item">
                    <span>{{$k}}</span>
                    <div class="micro_item_name">
                        <a href="{{url('microlesson/video',['id'=>$v->id])}}">
                                {{$v->detail_title}}
                            </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 20%">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0px;">
                    <img src="{{asset('static')}}/frontend/images/wx.png" alt="" style="width:100%;">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
@endsection
