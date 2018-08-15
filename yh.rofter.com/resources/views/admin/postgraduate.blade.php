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
<li >
    <a href="{{url('admin/olduser')}}"><i class="fa fa-user-circle"></i> <span class="nav-label">用户管理(老)</span></a>
</li>
@endif
<li class="active">
    <a href="{{url('admin/postgraduate')}}"><i class="fa fa-pencil"></i> <span class="nav-label">研究生管理</span></a>
</li>
<li >
    <a href="{{url('admin/supervise')}}"><i class="fa fa-bullseye"></i> <span class="nav-label">督学管理</span></a>
</li>
@endsection @section('mainTitle')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>研究生管理</h2>
    </div>
</div>
@endsection @section('main')
<div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form method="get" id="search-form" action="{{url('admin/postgraduate')}}">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">研究生姓名：</label>
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
                        <a href="{{url('admin/postgraduate')}}" class="btn btn-primary">清空</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content" id="postgraduate-content">
                <form>
                    <div class="container1">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                                <tr>
                                    <th width="7%">ID</th>
                                    <th width="8%">姓名</th>
                                    <th width="8%">分配</th>
                                    <th width="12%">手机号</th>
                                    <th width="12%">微信号</th>
                                    <th width="10%">QQ号</th>
                                    <th width="13%">就读院校</th>
                                    <th width="10%">就读专业</th>
                                    <th width="15%">创建时间</th>
                                    @if(session()->get('admintype') ==1 )
                                    <th width="10%">操作</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($postgraduate as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->uname}}</td>
                                    <td>
                                    @if($v->auname == null)
                                    未分配
                                    @else
                                    {{$v->auname}}
                                    @endif
                                    </td>
                                    <td>{{$v->phone}}</td>
                                    <td>{{$v->wechat}}</td>
                                    <td>{{$v->qq}}</td>
                                    <td>{{$v->school}}</td>
                                    <td>{{$v->profession}}</td>
                                    <td>{{$v->created_at}}</td>
                                    @if(session()->get('admintype') ==1 )
                                    <td>
                                        <a data-toggle="modal" href="#postgraduate-modal" class="postgraduate-distribute" id="add-postgraduate" data-id="{{$v->id}}">分配</a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">{{$postgraduate->appends($_GET)->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="postgraduate-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    管理员
                                </label>
                                <div class="col-lg-10">
                                    <select name="secondAdmin" class="form-control">
                                        <option value="0" class="form-control">--请选择管理员--</option>
                                        @foreach($admin as $v)
                                        <option value="{{$v->id}}">{{$v->uname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </div>
                    <input type="hidden" name="id">
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


    $('#postgraduate-modal').on("show.bs.modal", function(e) {

        })
 $("#postgraduate-content").on("click",".postgraduate-distribute",function(){
            var id = $(this).data('id')

            $.ajax({
            url: '{{url("admin/postgraduate/searchdist")}}',
            data: 'id='+id,
            type: 'GET',
            dataType: 'JSON',

        }).done(function(data) {
            if (data.code == 200) {
                var modal = $('#postgraduate-modal')
                modal.find('input[name="id"]').val(id)
                $('select[name="secondAdmin"]').val(data.msg)
                $('#postgraduate-modal .modal-title').text('分配研究生')
            }
        })



        })


    $('#postgraduate-modal').on('submit', 'form', function() {
        var $form = $(this),
            send_data = $form.serializeObject()

        var modal = $('#postgraduate-modal')
        $.ajax({
            url: '{{url("admin/postgraduate/distribute")}}',
            data: send_data,
            type: 'GET',
            dataType: 'JSON',
            beforeSend: function() {
                var no_error = true;
                if (send_data['secondAdmin'] == 0) {
                    yhNotify('请选择管理员!')
                    no_error = false;
                }

                return no_error;
            }
        }).done(function(data) {
            if (data.code == 200) {
                modal.modal('hide')
                refreshList();
                yhNotify('分配成功!')
            } else {
                yhNotify(data.msg)
            }
        })

        return false;
    })

    $('#postgraduate-content').on('click', '.delete-postgraduate', function() {
        $.ajax({ url: $(this).attr('href'), type: 'DELETE' }).done(function(data) {
            refreshList()
        })
        return false;
    })

    function refreshList() {
        $.ajax({ url: location.href, type: "GET" }).done(function(data) {
            $('#postgraduate-content').html($(data).find('#postgraduate-content').html())
        })
    }
</script>
@endsection
