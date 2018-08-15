@extends('layouts.frontend') @section('title','主页 | 亿航教育') @section('nav')
<li class="active"><a href="{{url('/')}}">主页</a></li>
<li><a href="{{url('microlesson')}}">亿航微课</a></li>
<li><a href="{{url('course')}}">私教一对一</a></li>
<li><a href="{{url('teacher')}}">师资团队</a></li>
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
        <div class="container" style="padding:0px 5%;">
            <div class="row">
                <div class="col-sm-3">
                    <div>99%
                        <br><span>升学率</span></div>
                </div>
                <div class="col-sm-3">
                    <div>5500
                        <br><span>在校生</span></div>
                </div>
                <div class="col-sm-3">
                    <div>136
                        <br><span>合作院校</span></div>
                </div>
                <div class="col-sm-3">
                    <div>300
                        <br><span>科目专业</span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="container-fluid" style="padding-bottom:55px;">
        <div class="container">
            <!-- 亿航特色 -->
            <div>
                <h3 class="title_blue">亿航特色</h3>
                <div class="row">
                    <div class="col-sm-3 yhts_index">
                        <div>
                            <img src="{{asset('static/frontend/images')}}/tese1.png" alt="在线直播">
                        </div>
                        <h4 class="h4_style">在线直播</h4>
                        <p>专业课线上直播，线下录播，反复观看，自由灵活</p>
                    </div>
                    <div class="col-sm-3 yhts_index">
                        <div>
                            <img src="{{asset('static/frontend/images')}}/tese2.png" alt="考研计划">
                        </div>
                        <h4 class="h4_style">考研计划</h4>
                        <p>互联网教育，老师学生交流更紧密，难点考点随时问，答疑解惑更及时</p>
                    </div>
                    <div class="col-sm-3 yhts_index">
                        <div>
                            <img src="{{asset('static/frontend/images')}}/tese3.png" alt="专业指导">
                        </div>
                        <h4 class="h4_style">专业指导</h4>
                        <p>一对一教学，针对性更强，根据学院的实际情况和专业特点因材施教，查漏补缺</p>
                    </div>
                    <div class="col-sm-3 yhts_index">
                        <div>
                            <img src="{{asset('static/frontend/images')}}/tese4.png" alt="教学答疑">
                        </div>
                        <h4 class="h4_style">教学答疑</h4>
                        <p>互联网教育，老师学生交流更紧密，难点考点随时问，答疑解惑更及时</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- 私教一对一 -->
            <div style="margin-bottom:50px;">
                <h3 class="title_blue">私教一对一</h3>
                <div class="row">
                    <div class="col-sm-6 sm_6_45">
                        <img style="width:100%;" src="{{asset('static/frontend/images')}}/sijiao.png" alt="私教一对一">
                    </div>
                    <div class="col-sm-6 sm_6_55">
                        <p class="p20">根据学员自身基础一对一指导院校专业选择
                            <br>提供优质课程，打造高效提分结果
                            <br>配套复习计划，打造专属复习目标
                            <br>全程24小时答疑，复习难题及时解答
                            <br>核心资料及真题
                            <br>全程2合1督学管理</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-bottom:70px;">
            <!-- 亿航微课 -->
            <div>
                <h3 class="title_blue">亿航微课</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="krakatoa_container" style="height:630px;">
                            <div class="krakatoa">
                                <div class="krakatoa_item">
                                    <span>法律硕士</span>
                                    <div><img src="{{asset('static')}}/frontend/images/class_1.png" alt="法律硕士" /></div>
                                </div>
                                <div class="krakatoa_item">
                                    <div><img src="{{asset('static')}}/frontend/images/class_2.png" alt="西医综合" /></div>
                                    <span>西医综合</span>
                                </div>
                                <div class="krakatoa_item">
                                    <span>计算机</span>
                                    <div><img src="{{asset('static')}}/frontend/images/class_3.png" alt="计算机" /></div>
                                </div>
                                <div class="krakatoa_item">
                                    <div><img src="{{asset('static')}}/frontend/images/class_4.png" alt="翻译硕士" /></div>
                                    <span>翻译硕士</span>
                                </div>
                                <div class="krakatoa_item">
                                    <span>会计硕士</span>
                                    <div><img src="{{asset('static')}}/frontend/images/class_5.png" alt="会计硕士" /></div>
                                </div>
                                <!--same as top for test -->
                                <div class="krakatoa_item">
                                    <div><img src="{{asset('static')}}/frontend/images/class_2.png" alt="西医综合" /></div>
                                    <span>西医综合</span>
                                </div>
                                <div class="krakatoa_item">
                                    <span>计算机</span>
                                    <div><img src="{{asset('static')}}/frontend/images/class_3.png" alt="计算机" /></div>
                                </div>
                                <div class="krakatoa_item">
                                    <div><img src="{{asset('static')}}/frontend/images/class_4.png" alt="翻译硕士" /></div>
                                    <span>翻译硕士</span>
                                </div>
                                <div class="krakatoa_item">
                                    <span>会计硕士</span>
                                    <div><img src="{{asset('static')}}/frontend/images/class_5.png" alt="会计硕士" /></div>
                                </div>
                                <div class="krakatoa_item">
                                    <div><img src="{{asset('static')}}/frontend/images/class_1.png" alt="法律硕士" /></div>
                                    <span>法律硕士</span>
                                </div>
                                <!-- end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-width" style="background-color:#ebf6f9">
            <div class="container">
                <!-- 关于亿航 -->
                <div>
                    <h3 class="title_blue" style="margin:10px auto;">关于亿航</h3>
                    <div class="row">
                        <div class="col-sm-6 sm_6_45">
                            <div>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div class="col-sm-6 sm_6_55">
                            <p class="p20" style="color:#2ba8e1;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;亿航教育，成立于2012年。成立以来，专注于考研专业课的培训领域，为广大学生考取更高的学历研究生提供专业课方面的培训，秉承着以“服务创造价值、服务赢得尊重、服务打造品牌”为精神，以争做教育行业领航者为使命，以“成为最具实力和影响力的教育企业”为愿景，使亿航成为教育行业新生力量的品牌。在多年的发展中，已拥有海量985 211等一线学府优秀师资储备，亿航教育依托强大平台优势以及在研究生群体中良好的口碑传播效应，在考研学生群体中获得了不错的满意度。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div>
                <div class="row about_index" style="background-color:#f5f5f5">
                    <div class="col-sm-6" style="padding-top:35px;padding-bottom:35px;z-index:31;">
                        <div class="about_index_txt">
                            <p style="color:#2ba8e1;">
                                亿航教育凭借独特的资源优势，打造了独具特色的专业课一对一辅导模式，全面覆盖线下的面对面授课及线上的网络授课，同时借助互联网优势，创建了独特的微课体系：“亿航微课堂”
                            </p>
                            <div>
                                <img src="{{asset('static/frontend/images')}}/about_index2.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="z-index:30;background-color:#fff;padding-left:0px;"><img src="{{asset('static/frontend/images')}}/about_index1.jpg" alt="关于亿航" style="width:100%;"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- 考研全年复习时刻表 -->
            <div>
                <h3 class="title_blue">考研全年复习时刻表</h3>
                <div class="row">
                    <div class="col-sm-3 fuxi_index">
                        <h4 class="title_blue">1月-2月</h4>
                        <div class="blue_line"></div>
                        <p class="p20">
                            了解考研内容
                            <br> 听一听考研形势的讲座，全面了解报考专业的情况，准备进入复习阶段
                            <br>
                            <br>
                            <br>导学班
                            <br>准备阶段
                        </p>
                    </div>
                    <div class="col-sm-3 fuxi_index">
                        <h4 class="title_blue">3月-5月</h4>
                        <div class="blue_line"></div>
                        <p class="p20">
                            基础知识的复习，对各科基础知识点进行整体复习，全面细致了解和掌握基础知识点，结合课后习题进行掌握
                            <br>
                            <br>基础班
                            <br>基础阶段
                        </p>
                    </div>
                    <div class="col-sm-3 fuxi_index">
                        <h4 class="title_blue">6月-8月</h4>
                        <div class="blue_line"></div>
                        <p class="p20">
                            强化知识点
                            <br>分析了解各科的一级重要知识点，建立起完整的只是框架，并根据重点、难点进行攻克
                            <br>
                            <br>强化班
                            <br>强化阶段
                        </p>
                    </div>
                    <div class="col-sm-3 fuxi_index">
                        <h4 class="title_blue">9月-10月</h4>
                        <div class="blue_line"></div>
                        <p class="p20">
                            关注各招生单位的招生简章和专业计划，并对专业课复习计划作出适当调整；启动历年真题的练习
                            <br>
                            <br>
                            <br>冲刺班
                            <br>冲刺阶段
                        </p>
                    </div>
                    <div class="col-sm-3 fuxi_index">
                        <h4 class="title_blue">11月-12月</h4>
                        <div class="blue_line"></div>
                        <p class="p20">
                            按照知识框架整体回顾，按照考研的时间安排，进行模拟题的练习
                            <br>
                            <br>
                            <br>
                            <br>点睛班
                            <br>点睛阶段
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- 联系我们 -->
            <div>
                <h3 class="title_blue" style="margin-bottom:25px;">联系我们</h3>
                <p style="color:#2ba8e1;text-align:center;margin-bottom:25px;">
                    <br> 电话：010-56137996
                    <br> 微信：s15600495678
                </p>
                <div class="row contact_index">
                    <div class="col-sm-4">
                        <div><img src="{{asset('static/frontend/images')}}/gzh.png"></div>
                    </div>
                    <div class="col-sm-4">
                        <div><img src="{{asset('static/frontend/images')}}/wb.png"></div>
                    </div>
                    <div class="col-sm-4">
                        <div><img src="{{asset('static/frontend/images')}}/wx.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
