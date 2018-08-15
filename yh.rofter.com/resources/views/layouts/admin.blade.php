<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="1TjmIbbKhcnQVsDsoqhmEXj4BF4RbhTn59cAGryY">
    <title>@yield('title')</title>
    <link href="{{asset('static/admin/css')}}/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('static/font-awesome')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('static/admin/css')}}/toastr.min.css" rel="stylesheet">
    <link href="{{asset('static/admin/css')}}/animate.css" rel="stylesheet">
    <link href="{{asset('static/admin/css')}}/style.css" rel="stylesheet">
    @yield('css')
</head>
<body>
<div id="wrapper">
    @include('public/left_admin')
    <div id="page-wrapper" class="gray-bg">

        @include('public/header_admin')
            <!-- breadcrumb start -->

        @yield('mainTitle')

            <!-- breadcrumb end -->

            <!-- right content start -->
            <div class="wrapper wrapper-content animated fadeIn ecommerce">@yield('main')
            @include('public/footer_admin')
            </div>
            <!-- right header end -->

            <!-- right footer start -->

            <!-- right footer end -->
    </div>

    <!-- right sidebar start -->
    <!-- 暂时移除 right-sidebar -->
    <!-- right sidebar end -->
</div>
<!-- Mainly scripts -->
<script src="{{asset('static/admin/js')}}/jquery-2.1.1.js"></script>
<script src="{{asset('static/admin/js')}}/jquery-3.3.1.min.js"></script>
<script src="{{asset('static/bootstrap/js')}}/bootstrap.min.js"></script>
<script src="{{asset('static/admin/js')}}/jquery.metisMenu.js"></script>
<script src="{{asset('static/admin/js')}}/jquery.slimscroll.min.js"></script>

<!-- image upload -->
<script src="{{asset('static/admin/js')}}/jquery.ui.widget.js"></script>
<script src="{{asset('static/admin/js')}}/jquery.iframe-transport.js"></script>
<script src="{{asset('static/admin/js')}}/jquery.fileupload.js"></script>

<!-- Toastr script -->
<script src="{{asset('static/admin/js')}}/toastr.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('static/admin/js')}}/inspinia.js"></script>
<script src="{{asset('static/admin/js')}}/pace.min.js"></script>

<!-- Common scripts -->
<script src="{{asset('static/admin/js')}}/common.js"></script>
<script src="{{asset('static/admin/js')}}/addel.jquery.min.js"></script>
<script type="text/javascript">
        function getCookie(value){
            var cook = document.cookie.split('; ');
            console.log(cook)
            for (var i = 0; i < cook.length; i++) {
                var cookArr =  cook[i].split('=');
                if (cookArr[0] == value) {
                    return cookArr[1];
                }

            }
            return '';
        }


    </script>
@yield('js')
</body>
</html>
