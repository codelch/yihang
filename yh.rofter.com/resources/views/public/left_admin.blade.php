<!-- nav start -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse"><ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">
            <span><img alt="image" class="img-circle" src="{{asset('static')}}/admin/image/profile_small.jpg" /></span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
                <span class="clear">
                    <span class="block m-t-xs"> <strong class="font-bold" id="username">{{session()->get('adminuser')}}</strong><b class="caret"></b></span>
                </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a href="javascript:void(0)">个人信息</a></li>
                            </ul>
        </div>
    </li>
    @yield('nav')

</ul>
</div>
    </nav>
    <!-- nav end -->
