        <!-- right header start -->
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="javascript:void(0);">
                        <div class="form-group">
                            <input type="text" placeholder="搜索..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">欢迎来到亿航教育管理后台.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                    </li>

                    <li>
                        <a onclick="logout.submit();">
                            <form action="{{url('admin/logout')}}" method="post" name="logout">
                                {{csrf_field()}}
                                <i class="fa fa-sign-out"></i>退出
                            </form>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <!-- right header end -->
