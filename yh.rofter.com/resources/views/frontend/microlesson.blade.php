@extends('layouts.frontend') @section('title','亿航微课 | 亿航教育') @section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li class="active"><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li><a href="{{url('teacher')}}">师资团队</a></li>
<li><a href="{{url('partner')}}">合作院校</a></li>
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
            <a class="left carousel-control" href="{{url('microlesson')}}/#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="{{url('microlesson')}}/#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- end -->
        </div>
    </div>
    <!-- end -->
    <!-- index slider bottom -->
    <div class="slider_bottom">
        <div class="container" style="padding:0px 5%;">
            <div class="row">
                <div class="col-sm-12">
                    <p class="p20" style="color:#222;padding: 40px 0px;">
                        “亿航微课堂”是专为考研学生打造的“轻学习”概念的新型网课。相比传统的网课体系而言，“亿航微课堂”的讲师凭借丰富的考研辅导经验，将知识点概括并迸行提炼，总结成时间短、干货多、考点专项练习指导的短小视频，方便考研学子减少不必要的时间成本消耗，高效记忆考点知识并进行巩固练习。
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="container-fluid" style="padding-bottom:25px;">
        <div class="container">
            <!-- 原创微课 -->
            <div>
                <h3 class="title_blue margin_b_20">原创微课</h3>
                <div class="micro_class">
                    <!--985 -->
                    <h4 class="title_blue micro_title">985院校 热门专业</h4>
                    <div class="micro_container">
                        <div class="krakatoa_container">
                            <div class="krakatoa_micro">
                                @foreach($ml985 as $v1)
                                <div class="krakatoa_item">
                                    <!-- 微课 item -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($v1 as $k=>$v)
                                            <div class="col-xs-6 micro_class_item">
                                                <!-- 课程学校item -->
                                                <div class="row">
                                                    <div class="col-xs-4 micro_class_img">
                                                        <a target="_blank" rel="noopener" href="{{url('microlesson',['id'=>$v['id']])}}"><img src="{{asset('upload')}}/{{$v['thumb']}}" alt="{{$v['name']}}" /></a>
                                                    </div>
                                                    <div class="col-xs-8 micro_class_info">
                                                        <a target="_blank" rel="noopener" href="{{url('microlesson',['id'=>$v['id']])}}" class="micro_class_link">
                                                            <h5 class="nowrap micro_school">{{$v['school']}}</h5>
                                                            <p class="nowrap micro_p">{{$v['profession']}}</p>
                                                            <p class="nowrap micro_p">亿航原创考研课程</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- end item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="micro_class">
                    <!--211 -->
                    <h4 class="title_blue micro_title">211院校 热门专业</h4>
                    <div class="micro_container">
                        <div class="krakatoa_container">
                            <div class="krakatoa_micro">
                               @foreach($ml211 as $v1)
                                <div class="krakatoa_item">
                                    <!-- 微课 item -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($v1 as $k=>$v)
                                            <div class="col-xs-6 micro_class_item">
                                                <!-- 课程学校item -->
                                                <div class="row">
                                                    <div class="col-xs-4 micro_class_img">
                                                        <a target="_blank" rel="noopener" href="{{url('microlesson',['id'=>$v['id']])}}"><img src="{{asset('upload')}}/{{$v['thumb']}}" alt="{{$v['name']}}" /></a>
                                                    </div>
                                                    <div class="col-xs-8 micro_class_info">
                                                        <a target="_blank" rel="noopener" href="{{url('microlesson',['id'=>$v['id']])}}" class="micro_class_link">
                                                            <h5 class="nowrap micro_school">{{$v['school']}}</h5>
                                                            <p class="nowrap micro_p">{{$v['profession']}}</p>
                                                            <p class="nowrap micro_p">亿航原创考研课程</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- end item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="micro_class">
                    <!--热门院校 -->
                    <h4 class="title_blue micro_title">热门院校 热门专业</h4>
                    <div class="micro_container">
                        <div class="krakatoa_container">
                            <div class="krakatoa_micro">
                                @foreach($mlhot as $v1)
                                <div class="krakatoa_item">
                                    <!-- 微课 item -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($v1 as $k=>$v)
                                            <div class="col-xs-6 micro_class_item">
                                                <!-- 课程学校item -->
                                                <div class="row">
                                                    <div class="col-xs-4 micro_class_img">
                                                        <a target="_blank" rel="noopener" href="{{url('microlesson',['id'=>$v['id']])}}"><img src="{{asset('upload')}}/{{$v['thumb']}}" alt="{{$v['name']}}" /></a>
                                                    </div>
                                                    <div class="col-xs-8 micro_class_info">
                                                        <a target="_blank" rel="noopener" href="{{url('microlesson',['id'=>$v['id']])}}" class="micro_class_link">
                                                            <h5 class="nowrap micro_school">{{$v['school']}}</h5>
                                                            <p class="nowrap micro_p">{{$v['profession']}}</p>
                                                            <p class="nowrap micro_p">亿航原创考研课程</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            @endforeach
                                        </div>
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
        <!-- end class -->
        <div class="container">
            <!-- 四大优势 -->
            <div style="margin-bottom:50px;">
                <h3 class="title_blue margin_b_20">四大优势</h3>
                <div class="row">
                    <div class="col-sm-12 padding15 margin_b_25">
                        <p class="p20" style="color:#2ba8e1;text-align:center;">相比传统网课观看时间较长、耗时量大、知识吸收程度少等不足之处，“亿航微课堂”具有以下几大特点</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5" style="padding-left:7%;padding-right:7%;">
                        <img style="width:100%;" src="{{asset('static/frontend/images')}}/weike.png" alt="四大优势">
                    </div>
                    <div class="col-sm-7">
                        <div class="row four-adv">
                            <div class="col-sm-12">
                                <h4>1 针对性强</h4>
                                <p class="p20">内容更加精简，一小节即是一个考点，纯干货知识讲解</p>
                            </div>
                            <div class="col-sm-11 col-sm-offset-1">
                                <h4>2 高效学习</h4>
                                <p class="p20">高效利用“碎片时间”充分学习</p>
                            </div>
                            <div class="col-sm-11 col-sm-offset-1">
                                <h4>3 答疑解惑</h4>
                                <p class="p20">课后学习小组，公共课/专业课老师在线答疑</p>
                            </div>
                            <div class="col-sm-12">
                                <h4>4 考点切片</h4>
                                <p class="p20">连贯又独立，“哪里不会点哪里”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
