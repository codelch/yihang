@extends('layouts.frontend') @section('title','亿航微课 | 亿航教育') @section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li class="active"><a href="{{url('teacher')}}">师资团队</a></li>
<li><a href="{{url('partner')}}">合作院校</a></li>
@endsection @section('main')
<!-- main content and ending tag in footer -->
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
    <div class="container-fluid" style="padding:55px;">
        <div class="container">
            <div class="fliter_container teacher_container">
                <!-- shaixuan -->
                <div class="row teacher_row">
                    <div class="col-sm-6">
                        <div>
                            <h3 class="title_blue" style="margin:15px auto;text-align:right;">我们筛选的&nbsp;&nbsp;&nbsp;不只是考研讲师</h3>
                            <p class="p20" style="color:#111;">亿航教育凭借独特的资源优势，打造了独居特色的专业课一对一辅导模式，全面覆盖线下的面对面授课及线上的网络授课，同时借助互联网优势，创建了独特的微课体系：“亿航微课堂”</p>
                        </div>
                    </div>
                    <div class="col-sm-6" style="padding-left:35px;">
                        <div><img alt="资历审查 " src="{{asset('static/frontend/images')}}/team1_0.jpg" /></div>
                    </div>
                </div>
            </div>
            <div class="teacher_container">
                <!-- teacher team -->
                <h3 class="title_with_sub_text" style="margin-bottom:55px;" ;><span>专业教师，高分学长学姐</span><br /><span>专业团队，灵活辅导，自身经验</span></h3>
                <div class="full-width" style="background-color:#f8f8f8;margin-top:25px;margin-bottom:25px;">
                    <div class="row teacher_row">
                        <div class="col-sm-6">
                            <div><img alt="资历审查 " src="{{asset('static/frontend/images')}}/team1_1.jpg" /></div>
                        </div>
                        <div class="col-sm-6">
                            <div style="vertical-align: bottom;">
                                <h3 class="title_num"><span>01.</span>资历审查</h3>
                                <p class="p20" style="color:#111;">亿航教育凭借独特的资源优势，打造了独居特色的专业课一对一辅导模式，全面覆盖线下的面对面授课及线上的网络授课，同时借助互联网优势，创建了独特的微课体系：“亿航微课堂”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="full-width" style="margin-top:0px;margin-bottom:0px;">
                    <div class="row teacher_row">
                        <div class="col-sm-6">
                            <div>
                                <h3 class="title_num"><span>02.</span>面试筛选</h3>
                                <p class="p20" style="color:#111;">亿航教育凭借独特的资源优势，打造了独居特色的专业课一对一辅导模式，全面覆盖线下的面对面授课及线上的网络授课，同时借助互联网优势，创建了独特的微课体系：“亿航微课堂”</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div><img alt="资历审查 " src="{{asset('static/frontend/images')}}/team1_2.jpg" /></div>
                        </div>
                    </div>
                </div>
                <div class="full-width full_with_bg" style="margin-top:0px;margin-bottom:0px;">
                    <div class="row teacher_row">
                        <div class="col-sm-6 hidden-xs" style="min-height:361px;">
                            <div></div>
                        </div>
                        <div class="col-sm-6" style="min-height:361px;">
                            <div>
                                <h3 class="title_num" style="color:#fff;"><span>03.</span>培训考试</h3>
                                <p class="p20" style="color:#fff;">亿航教育凭借独特的资源优势，打造了独居特色的专业课一对一辅导模式，全面覆盖线下的面对面授课及线上的网络授课，同时借助互联网优势，创建了独特的微课体系：“亿航微课堂”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="full-width" style="margin-top:15px;margin-bottom:15px;">
                    <div class="row school_pro">
                        <div class="col-sm-12">
                            <div style="text-align:center;">
                                <h3 class="title_num" style="color:#111;margin:20px auto;display:inline-block"><span>04.</span>学校专业匹配</h3>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h4 class="tt_icon tt_set">学校专业精准匹配</h4></div>
                        <div class="col-sm-4">
                            <h4 class="tt_icon tt_search">学校课考点系统总结</h4></div>
                        <div class="col-sm-4">
                            <h4 class="tt_icon tt_chat">24小时全天答疑</h4></div>
                    </div>
                </div>
            </div>
            <div class="sz_container">
                <!-- team slider container -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="title_square"><span>Teachers Team</span></h4>
                        <h3 class="title_d title_d_g">豪华师资力量</h3>
                    </div>
                    <div class="col-sm-12">
                        <div class="team_krakatoa">
                            <div class="krakatoa_container">
                                <div id="krakatoa_team">
                                    @foreach($teacher as $v)
                                    <div class="krakatoa_item">
                                        <!-- item -->
                                        <div class="row">
                                            @foreach($v as $v1)
                                            <div class="col-xs-4 kt_item">
                                                <div>
                                                    <a href="{{url('teacher/detail',['id'=>$v1['id']])}}">
                                                                <img src="{{asset('upload')}}/{{$v1['image']}}" alt="{{$v1['name']}}" />
                                                            </a>
                                                    <p class="kt_info"><span>{{$v1['name']}}</span><span>{{$v1['profession']}}</span><span>{{$v1['score']}}</span></p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- end item -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
