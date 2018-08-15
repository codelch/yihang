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
<li >
    <a href="{{url('admin/adminuser')}}"><i class="fa fa-cog"></i> <span class="nav-label">管理员管理</span></a>
</li>
<li class="active">
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
        <h2>考生管理</h2>
    </div>
</div>
@endsection @section('main')
<div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form method="get" id="search-form" action="{{url('admin/student')}}">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">考生姓名：</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="id">手机号：</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" value="{{isset($_GET['phone']) ? $_GET['phone'] : ''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">&nbsp;</label>
                    <div class="form-group">
                        <input type="submit" value="查询" class="btn btn-primary" id="sub">
                        <a href="{{url('admin/student')}}" class="btn btn-primary">清空</a>
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
                                    <th width="7%">ID</th>
                                    <th width="12%">用户名</th>
                                    <th width="10%">姓名</th>
                                    <th width="15%">手机号</th>
                                    <th width="18%">邮箱</th>
                                    <th width="15%">院校</th>
                                    <th width="18%">创建时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($student as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->num}}</td>
                                    <td>{{$v->uname}}</td>
                                    <td>{{$v->tel}}</td>
                                    <td>{{$v->e_mail}}</td>
                                    <td>{{$v->school}}</td>
                                    <td>{{date("Y-m-d- H:i:s",$v->created)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">{{$student->appends($_GET)->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
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
        $.ajax({ url: $(this).attr('href'), type: 'DELETE' }).done(function(data) {
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
