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
<li >
    <a href="{{url('admin/postgraduate')}}"><i class="fa fa-pencil"></i> <span class="nav-label">研究生管理</span></a>
</li>
<li class="active">
    <a href="{{url('admin/supervise')}}"><i class="fa fa-bullseye"></i> <span class="nav-label">督学管理</span></a>
</li>
@endsection @section('mainTitle')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>督学管理</h2>
    </div>
</div>
@endsection @section('main')
<div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form method="get" id="search-form" action="{{url('admin/supervise')}}">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">学生姓名：</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="uname" value="{{isset($_GET['uname']) ? $_GET['uname'] : ''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="id">课程名:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sname" value="{{isset($_GET['sname']) ? $_GET['sname'] : ''}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="name">&nbsp;</label>
                    <div class="form-group">
                        <input type="submit" value="查询" class="btn btn-primary" id="sub">
                        <a href="{{url('admin/supervise')}}" class="btn btn-primary">清空</a>
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
                                    <th width="10%">学生姓名</th>
                                    <th width="10%">教师姓名</th>
                                    <th width="15%">课程名称</th>
                                    <th width="20%">课程内容</th>
                                    <th width="10%">上课时间</th>
                                    <th width="10%">上课状态</th>
                                    <th width="15%">创建时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->suname}}</td>
                                    <td>{{$v->tuname}}</td>
                                    <td>{{$v->sname}}</td>
                                    <td>{{$v->content}}</td>
                                    <td>{{$v->date}}</td>
                                    <td>
                                    @if($v->status == 0)
                                        即将上课
                                    @elseif($v->status == 1)
                                        正在上课
                                    @elseif($v->status == 2)
                                        已结束
                                    @endif
                                    </td>
                                    <td>{{$v->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">{{$detail->appends($_GET)->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
