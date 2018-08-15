@extends('layouts.admin') @section('title','合作院校 | 亿航教育 V1.0') @section('nav')
@if(session()->get('admintype') == 1)
<li>
    <a href="{{url('admin')}}"><i class="fa fa-th-large"></i> <span class="nav-label">概览</span></a>
</li>
<li >
    <a href="{{url('admin/partner')}}"><i class="fa fa-diamond"></i> <span class="nav-label">合作院校</span></a>
</li>
<li>
    <a href="{{url('admin/teacher')}}"><i class="fa fa-globe"></i> <span class="nav-label">师资团队</span></a>
</li>
<li class="active">
    <a href="{{url('admin/course')}}"><i class="fa fa-flask"></i> <span class="nav-label">课程管理</span></a>
</li>
<li>
    <a href="{{url('admin/banner')}}"><i class="fa fa-sitemap"></i> <span class="nav-label">轮播管理</span></a>
</li>
<li >
    <a href="{{url('admin/student')}}"><i class="fa fa-user"></i> <span class="nav-label">考生管理</span></a>
</li>
<li >
    <a href="{{url('admin/adminuser')}}"><i class="fa fa-cog"></i> <span class="nav-label">管理员管理</span></a>
</li>
<li >
    <a href="{{url('admin/olduser')}}"><i class="fa fa-user-circle"></i> <span class="nav-label">用户管理(老)</span></a>
</li>
@endif
<li >
    <a href="{{url('admin/postgraduate')}}"><i class="fa fa-pencil"></i> <span class="nav-label">研究生管理</span></a>
</li>
<li >
    <a href="{{url('admin/supervise')}}"><i class="fa fa-bullseye"></i> <span class="nav-label">督学管理</span></a>
</li>
@endsection @section('mainTitle')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>课程列表</h2>
    </div>
    <div class="col-lg-4" style="padding-top:20px;text-align: right;">
        <a data-toggle="modal" href="#course-modal" class="btn btn-primary" id="add-course">添加课程</a>
    </div>
</div>
@endsection @section('main')
<div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form method="get" id="search-form" action="{{url('admin/course')}}">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">名称：</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="id">ID：</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" value="{{isset($_GET['id']) ? $_GET['id'] : ''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">&nbsp;</label>
                    <div class="form-group">
                        <input type="submit" value="查询" class="btn btn-primary" id="sub">
                         <a href="{{url('admin/course')}}"  class="btn btn-primary">清空</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content" id="course-content">
                <form>
                    <div class="container1">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="15%">学校</th>
                                    <th width="15%">专业</th>
                                    <th width="15%">名称</th>
                                    <th width="10%">排序</th>
                                    <th width="15%">
                                        <a href="javascript:void(0)" onclick="sortDataPost('user.created_at')">创建时间
                                            <span></span>
                                        </a>
                                    </th>
                                    <th width="20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($course as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->school}}</td>
                                    <td>{{$v->profession}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->sort}}</td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
                                        <a data-toggle="modal" href="#course-modal" data-id="{{$v->id}}">编辑</a> &nbsp;&nbsp;
                                        <a href="{{url('admin/course/destroy')}}" data-id="{{$v->id}}" class="delete-course">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">{{$course->appends($_GET)->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="course-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <form method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="row addel">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    学校
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[school]" class="form-control" placeholder="学校">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    专业
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[profession]" class="form-control" placeholder="专业">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    封面图
                                </label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="form[thumb]" value="" placeholder="封面图(107*107)">
                                        <span class="input-group-btn">
                                                <a class="btn-danger fileinput-button btn pull-right" href="javascript:;" role="button">
                                                    <span>添加封面图</span>
                                        <input type="file" name="file">
                                        </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    课程名称
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[name]" class="form-control" placeholder="名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    类型
                                </label>
                                <div class="col-lg-10">
                                    <select name="form[type]" class="form-control">
                                        <option value="985">985热门</option>
                                        <option value="211">211热门</option>
                                        <option value="hot">热门院校</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    课程图
                                </label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="form[image]" value="" placeholder="课程图(600*430)">
                                        <span class="input-group-btn">
                                                <a class="btn-danger fileinput-button btn pull-right" href="javascript:;" role="button">
                                                    <span>添加课程图</span>
                                        <input type="file" name="file">
                                        </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    课程描述 :
                                </label>
                                <div class="col-lg-10">
                                    <textarea name="form[description]" class="form-control" id="" cols="20" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    适用人群
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[match]" class="form-control" placeholder="适用人群">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    排序 :
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[sort]" value="1" class="form-control" placeholder="越大越靠前">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    其它 :
                                </label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="form[price]" placeholder="价格">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="form[studied]" placeholder="在学人数">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="form[sign]" placeholder="报名人数">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="form[praise]" placeholder="好评">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    目录 :
                                </label>
                                <div class="col-lg-10" id="course-detail-content">
                                    <div class="input-group target" style="margin-bottom: 10px">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="detail_title" placeholder="名称">
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="detail_url" placeholder="视频地址">
                                            </div>
                                        </div>
                                        <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger addel-delete"><i class="fa fa-remove"></i>
                                                </button>
                                            </span>
                                    </div>
                                    <button type="button" class="btn btn-success btn-block addel-add"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <input type="hidden" name="form[id]">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{csrf_field()}}
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection @section('js')
<script>
$(function() {

    $('.fileinput-button').fileupload({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
        dataType: 'json',
        autoUpload: true //自动上传
            ,
        maxNumberOfFiles: 2,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        url: '{{url("admin/upload/course")}}',
        previewMaxWidth: 600,
        dropZone: false,
        previewMaxHeight: 0,
        imageCrop: true,
        formData: {}
    }).on('fileuploaddone', function(e, data) {
        if (data.result.code == 200) {
            $(this).parents('.input-group').find('input[type="text"]').val(data.result.msg);
            yhNotify('上传图片成功')
        } else {
            yhNotify(data.result.msg)
        }
    })

    $('#course-modal').on("show.bs.modal", function(e) {
        var modal = $('#course-modal')
        if (e.relatedTarget.id == 'add-course') {
            $('#course-modal .modal-title').text('添加课程')
            modal.find('input').val('')
            modal.find('textarea').val('')
        } else {
            $('#course-modal .modal-title').text('修改课程')
            var id = $(e.relatedTarget).data('id')
            $.ajax({
                'url': '{{url("admin/course/show")}}',
                data:'id=' + id,
                'dataType': 'JSON',
                'type': 'GET',
                'async': false
            }).done(function(data) {
                if (data.code == 200) {
                    modal.find('input[name="form[id]"]').val(id)
                    modal.find('input[name="form[name]"]').val(data.msg.name)
                    modal.find('input[name="form[school]"]').val(data.msg.school)
                    modal.find('input[name="form[profession]"]').val(data.msg.profession)
                    modal.find('input[name="form[sort]"]').val(data.msg.sort)
                    modal.find('input[name="form[thumb]"]').val(data.msg.thumb)
                    modal.find('input[name="form[image]"]').val(data.msg.image)
                    modal.find('textarea[name="form[description]"]').val(data.msg.description)
                    modal.find('input[name="form[match]"]').val(data.msg.match)
                    modal.find('input[name="form[price]"]').val(data.msg.price)
                    modal.find('input[name="form[studied]"]').val(data.msg.studied)
                    modal.find('input[name="form[sign]"]').val(data.msg.sign)
                    modal.find('input[name="form[praise]"]').val(data.msg.praise)
                    modal.find('select[name="form[type]"] option').removeAttr('selected')
                    modal.find('select[name="form[type]"] option[value=' + data.msg.type + ']').prop("selected", true)

                    if (data.msg.details.length) {
                        var html = '';

                        for (var i = 0; i < data.msg.details.length; i++) {
                            html += '<div class="input-group target" style="margin-bottom: 10px">'
                            html += '   <div class="row">'
                            html += '       <div class="col-md-5"><input type="text" value="' + data.msg.details[i]['title'] + '" class="form-control" name="detail_title" placeholder="名称"></div>'
                            html += '       <div class="col-md-7"><input type="text" value="' + data.msg.details[i]['url'] + '" class="form-control" name="detail_url" placeholder="视频地址"></div>'
                            html += '   </div>'
                            html += '   <span class="input-group-btn">'
                            html += '       <button type="button" class="btn btn-danger addel-delete"><i class="fa fa-remove"></i></button>'
                            html += '   </span>'
                            html += '</div>'
                        }



                        html += '<button type="button" class="btn btn-success btn-block addel-add"><i class="fa fa-plus"></i></button>'
                        $('#course-detail-content').html(html)
                    } else {
                        modal.find('input[name="detail_title"]').val('')
                        modal.find('input[name="detail_url"]').val('')
                    }
                } else {
                    yhNotify(data.msg)
                }
            })
        }
    });


    $('#course-modal').on('submit', 'form', function() {
        var $form = $(this),
            send_data = $form.serializeObject()
        var modal = $('#course-modal')

        var detail_title = [],
            detail_url = [];
        $('#course-detail-content .target').each(function() {
            if ($(this).css('display') == 'table') {
                detail_title.push($(this).find('input[name="detail_title"]').val())
                detail_url.push($(this).find('input[name="detail_url"]').val())
            }
        });

        send_data['form[detail_title]'] = detail_title;
        send_data['form[detail_url]'] = detail_url;

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            url: '{{url("admin/course/store")}}',
            data: send_data,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                var no_error = true;
                if (!send_data['form[school]']) {
                    yhNotify('学校不能为空!')
                    no_error = false;
                }

                if (!send_data['form[profession]']) {
                    yhNotify('专业不能为空!')
                    no_error = false;
                }

                if (!send_data['form[thumb]']) {
                    yhNotify('封面不能为空!')
                    no_error = false;
                }

                if (!send_data['form[name]']) {
                    yhNotify('名称不能为空!')
                    no_error = false;
                }

                if (!send_data['form[image]']) {
                    yhNotify('课程图不能为空!')
                    no_error = false;
                }

                if (!send_data['form[description]']) {
                    yhNotify('描述不能为空!')
                    no_error = false;
                }

                if (!send_data['form[match]']) {
                    yhNotify('适用人群不能为空!')
                    no_error = false;
                }

                if (!/^\d+$/.test(send_data['form[sort]'])) {
                    yhNotify('排序须为数值!')
                    no_error = false;
                }

                if (!send_data['form[price]']) {
                    yhNotify('价格不能为空!')
                    no_error = false;
                }

                if (!/^\d+$/.test(send_data['form[studied]'])) {
                    yhNotify('在学人数须为数值!')
                    no_error = false;
                }

                if (!/^\d+$/.test(send_data['form[sign]'])) {
                    yhNotify('报名人数须为数值!')
                    no_error = false;
                }

                if (!send_data['form[praise]']) {
                    yhNotify('好评不能为空!')
                    no_error = false;
                }

                return no_error;
            }
        }).done(function(data) {
            if (data.code == 200) {
                modal.modal('hide')
                refreshList();
                yhNotify('保存成功!')
            } else {
                yhNotify(data.msg)
            }
        })

        return false;
    })

    $('#course-content').on('click', '.delete-course', function() {
        $.ajax({ url: $(this).attr('href'), type: 'GET',data:'id='+$(this).data('id'),beforeSend:function(){return confirm('确认删除?')}  }).done(function(data) {
            refreshList()
        })
        return false;
    })

    function refreshList() {
        $.ajax({ url: location.href, type: "GET" }).done(function(data) {
            $('#course-content').html($(data).find('#course-content').html())
        })
    }

    $('.addel').addel({
        classes: {
            target: 'target'
        },
        animation: {
            duration: 300
        }
    }).on('addel-delete', function(event) {
        if (!window.confirm('确定删除?')) {
            event.preventDefault();
        }
    });
})
</script>
@endsection
