@extends('layouts.frontend') @section('title','亿航微课 | 亿航教育') @section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li><a href="{{url('teacher')}}">师资团队</a></li>
<li class="active"><a href="{{url('partner')}}">合作院校</a></li>
@endsection @section('main')
<div class="page_content">
    <!-- slier or banner -->
    <div class="page_slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                 @foreach($banner as $k => $v)
                <li data-target="#carousel-example-generic" data-slide-to="{{$k}}" @if($k==0) class="active" @endif></li>
                 @endforeach
            </ol>
            <!-- slider items -->
            <div class="carousel-inner" role="listbox">

                @foreach($banner as $k => $v)
                <div class="item @if($k==0) active @endif">
                    <img src="{{asset('upload')}}/{{$v->image}}" alt="{{$v->title}}">
                    <div class="carousel-caption"></div>
                </div>
                @endforeach
            </div>
            <!-- end slider items -->
            <!-- controls -->
            <a class="left carousel-control" href="http://yh.rofter.com/#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="http://yh.rofter.com/#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- end -->
        </div>
    </div>
    <!-- end -->
    <!-- index slider bottom -->
    <div class="slider_bottom">
    </div>
    <!-- end -->
    <div class="container-fluid">
        <div class="container" style="margin-bottom:70px;margin-top:77px;">
            <!-- 合作院校 -->
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="title_square"><span>Partner schools</span></h4>
                        <h3 class="title_d title_d_g">豪华院校阵容</h3>
                        <div class="padding15" style="padding-left:23%;padding-right:23%;">
                            <p class="p20" style="color:#111;text-align:center;">机构的师资和专业分布于包括北京理工大学、南开大学、复旦大学等名校在内的各大院校</p>
                        </div>
                    </div>
                    <div class="col-sm-12" style="padding:10px;text-align: center;">
                        <img class="max_width" alt="合作院校" src="{{asset('static/frontend/images')}}/hezuo_school.jpg" />
                        <a href="{{$image[0]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[0]->image}}" style="width: 164px;height: 164px; position:absolute ;top: 90px;left: 505px;" alt="{{$image[0]->name}}">
                        </a>

                        <a href="{{$image[1]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[1]->image}}" style="width: 164px;height: 164px; position:absolute ;top: 241px;left: 330px;" alt="{{$image[1]->name}}">
                        </a>

                        <a href="{{$image[2]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[2]->image}}" style="width: 164px;height: 164px; position:absolute ;top: 241px;left: 679px;" alt="{{$image[2]->name}}">
                        </a>

                         <a href="{{$image[3]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[3]->image}}" style="width: 164px;height: 164px; position:absolute ;top: 435px;left: 505px;" alt="{{$image[3]->name}}">
                        </a>

                         <a href="{{$image[4]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[4]->image}}" style="width: 110px;height: 110px; position:absolute ;top: 122px;left:384px;" alt="{{$image[4]->name}}">
                        </a>

                        <a href="{{$image[5]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[5]->image}}" style="width: 116px;height: 110px; position:absolute ;top: 122px;left:681px;" alt="{{$image[5]->name}}">
                        </a>

                        <a href="{{$image[6]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[6]->image}}" style="width: 110px;height: 110px; position:absolute ;top: 415px;left:384px;" alt="{{$image[6]->name}}">
                        </a>

                        <a href="{{$image[7]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[7]->image}}" style="width: 116px;height: 110px; position:absolute ;top:416px;left:681px;" alt="{{$image[7]->name}}">
                        </a>

                         <a href="{{$image[8]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[8]->image}}" style="width: 85px;height: 85px; position:absolute ;top: 148px;left:289px;" alt="{{$image[8]->name}}">
                        </a>

                        <a href="{{$image[9]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[9]->image}}" style="width: 85px;height: 85px; position:absolute ;top: 149px;left:802px;" alt="{{$image[9]->name}}">
                        </a>

                        <a href="{{$image[10]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[10]->image}}" style="width: 85px;height: 85px; position:absolute ;top: 414px;left:289px;" alt="{{$image[10]->name}}">
                        </a>

                        <a href="{{$image[11]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[11]->image}}" style="width: 85px;height: 85px; position:absolute ;top: 414px;left:802px;" alt="{{$image[11]->name}}">
                        </a>

                        <a href="{{$image[12]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[12]->image}}" style="width: 93px;height: 93px; position:absolute ;top: 314px;left:227px;" alt="{{$image[12]->name}}">
                        </a>

                         <a href="{{$image[13]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[13]->image}}" style="width: 93px;height: 93px; position:absolute ;top: 314px;left:852px;" alt="{{$image[13]->name}}">
                        </a>

                        <a href="{{$image[14]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[14]->image}}" style="width: 69px;height: 69px; position:absolute ;top: 240px;left:252px;" alt="{{$image[14]->name}}">
                        </a>

                        <a href="{{$image[15]->url}}" target="_blank">
                            <img src="{{asset('upload')}}/{{$image[15]->image}}" style="width: 69px;height: 69px; position:absolute ;top: 240px;left:852px;" alt="{{$image[15]->name}}">
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="full-width" style="background-color:rgba(47,59,76,1);">
            <div class="container">
                <!-- 院校分布 -->
                <div>
                    <div class="row school_fenbu">
                        <div class="col-sm-12">
                            <h4 class="title_square font_w" style="position:absolute;top:-60px;width:100%;left:0px;right:0px;"><span>Distribution</span></h4>
                            <h3 class="title_d title_d_w">院校分布地区</h3>
                        </div>
                        <div class="col-sm-12">
                            <div class="fenbu_container">
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_map">&nbsp;</div>
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_g">华北</div>
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_w">华东</div>
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_g">东北</div>
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_g">华中</div>
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_w">华南</div>
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_g">西南</div>
                                <div class="col-xs-6 col-sm-3 fenbu_item pin_w">西北</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-bottom:70px;margin-top:77px;">
            <!-- 精选专业 -->
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="title_square"><span>Partner schools</span></h4>
                        <h3 class="title_d title_d_g">精选专业</h3>
                        <div class="padding15" style="padding-left:23%;padding-right:23%;">
                            <p class="p20" style="color:#111;text-align:center;">亿航的课程不仅覆盖了各个就业前景良好的热门专业，还包括各大优秀院校的人气专业</p>
                        </div>
                    </div>
                    <div class="col-sm-12" style="padding:10px;text-align: center;">
                        <img class="max_width" alt="合作院校" src="{{asset('static/frontend/images')}}/jiuxuan.jpg" />
                    </div>
                    <div class="col-sm-12" style="padding-left:12%;padding-right:12%;padding-top:35px;">
                        <div class="col-sm-4">
                            <p class="jx_text"><span>8%的热门专业</span></p>
                        </div>
                        <div class="col-sm-4">
                            <p class="jx_text"><span>30%的986院校专业</span></p>
                        </div>
                        <div class="col-sm-4">
                            <p class="jx_text"><span>62%的211院校专业</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
