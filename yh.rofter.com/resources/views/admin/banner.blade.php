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
<li>
    <a href="{{url('admin/course')}}"><i class="fa fa-flask"></i> <span class="nav-label">课程管理</span></a>
</li>
<li>
    <a href="{{url('admin/banner')}}"><i class="fa fa-sitemap"></i> <span class="nav-label">轮播管理</span></a>
</li>
<li >
    <a href="{{url('admin/student')}}"><i class="fa fa-user"></i> <span class="nav-label">考生管理</span></a>
</li>
<li class="active">
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
        <h2>轮播管理</h2>
    </div>
    <div class="col-lg-4" style="padding-top:20px;text-align: right;">
        <a data-toggle="modal" href="#banner-modal" class="btn btn-primary" id="add-banner">添加轮播</a>
    </div>
</div>
@endsection @section('main')
<div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form method="get" id="search-form">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">对应模块：</label>
                    <div class="form-group">
                        <select class="form-control m-b ktv-select" name="key">
                            <option value="">全部</option>
                            <option value="home">主页轮播(1920*770)</option>
                            <option value="micro-lesson">微课(1920*520)</option>
                            <option value="pri-education">私教(1920*780)</option>
                            <option value="teacher">师资团队(1920*520)</option>
                            <option value="partner">合作院校(1920*520)</option>
                        </select>
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
                         <a href="{{url('admin/banner')}}"  class="btn btn-primary">清空</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content" id="banner-content">
                <form>
                    <div class="container1">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="15%">标题</th>
                                    <th width="15%">图片</th>
                                    <th width="10%">排序</th>
                                    <th width="15%">对应模块</th>
                                    <th width="15%">
                                        <a href="javascript:void(0)" onclick="sortDataPost('user.created_at')">创建时间
                                        <span></span>
                                    </a>
                                    </th>
                                    <th width="20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banner as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td><a href="" target="_blank">{{$v->title}}</a></td>
                                    <td><a href="{{asset('upload')}}/{{$v->image}}" target="_blank"><img src="{{asset('upload')}}/{{$v->image}}" width="120px;" alt=""></a></td>
                                    <td>{{$v->sort}}</td>
                                    <td>
                                    @if($v->key == 'home')
                                    主页轮播(1920*770)
                                    @elseif($v->key == 'micro-lesson')
                                    微课(1920*520)
                                    @elseif($v->key == 'pri-education')
                                    私教(1920*780)
                                    @elseif($v->key == 'teacher')
                                    师资团队(1920*520)
                                    @elseif($v->key == 'partner')
                                    合作院校(1920*520)
                                    @endif
                                    </td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
                                        <a data-toggle="modal" href="#banner-modal" data-id="{{$v->id}}">编辑</a> &nbsp;&nbsp;
                                        <a href="{{url('admin/banner/destroy')}}" data-id="{{$v->id}}" class="delete-banner" >删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">{{$banner->appends($_GET)->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="banner-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    标题
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[title]" class="form-control" placeholder="标题">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    位置
                                </label>
                                <div class="col-lg-10">
                                    <select name="form[key]" class="form-control ktv-select">
                                        <option value="">请选择</option>
                                        <option value="home">主页轮播(1920*770)</option>
                                        <option value="micro-lesson">微课(1920*520)</option>
                                        <option value="pri-education">私教(1920*780)</option>
                                        <option value="teacher">师资团队(1920*520)</option>
                                        <option value="partner">合作院校(1920*520)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    链接地址
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[url]" class="form-control" placeholder="链接地址(非必须)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    上传图片
                                </label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="form[image]" value="" placeholder="图片">
                                        <span class="input-group-btn">
                                            <a class="btn-danger fileinput-button btn pull-right" href="javascript:;" role="button">
                                                <span>添加图片</span>
                                        <input type="file" name="file">
                                        </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    排序
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="form[sort]" class="form-control" placeholder="越大越靠前">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    描述信息
                                </label>
                                <div class="col-lg-10">
                                    <textarea name="form[description]" class="form-control" id="" cols="20" rows="5"></textarea>
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
    $("select[name='key']").val('{{isset($_GET['key'])?$_GET['key']:""}}')
    $('.fileinput-button').fileupload({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
        dataType: 'json',
        autoUpload: true //自动上传
            ,
        maxNumberOfFiles: 2,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        url: '{{url("admin/upload/banner")}}',
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

    $('#banner-modal').on("show.bs.modal", function(e) {
        var modal = $('#banner-modal')
        if (e.relatedTarget.id == 'add-banner') {
            $('#banner-modal .modal-title').text('添加轮播')
            modal.find('input').val('')
            modal.find('select option').removeAttr('selected')
            modal.find('textarea').val('')
        } else {
            $('#banner-modal .modal-title').text('修改轮播')
            var id = $(e.relatedTarget).data('id')
            $.ajax({
                url: '{{url("admin/banner/show")}}',
                data:'id=' + id,
                dataType: 'JSON',
                type: 'GET',
                async: false
            }).done(function(data) {
                if (data.code == 200) {
                    modal.find('input[name="form[id]"]').val(id)
                    modal.find('input[name="form[title]"]').val(data.msg.title)
                    modal.find('input[name="form[url]"]').val(data.msg.url)
                    modal.find('input[name="form[image]"]').val(data.msg.image)
                    modal.find('textarea[name="form[description]"]').val(data.msg.description)
                    modal.find('input[name="form[sort]"]').val(data.msg.sort)
                    modal.find('select[name="form[key]"] option').removeAttr('selected')
                    modal.find('select[name="form[key]"] option[value=' + data.msg.key + ']').prop("selected", true)
                } else {
                    yhNotify(data.msg)
                }
            })
        }
    });


    $('#banner-modal').on('submit', 'form', function() {
        var $form = $(this),
            send_data = $form.serializeObject()
        var modal = $('#banner-modal')
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            url: '{{url("admin/banner/store")}}',
            data: send_data,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                var no_error = true;
                if (!send_data['form[title]']) {
                    yhNotify('标题不能为空!')
                    no_error = false;
                }

                if (!send_data['form[key]']) {
                    yhNotify('位置不能为空!')
                    no_error = false;
                }

                if (!send_data['form[image]']) {
                    yhNotify('图片不能为空!')
                    no_error = false;
                }

                if (!/^\d+$/.test(send_data['form[sort]'])) {
                    yhNotify('排序必须为数值!')
                    no_error = false;
                }

                if (!send_data['form[description]']) {
                    yhNotify('描述不能为空!')
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

    $('#banner-content').on('click', '.delete-banner', function() {

        $.ajax({ url: $(this).attr('href'), type: 'GET',data:'id='+$(this).data('id'),beforeSend:function(){return confirm('确认删除?')} }).done(function(data) {
                refreshList();
        })
        return false;
    })

    function refreshList() {
        $.ajax({ url: location.href, type: "GET" }).done(function(data) {
            $('#banner-content').html($(data).find('#banner-content').html())
        })
    }
})
</script>
@endsection
