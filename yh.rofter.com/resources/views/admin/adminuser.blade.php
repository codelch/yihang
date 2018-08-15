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
        <h2>管理员管理</h2>
    </div>
    <div class="col-lg-4" style="padding-top:20px;text-align: right;">
        <a data-toggle="modal" href="#admin-modal" class="btn btn-primary" id="add-admin">添加管理员</a>
    </div>
</div>
@endsection @section('main')
<div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form method="get" id="search-form" action="{{url('admin/adminuser')}}">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">管理员姓名：</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{isset($_GET['name'])?$_GET['name']:''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="id">手机号：</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" value="{{isset($_GET['phone'])?$_GET['phone']:''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">&nbsp;</label>
                    <div class="form-group">
                        <input type="submit" value="查询" class="btn btn-primary" id="sub">
                        <a href="{{url('admin/adminuser')}}" class="btn btn-primary">清空</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content" id="admin-content">
                <form>
                    <div class="container1">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="15%">姓名</th>
                                    <th width="20%">手机号</th>
                                    <th width="20%">密码</th>
                                    <th width="10%">状态</th>
                                    <th width="15%">创建时间</th>
                                    <th width="20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->uname}}</td>
                                    <td>{{$v->phone}}</td>
                                    <td>{{$v->original_pwd}}</td>
                                    <td>{{$v->status==1 ? '正常':'禁用'}}</td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
                                        @if($v->status == 1)
                                        <a href="javascript:void(0)"  class="enabled-flag" data-id="{{$v->id}}">禁用</a>&nbsp;
                                        <span>启用</span>
                                        @else
                                        <span>禁用</span>&nbsp;
                                        <a href="javascript:void(0)" class="enabled-flag" data-id="{{$v->id}}">启用</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">{{$admin->appends($_GET)->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    手机号
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="phone" class="form-control" placeholder="手机号">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    密码
                                </label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" class="form-control" placeholder="密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    姓名
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" name="uname" class="form-control" placeholder="姓名">
                                </div>
                            </div>
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

    $("#admin-content").on('click','.disable-flag',function(e){
        var id = $(this).data('id');
        $.ajax({
            url: '{{url("admin/adminuser/disable")}}',
            data: 'id='+id,
            type: 'GET',
            dataType: 'JSON',
        }).done(function(data) {
            if (data.code == 200) {
                refreshList();
                yhNotify('禁用成功!')
            } else {
                yhNotify(data.msg)
            }
        })

        return false;
    })

    $("#admin-content").on('click','.enabled-flag',function(e){
        var id = $(this).data('id');
        $.ajax({
            url: '{{url("admin/adminuser/enabled")}}',
            data: 'id='+id,
            type: 'GET',
            dataType: 'JSON',
        }).done(function(data) {
            if (data.code == 200) {
                refreshList();
                yhNotify('启用成功!')
            } else {
                yhNotify(data.msg)
            }
        })

        return false;
    })

    $('#admin-modal').on("show.bs.modal", function(e) {
        var modal = $('#admin-modal')
            $('#admin-modal .modal-title').text('添加管理员')
            modal.find('input').val('')
    });


    $('#admin-modal').on('submit', 'form', function() {
        var $form = $(this),
            send_data = $form.serializeObject()
        var modal = $('#admin-modal')
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            url: '{{url("admin/adminuser/store")}}',
            data: send_data,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                var no_error = true;
                if (!send_data['phone']) {
                    yhNotify('手机号不能为空!')
                    no_error = false;
                }

                if (!send_data['password']) {
                    yhNotify('密码不能为空!')
                    no_error = false;
                }

                if (!send_data['uname']) {
                    yhNotify('姓名不能为空!')
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
function refreshList() {
        $.ajax({ url: location.href, type: "GET" }).done(function(data) {
            $('#admin-content').html($(data).find('#admin-content').html())
        })
    }

</script>
@endsection
