@extends('main')

@section('echarts')
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="https://cdn.bootcss.com/echarts/3.5.2/echarts.min.js"></script>
    <script type="text/javascript" src="js/echarts.js"></script>
    <script type="text/javascript" src="js/world.js"></script>
@stop

@section('maincontent')    
    <!--spots 主体容器-->
  <!--  <main class="spots-main-ctner container card">
        <!--APP详情-->
    <main class="container" style="padding-top: 13px;">
        <div class="spots-main-ctner">
            <div class="app-detail card row">
                <div class="col s1" style="padding-top: 12px;">
                    <a href="<!--APP对应的大致情况网页-->">
                        <img src="http://is5.mzstatic.com/image/thumb/Purple111/v4/11/65/10/116510d8-cae3-87c4-71f6-2f33b026b183/mzl.iqdpfwrh.png/175x175bb-85.jpg"
                        width="60" height="60" style="border-radius: 5px;" alt="app-picture">
                    </a>
                </div>
                <div class="col s10">
                    <p>
                    <h5>Faceu</h5>
                    <div class="update">
                        更新时间：
                        <span class="update-time">2017-04-22 09:21:22</span>
                    </div>
                    </p>
                </div>
                <div class="col s1" style="padding-top: 23px;">
                    <a class="btn-floating btn-middle red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
            <!--APP图表展示-->
            <div class="app-select card row">
                <div class="app-charts">
                    <!--APP下载量和评论数随时间变化部分-->
                    <div class="download-comment" style="padding-top: 30px;">
                        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->

                        <div id="main" style="width: 800px;height:300px;"></div>
                    </div>
                    <div  id="time1" style="padding-bottom: 50px;padding-left: 300px;">
                        <button id="week" class="btn btn-md">一周</button>
                        <button id="month" class="btn btn-md">一个月</button>
                        <button id="3month" class="btn btn-md">三个月</button>
                    </div>
                    <div class="app-emotional-analysis"></div>
                </div>
            </div>
            <div class="app-select card row">
                <div class="app-charts">

                    <!--APP情感词出现频次随时间变化部分-->
                    <div class="app-emotional-analysis" >
                        <br>
                        <div id="main1" ></div>
                        <div style="float: left;position: relative;width :400px">
                            <li class="select-list">
                                <dl class="">
                                    <dt>热词:</dt>
                                    <dd id="hotword1" class="box">画面</dd>
                                    <dd id="hotword2" class="box">内存</dd>
                                    <dd id="hotword3" class="box">版本</dd>
                                    <dd id="hotword4" class="box">像素</a></dd>
                                    <dd id="hotword5" class="box">广告</dd>
                                    <dd id="hotword6" class="box">手机</dd>
                                    <dd id="hotword7" class="box">垃圾</dd>
                                </dl>
                            </li>
                            <table border="1">
                                <tr class="com_main2">
                                    <td style="color: #ac2925 ;font-size: large">好评：</td>
                                </tr>
                                <tr class="com_main3">
                                    <td style="color: #ac2925 ;font-size: large">差评：</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="app-select card row">
                    {{--地图--}}
                <div class="app-charts">
                    <div class="app-emotional-analysis" >
                        <br>
                        <div id="main2" ></div>
                        <div style="padding-left:200px">
                            <table style="border: 1px;!important;">
                                <tr>
                                    <td>排名</td>
                                    <td>国家</td>
                                    <td>用户数量（万）</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>中国</td>
                                    <td>1298.465</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>美国</td>
                                    <td>1047.116</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>加拿大</td>
                                    <td>354.24</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>俄罗斯</td>
                                    <td>211.476</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>新西兰</td>
                                    <td>198.136</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>土耳其</td>
                                    <td>177.546</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>巴西</td>
                                    <td>154</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>日本</td>
                                    <td>152.833</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>德国</td>
                                    <td>83.404</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>瑞士</td>
                                    <td>78.534</td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('script')
    <script src="js/fresh.js"></script>
@stop
