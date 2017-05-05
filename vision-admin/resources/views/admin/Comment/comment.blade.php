{{--点击评论列表显示界面--}}
@extends('admin.master')
@section('content')
        <!DOCTYPE HTML>
<html>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span> 评论管理
    <span class="c-gray en">&gt;</span> 评论列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <form class="text-c" method="GET" action="/admin/commentByPlatform">
        APP选择:
        <select class="select-box inline" name="appName"size="1" name="appSelect" >
            <option value="meiyan">meiyan</option>
            <option value="ins">ins</option>
            <option value="faceu">faceu</option>
        </select>
        {{--<input type="text" class="input-text" style="width:250px" placeholder="输入APP名称"  name="appSelect">--}}
        {{--<button type="submit" class="btn btn-success radius" ><i class="Hui-iconfont">&#xe665;</i> 搜APP</button>--}}

        日期选择：
        <select class="select-box-time inline" name="date"size="1" name="" >
            <option value="0">今天</option>
            <option value="1">昨天</option>
            <option value="7">最近一周</option>
            <option value="31">最近一个月</option>
        </select>
        {{--<a href="javascript:;" onclick="datadel()" class="btn btn-primary radius" ></i> 昨天</a>--}}
        {{--<a href="javascript:;" onclick="datadel()" class="btn btn-primary radius"></i> 今天</a>--}}
        {{--<a href="javascript:;" onclick="datadel()" class="btn btn-primary radius"></i> 最近一周</a>--}}
        {{--<a href="/admin/commentByPlatform" onclick="datadel()" class="btn btn-primary radius" ></i> 最近一个月</a>--}}

        <input type="text" class="input-text" style="width:250px" placeholder="输入评论平台"  name="platform">
        <button type="submit" class="btn btn-success radius" ><i class="Hui-iconfont">&#xe665;</i> 搜平台</button>
    </form>

    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            <a href="/admin/comment/import"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>本地导入</a>
            <a href="/admin/comment/importFromInternet"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>网上导入</a>
        </span>
        <span class="r count">共有数据：<strong>{{count($comments)}}</strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">内容</th>
                <th width="40">平台</th>
                <th width="40">评分</th>
                <th width="40">时间</th>
                <th width="40">操作</th>
            </tr>
            </thead>
            <tbody class="tbody">
            @foreach($comments as $comment)
                <tr class="text-c">
                    <td><input type="checkbox" value="1" name=""></td>
                    {{--<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>--}}
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->platform}}</td>
                    <td>{{$comment->score}}</td>
                    <td>{{$comment->date}}</td>
                    <td class="td-manage">
                        {{--<a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> --}}
                        <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                        <a style="text-decoration:none" class="ml-5" onClick="change_comment('修改评论','url','10001','600','270')" href="javascript:;" title="修改评论"><i class="Hui-iconfont">&#xe63f;</i></a>
                        <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{--<div style="float:left;">--}}
        {{--{!! $comments->render() !!}--}}
    {{--</div>--}}
    {{--<div class="pagination">--}}
        {{--<ul >--}}
            {{--<li class="previous {{ ($comments->currentPage() == 1) ? ' disabled' : '' }}">--}}
                {{--<a href="{{ $comments->url(1) }}"><i class="chevron left icon"></i></a>--}}
            {{--</li>--}}
            {{--@for ($i = 1; $i <= $comments->lastPage(); $i++)--}}
                {{--<li class="{{ ($comments->currentPage() == $i) ? ' active' : '' }}">--}}
                    {{--<a href="{{ $comments->url($i) }}" style="float:left;"><span>{{ $i }} </span></a>--}}
                {{--</li>--}}
            {{--@endfor--}}
            {{--<li class="next {{ ($comments->currentPage() == $comments->lastPage()) ? ' disabled' : '' }}">--}}
                {{--<a href="{{ $comments->url($comments->currentPage()+1) }}">--}}
                    {{--<i class="chevron right icon"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
</div>

{{--新增的--}}
@section('my-js')
    <script >
        function selectPlatform(){
            var date=$('.select-box-time option:selected').val();
            var appName =$('.select-box option:selected').val();
            console.log(date);
            console.log(appName);
           $.ajax({
               type:'get',
               url:'/admin/commentByPlatform/appName/'+appName+'/date/'+date,
               dataType:'json',
               success: function () {
                     alert('成功');
                     layer.msg('成功!', {icon: 1, time: 1000});
               },
               error: function (XmlHttpRequest, textStatus, errorThrown) {
                   layer.msg('error!', {icon: 1, time: 1000});
               }

           })
        }
    </script>
    {{--对于下拉框内容进行监听--}}
    <script>
        var date=$('.select-box-time option:selected').val();
        $('.select-box-time').change(function(event){
            _getTimeandApp();
        });
        $('.select-box').change(function(event){
            _getTimeandApp();
        });
        function _getTimeandApp(){
            var date=$('.select-box-time option:selected').val();
            var appName =$('.select-box option:selected').val();
            //var platform =document.getElementsByName("platform");
            //console.log(platform);
            //console.log(appName);
            $.ajax({
                type:'get',
                url:'/admin/comment/appName/'+appName+'/date/'+date,
                dataType:'json',
                success: function (data) {
                    $('.count').html('');
                    var count='共有数据：'+
                        '<strong>'+data.length+'</strong> 条';
                        $('.count').append(count);
                    $('.tbody').html('');
                    for(var i=0;i<data.length;i++){
                        //console.log(1);
                        var node=
                            '<tr class="text-c">'+
                            '<td><input type="checkbox" value="1" name=""></td>'+
                            '<td>'+data[i].content+'</td>'+
                            '<td>'+data[i].platform+'</td>'+
                            '<td>'+data[i].score+'</td>'+
                            '<td>'+data[i].date+'</td>'+
                            '<td class="td-manage">'+
                            '<a title="编辑" href="javascript:;" onclick="member_edit("编辑")" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>'+
                            '<a style="text-decoration:none" class="ml-5" onClick="change_comment("修改评论","url")" href="javascript:;" title="修改评论"><i class="Hui-iconfont">&#xe63f;</i></a>'+
                            '<a title="删除" href="javascript:;" onclick="" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>'+
                            '</td>'+
                            '</tr>'+
                            $('.tbody').append(node);
                    }
                },
                error: function (XmlHttpRequest, textStatus, errorThrown) {
                    layer.msg('error!', {icon: 1, time: 1000});
                }
            })
        }
    </script>
    {{--<script>--}}
        {{--var appName =$('.select-box option:selected').val();--}}
        {{--$('.select-box').change(function(event){--}}
            {{--_getAppName();--}}
        {{--});--}}
        {{--function _getAppName(){--}}
            {{--var appName =$('.select-box option:selected').val();--}}
            {{--$.ajax({--}}
                {{--type: 'get',--}}
                {{--url: '/admin/commentByPlatform/appName/' + appName,--}}
                {{--dataType: 'json',--}}
                {{--success: function (data) {--}}
                   {{--// alert('成功');--}}
                  {{--//  layer.msg('成功!', {icon: 1, time: 1000});--}}
{{--//                    清空原有列表--}}
                    {{--$('.tbody').html('');--}}
                     {{--for(var i=0;i<data.data.length;i++){--}}
                         {{--//console.log(1);--}}
                         {{--var node=--}}
                    {{--'<tr class="text-c">'+--}}
                        {{--'<td><input type="checkbox" value="1" name=""></td>'+--}}
                        {{--'<td>'+data.data[i].content+'</td>'+--}}
                        {{--'<td>'+data.data[i].platform+'</td>'+--}}
                        {{--'<td>'+data.data[i].score+'</td>'+--}}
                        {{--'<td>'+data.data[i].date+'</td>'+--}}
                        {{--'<td class="td-manage">'+--}}
                        {{--'<a title="编辑" href="javascript:;" onclick="member_edit("编辑")" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>'+--}}
                    {{--'<a style="text-decoration:none" class="ml-5" onClick="change_comment("修改评论","url")" href="javascript:;" title="修改评论"><i class="Hui-iconfont">&#xe63f;</i></a>'+--}}
                    {{--'<a title="删除" href="javascript:;" onclick="" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>'+--}}
                    {{--'</td>'+--}}
                    {{--'</tr>'+--}}
                        {{--$('.tbody').append(node);--}}
                    {{--}--}}
                {{--},--}}
                {{--error: function (XmlHttpRequest, textStatus, errorThrown) {--}}
                    {{--layer.msg('error!', {icon: 1, time: 1000});--}}
                {{--}--}}
            {{--})--}}
        {{--}--}}

    {{--</script>--}}
    <script type="text/javascript">
        function comment_add(name,url){
            var index = layer.open({
                type: 2,
                title: name,
                content: url
            });
            layer.full(index);
        }
    </script>
@endsection
</body>

</html>