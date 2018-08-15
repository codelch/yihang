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

                                     @if($user->image)
                                    <img src="{{asset('upload')}}/{{$user->image}}" />
                                     @else
                                     <img src="{{asset('static\frontend\images')}}/default_avatar.jpg" />
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7" style="padding-left:10px;padding-right:0px;">
                                <h5 class="account_name">{{$user->uname}}</h5>
                                <div class="account_state">
                                    <table class="table">
                                        <tr>
                                            <td>目标院校：{{$user->targetschool}}</td>
                                            <td rowspan="2" style="text-align:center;width:30px;font-size:13px;"><a href="javascritp:void(0);" data-toggle="modal" data-target="#edit_modal" style="font-size:12px;">编辑</a></td>
                                        </tr>
                                        <tr>
                                            <td>目标专业：{{$user->targetprofession}}</td>
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
            <!-- 课程信息 -->
            <div>
                <h4 class="classes_title">课程信息</h4>
                <div class="row classes_items_container">
                    <div class="col-sm-12">
                        <div class="table-responsive account_table">

                            <table width="100%" class="table">
                                <tr>
                                    <td class="td_color">老师(课程名称)</td>
                                    <td class="td_color">上课时间</td>
                                    <td class="td_color" width="30%">上课内容</td>
                                    <td class="td_color">状态</td>
                                </tr>
                                @if(empty($subject))
                                <tr>
                                    <td colspan="4">暂无结果!</td>
                                </tr>
                                @else
                                @foreach($subject as $k=>$v)
                                @foreach($v['detail'] as $k1=>$v1)
                                <tr>
                                    @if($k1 == 0)
                                    <td rowspan="{{count($v['detail'])}}">{{$v['uname']}}
                                        <br/>({{$v['name']}})</td>
                                    @endif
                                    <td>{{$v1['date']}}</td>
                                    <td>{{$v1['content']}}</td>
                                    <td>
                                        @if($v1['status']==1)
                                        <a class="button a-confirm change-detail-status" data-id="{{$v1['detailid']}}" href="javascript:void(0);">待确认</a>
                                        @elseif($v1['status']==2)
                                        <span class="button sended">已确认</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endif
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end 课程信息 -->
        <div class="container" id="add-subject">
            <!-- 新课程请求 -->
            <div>
                <h4 class="classes_title">新课程</h4>
                <div class="row add_new_class">
                    <form method="post" action="">
                        <div class="col-sm-3">
                            <span>教师姓名：</span>
                            <div class="input-group">
                                <input type="text" class="form-control" name="subject[teacher_name]" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <span>教师账号：</span>
                            <div class="input-group">
                                <input type="text" class="form-control" name="subject[teacher]" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <span>课程名称：</span>
                            <div class="input-group">
                                <input type="text" class="form-control" name="subject[name]" />
                            </div>
                        </div>
                        <div class="col-sm-3" style="text-align:center">
                            <div class="input-group" style="display:inline-block">
                                {{csrf_field()}}
                                <input type="submit" value="添加课程" class="btn btn-default btn-lg" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end 新课程请求 -->
    </div>
    <!-- edit modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="logintitle">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="logontitle">编辑信息</h4>
                </div>
                <div class="modal-body" style="padding-bottom: 45px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="modal-form-container">
                                <form method="post" action="">
                                    <div>
                                        <p class="usercenter-label">头像</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="avatar" value="{{asset('upload')}}/{{$user->image}}" placeholder="图片">
                                            <span class="input-group-btn">
                                                <a class="btn-danger fileinput-button btn pull-right" href="javascript:;" role="button">
                                                    <span>修改头像</span>
                                            <input type="file" name="file">
                                            </a>
                                            </span>
                                        </div>
                                        <font color="red" class="form-warning"></font>
                                        <p class="usercenter-label">目标院校</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="targetschool" value="{{$user->targetschool}}">
                                        </div>
                                        <font color="red" class="form-warning"></font>
                                        <p class="usercenter-label">目标专业</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="targetprofession" value="{{$user->targetprofession}}">
                                        </div>
                                        <font color="red" class="form-warning"></font>
                                        <div class="input-group" style="text-align:center;padding-top:15px;">
                                            {{csrf_field()}}
                                            <input type="submit" value="保存" class="btn btn-default btn-lg yhbtn" />

                                        </div>
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
</div>
@endsection @section('js')
<script>
$(function() {
   $('.fileinput-button').fileupload({
         headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        dataType: 'json',
        autoUpload: true //自动上传
            ,
        maxNumberOfFiles: 2,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        url: '{{url("usercenter/upload/avatar")}}',
        previewMaxWidth: 600,
        dropZone: false,
        previewMaxHeight: 0,
        imageCrop: true,
        formData: {}
    }).on('fileuploaddone', function(e, data) {
        if (data.result.code == 200) {
            $(this).parents('.input-group').find('input[type="text"]').val('{{asset("upload")}}'+data.result.msg);
            $.alert({ 'title': '提示', 'content': '头像上传成功' })
        } else {
            $.alert({ 'title': '提示', 'content': data.result.msg })
        }
    })
})

$('#edit_modal').on('submit', 'form', function() {
    var $form = $(this),
        send_data = $form.serializeObject()
    $form.find('.form-warning').text('')

    $.ajax({
        url: '{{url("usercenter/edit")}}',
        data: send_data,
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
            var no_warning = true
            if (!send_data['avatar']) {
                $('input[name="avatar"]').formWarning('头像不能为空!')
                no_warning = false;
            }

            if (!send_data['targetschool']) {
                $('input[name="targetschool"]').formWarning('学校不能为空!')
                no_warning = false;
            }

            if (!send_data['targetprofession']) {
                $('input[name="targetprofession"]').formWarning('专业不能为空!')
                no_warning = false;
            }

            return no_warning

        }
    }).done(function(data) {
        if (data.code == 200) {
            $('.account_thumb img').attr('src', send_data['avatar']);
            window.location.reload()
        } else {
            $.alert({ 'title': '提示', 'content': data.msg })
        }
        // console.log(data);
    })

    return false;
})


$("#add-subject-detail").on("show.bs.modal", function(e) {
    $('#add-subject-detail input[name="subject_detail[subject_id]"]').val($(e.relatedTarget).data('subject-id'))
})

$('#add-subject-detail').on('submit', 'form', function() {
    var $form = $(this),
        send_data = $form.serializeObject()
    $form.find('.form-warning').text('')

    $.ajax({
        'url': '{{url("teacher/add-subject-detail")}}',
        'data': send_data,
        'type': 'POST',
        'dataType': 'JSON',
        'beforeSend': function() {
            var no_warning = true
            if (!send_data['subject_detail[date]']) {
                $('input[name="subject_detail[date]"]').formWarning('时间不能为空!')
                no_warning = false;
            }

            if (!send_data['subject_detail[content]']) {
                $('input[name="subject_detail[content]"]').formWarning('内容不能为空!')
                no_warning = false;
            }

            return no_warning

        }
    }).done(function(data) {
        if (data.code == 200) {
            window.location.reload()
        } else {
            $.alert({ 'title': '提示', 'content': data.msg })
        }
    })

    return false;
})

$('#add-subject').on('submit', 'form', function() {
    var $form = $(this),
        send_data = $form.serializeObject()
    $.ajax({
        'url': '{{url("student/add-subject")}}',
        'data': send_data,
        'type': 'POST',
        'dataType': 'JSON'
    }).done(function(data) {
        if (data.code == 200) {
            $.alert({ 'title': '提示', 'content': '课程添加成功, 请等待确认' })
        } else {
            $.alert({ 'title': '提示', 'content': data.msg })
        }
    })

    return false;
})

$('#subject-content').on('click', '.a-confirm', function() {
    var id = $(this).data('id');

    $.ajax({
        'url': '{{url("teacher/change-subject-status")}}',
        'data': { 'id': id, 'status': 1 },
        'type': 'POST',
        'dataType': 'JSON'
    }).done(function(data) {
        if (data.code == 200) {
            window.location.reload()
        } else {
            $.alert({ 'title': '提示', 'content': data.msg })
        }
    })

    return false;
})

$('.change-detail-status').on('click', function() {
    var id = $(this).data('id');
    var status = $(this).data('status');
    var target_status = parseInt(status) + 1;

    $.ajax({
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        'url': '{{url("change-subject-detail-status")}}',
        'data': { 'id': id, 'status': target_status },
        'type': 'POST',
        'dataType': 'JSON'
    }).done(function(data) {
        if (data.code == 200) {
            window.location.reload()
        } else {
            $.alert({ 'title': '提示', 'content': data.msg })
        }
    })

    return false;

})
</script>
@endsection
