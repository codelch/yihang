@extends('layouts.frontend') @section('title','亿航微课 | 亿航教育') @section('nav')
<li><a href="{{url('/')}}">主页</a></li>
<li><a href="{{url('microlesson')}}">亿航微课</a></li>
<li class="active"><a href="{{url('course')}}">私教一对一</a></li>
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
    <div class="container-fluid sijiao_main" style="padding-bottom:55px;">
        <div class="container">
            <!-- 一对一课程核心 -->
            <div>
                <h3 class="title_blue">一对一课程核心</h3>
                <div class="row" style="padding-left:8%;padding-right:8%;">
                    <div class="col-sm-6">
                        <div class="center_img_max">
                            <img src="{{asset('static/frontend/images')}}//sj3.png" alt="一对一课程" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="one_to_one_items">
                            <span>A</span>
                            <div class="one_to_one_info">
                                <span>Professional analysis</span>
                                <h5>专业分析</h5>
                                <p>根据自身情况，学长协助对意向院校专业给予初试专业指导跟判断。</p>
                            </div>
                        </div>
                        <div class="one_to_one_items">
                            <span>B</span>
                            <div class="one_to_one_info">
                                <span>Review plan</span>
                                <h5>复习规划</h5>
                                <p>结合学员自身情况，制定针对性复习规划，高效提分。</p>
                            </div>
                        </div>
                        <div class="one_to_one_items">
                            <span>C</span>
                            <div class="one_to_one_info">
                                <span>Reference book</span>
                                <h5>参考书</h5>
                                <p>制定参考书，专业课复习更加有针对性。</p>
                            </div>
                        </div>
                        <div class="one_to_one_items">
                            <span>D</span>
                            <div class="one_to_one_info">
                                <span>The real test paper and notes</span>
                                <h5>真题笔记</h5>
                                <p>获得学长的复习笔记以及专业历年真题。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- 课程优势 -->
            <div style="margin-bottom:50px;padding-top:30px;" class="sijiao_kcys_container">
                <h3 class="title_blue">课程优势</h3>
                <div class="row" style="margin-top:33%;margin-bottom:11%;">
                    <div class="col-sm-6 sm_6_55">
                        &nbsp;
                    </div>
                    <div class="col-sm-6 sm_6_45">
                        <h5 class="h5_24" style="padding-left:25px;">6大辅导系统 复习零障碍</h5>
                        <ul class="list_line">
                            <li>一对一指导院校专业选择</li>
                            <li>提供优质课程，打造高效提分结果</li>
                            <li>打造专属复习目标</li>
                            <li>全程24小时答疑，复习难题及时解答</li>
                            <li>核心资料以及真题</li>
                            <li>全程2合1督学管理</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- 课程目录 -->
            <div>
                <h3 class="title_blue" style="margin-top:30px;">课程目录</h3>
                <div class="row kcml_row kcml_row_line">
                    <div class="col-sm-4 col-sm-offset-5">&nbsp;</div>
                    <div class="col-sm-3">专业课1V1全程班</div>
                </div>
                <div class="row kcml_row">
                    <div class="col-sm-4 col-sm-offset-5">1V1专业实战模考</div>
                    <div class="col-sm-3">1V1专业强化进阶</div>
                </div>
            </div>
            <div class="row table_row">
                <div class="col-sm-12">
                    <!-- 专业课 -->
                    <div class="table-responsive">
                        <table width="100%" class="table">
                            <tr>
                                <td class="td_color td_head">班型</td>
                                <td class="td_color">专业</td>
                                <td class="td_color" width="30%">课程说明</td>
                                <td class="td_color" width="30%">服务说明</td>
                                <td class="td_color">课时</td>
                                <td class="td_color">费用</td>
                            </tr>
                            <tr>
                                <td class="td_color" rowspan="7">专业课
                                    <br />1V1
                                    <br />全程班</td>
                                <td>管理学</td>
                                <td rowspan="7">针对基础只是不牢以及跨专业考研的学生所设置的从考研小白到学霸大神的全程跟踪服务式课程体系，让学生能够快速入门，迅速提高，最终取得专业课的高分</td>
                                <td rowspan="7" style="text-align:left;">1) 阶段学习规划
                                    <br />2) 高分在读学长学姐全程辅导
                                    <br />3) 知识点讲解梳理及重难点知识框架
                                    <br />4) 目标院校专业内部资料提供
                                    <br />5) 班主任全程督学导学
                                    <br />6) 学习量化监督服务
                                    <br />7) 考研资讯定期发放
                                    <br />8) 图书资料免费邮寄
                                    <br />9) 考研心理疏导
                                    <br />10) 教学服务档案
                                    <br />11) 一对一模拟测评
                                    <br />12) 辅导员全程答疑</td>
                                <td>40</td>
                                <td rowspan="7"><a href="javascript:;" data-toggle="modal" data-target="#imgModal">咨询</a></td>
                            </tr>
                            <tr>
                                <td>经济学</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>教育学</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>心理学</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>艺术学</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>医学</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>法学</td>
                                <td>40</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- end -->
                <div class="col-sm-12">
                    <!-- 专业实战模考 -->
                    <div class="table-responsive">
                        <table width="100%" class="table">
                            <tr>
                                <td class="td_color td_head">班型</td>
                                <td class="td_color">专业</td>
                                <td class="td_color" width="30%">课程说明</td>
                                <td class="td_color" width="30%">服务说明</td>
                                <td class="td_color">课时</td>
                                <td class="td_color">费用</td>
                            </tr>
                            <tr>
                                <td class="td_color" rowspan="7">1V1
                                    <br />专业实战
                                    <br />模考</td>
                                <td>管理学</td>
                                <td rowspan="7">针对有一定专业基础，希望进一步提升专业课技能的考研学子，灵活的授课时间，多样的授课方式，满足不同学生的百变需求</td>
                                <td rowspan="7" style="text-align:left;">1) 阶段学习规划
                                    <br />2) 高分在读学长学姐全程1v1辅导
                                    <br />3) 知识点讲解梳理及重难点知识框架
                                    <br />4) 目标院校专业内部资料提供
                                    <br />5) 学习量化监督服务
                                    <br />6) 考研资讯定期发放
                                    <br />7) 教学服务档案
                                    <br />8) 一对一模拟测评</td>
                                <td>20</td>
                                <td rowspan="7"><a href="javascript:;" data-toggle="modal" data-target="#imgModal">咨询</a></td>
                            </tr>
                            <tr>
                                <td>经济学</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>教育学</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>心理学</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>艺术学</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>医学</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>法学</td>
                                <td>20</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- end -->
                <div class="col-sm-12" style="margin-bottom:100px;">
                    <!-- 专业强化进阶 -->
                    <div class="table-responsive">
                        <table width="100%" class="table">
                            <tr>
                                <td class="td_color td_head">班型</td>
                                <td class="td_color">专业</td>
                                <td class="td_color" width="30%">课程说明</td>
                                <td class="td_color" width="30%">服务说明</td>
                                <td class="td_color">课时</td>
                                <td class="td_color">费用</td>
                            </tr>
                            <tr>
                                <td class="td_color" rowspan="7">1V1
                                    <br />专业强化
                                    <br />进阶</td>
                                <td>管理学</td>
                                <td rowspan="7">提高实战能力，练就考场使用技巧，考试时间合理分配，提高得分率。使学员感受考场氛围，培养临场应试状态和心态，帮助学员直达高分</td>
                                <td rowspan="7" style="text-align:left;">1) 阶段学习规划
                                    <br />2) 高分在读学长学姐全程1v1辅导
                                    <br />3) 知识点讲解梳理及重难点知识框架
                                    <br />4) 目标院校专业内部资料提供
                                    <br />5) 学习量化监督服务
                                    <br />6) 教学服务档案
                                    <br />7) 一对一模拟测评</td>
                                <td>10</td>
                                <td rowspan="7"><a href="javascript:;" data-toggle="modal" data-target="#imgModal">咨询</a></td>
                            </tr>
                            <tr>
                                <td>经济学</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>教育学</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>心理学</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>艺术学</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>医学</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>法学</td>
                                <td>10</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- end -->
            </div>
            <!-- table row -->
        </div>
        <div class="container">
            <div>
                <div class="row sijiao_baozhang_container">
                    <div class="col-sm-6">
                        &nbsp;
                    </div>
                    <div class="col-sm-6">
                        <h4>一对一辅导 签约有保障</h4>
                        <p class="p20">承诺：20个工作日内配备师资，配备不到全额退款</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 20%;">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0px;">
                    <img src="{{asset('static/frontend/images')}}//wx.png" alt="" style="width:100%;">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
@endsection
