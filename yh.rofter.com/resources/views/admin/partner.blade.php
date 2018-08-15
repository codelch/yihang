@extends('layouts.admin') @section('title','合作院校 | 亿航教育 V1.0') @section('nav')
@if(session()->get('admintype') == 1)
<li>
    <a href="{{url('admin')}}"><i class="fa fa-th-large"></i> <span class="nav-label">概览</span></a>
</li>
<li class="active">
    <a href="{{url('admin/partner')}}"><i class="fa fa-diamond"></i> <span class="nav-label">合作院校</span></a>
</li>
<li>
    <a href="{{url('admin/teacher')}}"><i class="fa fa-globe"></i> <span class="nav-label">师资团队</span></a>
</li>
<li>
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
        <h2>合作院校</h2>
    </div>
    <div class="col-lg-4" style="padding-top:20px;text-align: right;">
        <a data-toggle="modal" href="#partner-modal" class="btn btn-primary" id="add-partner">添加院校</a>
    </div>
</div>
@endsection @section('main')
<div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form method="get" id="search-form" action="{{url('admin/partner')}}">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">院校名称：</label>
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
                        <a href="{{url('admin/partner')}}" class="btn btn-primary">清空</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content" id="partner-content">
                <form>
                    <div class="container1">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="25%">名称</th>
                                    <th width="25%">图片</th>
                                    <th width="10%">排序</th>
                                    <th width="20%">
                                        <a href="javascript:void(0)" onclick="sortDataPost('user.created_at')">创建时间
                                        <span></span>
                                    </a>
                                    </th>
                                    <th width="20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partner as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td><a href="{{$v->url}}" target="_blank">{{$v->name}}</a></td>
                                    <td><a href="{{asset('upload')}}/{{$v->image}}" target="_blank"><img src="{{asset('upload')}}/{{$v->image}}" width="60px;" alt=""></a></td>
                                    <td>{{$v->sort}}</td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
                                        <a data-toggle="modal" href="#partner-modal" data-id="{{$v->id}}">编辑</a> &nbsp;&nbsp;
                                        <a href="{{url('admin/partner/destroy')}}" data-id="{{$v->id}}" class="delete-partner">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">{{$partner->appends($_GET)->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="partner-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <form method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    名称
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" placeholder="名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    链接
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="url" class="form-control" placeholder="链接">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    上传LOGO
                                </label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="image" value="" placeholder="LOGO(266*266)">
                                        <span class="input-group-btn">
                                            <a class="btn-danger fileinput-button btn pull-right" href="javascript:;" role="button">
                                                <span>添加LOGO</span>
                                        <input type="file" name="file">
                                        </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    排序 :
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="sort" value="" class="form-control" placeholder="越大越靠前">
                                </div>
                            </div>
                            <input type="hidden" name="id">
                            {{csrf_field()}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
        url: '{{url("admin/upload/partner")}}',
        previewMaxWidth: 600,
        dropZone: false,
        previewMaxHeight: 0,
        imageCrop: true,
        formData: {}
    }).on('fileuploaddone', function(e, data) {
        if (data.result.code == 200) {
            $(this).parents('.input-group').find('input[type="text"]').val(data.result.msg);
            yhNotify('上传照片成功')
        } else {
            yhNotify(data.result.msg)
        }
    })

    $('#partner-modal').on("show.bs.modal", function(e) {
        var modal = $('#partner-modal')
        if (e.relatedTarget.id == 'add-partner') {
            $('#partner-modal .modal-title').text('添加院校')
            modal.find('input').val('')
            modal.find('textarea').val('')
        } else {
            $('#partner-modal .modal-title').text('修改院校')
            var id = $(e.relatedTarget).data('id')
            $.ajax({
                url: '{{url("admin/partner/show")}}',
                data: 'id=' + id,
                dataType: 'JSON',
                type: 'GET',
                async: false
            }).done(function(data) {
                if (data.code == 200) {
                    modal.find('input[name="id"]').val(id)
                    modal.find('input[name="name"]').val(data.msg.name)
                    modal.find('input[name="image"]').val(data.msg.image)
                    modal.find('input[name="sort"]').val(data.msg.sort)
                    modal.find('input[name="url"]').val(data.msg.url)
                } else {
                    yhNotify(data.msg)
                }
            })
        }
    });


    $('#partner-modal').on('submit', 'form', function() {
        var $form = $(this),
            send_data = $form.serializeObject()
        var modal = $('#partner-modal')
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            url: '{{url("admin/partner/store")}}',
            data: send_data,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                var no_error = true;
                if (!send_data['name']) {
                    yhNotify('名称不能为空!')
                    no_error = false;
                }

                if (!send_data['image']) {
                    yhNotify('图片不能为空!')
                    no_error = false;
                }

                if (!/^\d+$/.test(send_data['sort'])) {
                    yhNotify('排序必须为数值!')
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

    $('#partner-content').on('click', '.delete-partner', function() {
        $.ajax({ url: $(this).attr('href'), type: 'GET',data:'id='+$(this).data('id'),beforeSend:function(){return confirm('确认删除?')}  }).done(function(data) {
            refreshList()
        })
        return false;
    })

    function refreshList() {
        $.ajax({ url: location.href, type: "GET" }).done(function(data) {
            $('#partner-content').html($(data).find('#partner-content').html())
        })
    }
})
</script>
@endsection
