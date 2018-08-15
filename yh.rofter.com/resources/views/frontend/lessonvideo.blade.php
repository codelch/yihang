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

            <div class="row micro_info">
                <div class="col-sm-6 col-sm-offset-3 micro_info_des" style="text-align: center;">
                    <h5 class="micro_info_title">{{$url->detail_title}}</h5>
                </div>
                <div class="col-sm-8 col-sm-offset-2 micro_info_des">
                    <iframe src="{{$url->detail_url}}" style="height: 500px;width: 800px;"></iframe>
                </div>
            </div>
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
