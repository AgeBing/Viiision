@extends('main')

@section('maincontent')
    <!--spots 主体容器-->
    <main class="container">
        <div class="spots-main-ctner" style="padding-top: 13px;">
            <!--APP详情-->
            <div class="app-detail card row">
                <div class="col s1" style="padding-top: 13px;">
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
                    <a class="btn-floating btn-middle red" >
                        <i class="large material-icons teal">add</i>
                    </a>
                </div>
            </div>
            <!--APP条件选择-->
            <div class="app-select card row">
                <ul class="select">
                    <li class="select-list ">
                        <dl id="select1">
                            <dt>时间：</dt>
                            <!-- <dd class="select-all selected"><a href="#">全部</a></dd>   -->
                            <dd><a href="#" class="box">一周</a></dd>
                            <dd><a href="#" class="box ">一个月</a></dd>
                            <dd><a href="#" class="box">三个月</a></dd>
                        </dl>
                    </li>
                    <li class="select-list">
                        <dl id="select2">
                            <dt>平台：</dt>
                            <!--  <dd class="select-all selected"><a href="#">全部</a></dd>  -->
                            <dd><a href="#" class="box">小米应用商店</a></dd>
                            <dd><a href="#" class="box">360手机助手</a></dd>
                            <dd><a href="#" class="box">vivo应用商店</a></dd>
                            <dd><a href="#" class="box">魅族应用商店</a></dd>
                            <dd><a href="#" class="box">oppo应用商店</a></dd>
                            <dd><a href="#" class="box">应用宝</a></dd>
                            <dd><a href="#" class="box">豌豆荚</a></dd>
                            <dd><a href="#" class="box">AppStore</a></dd>
                        </dl>
                    </li>
                    <li class="select-list">
                        <dl id="select3">
                            <dt>星级：</dt>
                            <!-- <dd class="select-all selected"><a href="#">全部</a></dd>   -->
                            <dd><a href="#" class="box">一星</a></dd>
                            <dd><a href="#" class="box">二星</a></dd>
                            <dd><a href="#" class="box">三星</a></dd>
                            <dd><a href="#" class="box">四星</a></dd>
                            <dd><a href="#" class="box">五星</a></dd>
                        </dl>
                    </li>
                    <li class="select-result">
                        <dl>
                            <dt>已选条件：</dt>
                            <dd class="select-no"></dd>
                        </dl>
                    </li>
                    {{--<div style="width:100px;">--}}
                        {{--<input type="text"  id="search1">--}}
                        {{--<button id="add1" class="btn btn-md"> 搜索 </button>--}}
                    {{--</div>--}}
                    <li class="select-list">
                        <dl>
                            <dt>关键词：</dt>
                            <dd ><input type="text"  id="search1"></dd>
                            <a id='add1' class="btn-floating btn-middle red" href="javascript:void(0)" onclick="search_comment()">
                                <i  class="large material-icons teal">search</i>
                            </a>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="list-top">
                <span>
                    该时间段共有：
                    <span class="comment-number">
                        205654
                    </span>
                    条评论
                </span>
            </div>
            <!--APP评论-->
            <div class="app-comment card row">
                <table class="table-of-contents">
                    <tbody>
                    <tr class="com_main">
                        <th>用户名</th>
                        <th>内容</th>
                        <th>星级</th>
                        <th>发表时间</th>
                        <th>数据源</th>
                    </tr>
                    </tbody>
                </table>
                <!--评论分页-->
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </main>
@stop
