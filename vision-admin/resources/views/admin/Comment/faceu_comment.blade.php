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
    <div class="text-c">APP选择:
        <select class="select-box inline">
            <option>option1</option>
            <option>option2</option>
        </select>
        日期选择：
        <a href="javascript:;" onclick="datadel()" class="btn btn-primary radius"></i> 昨天</a>
        <a href="javascript:;" onclick="datadel()" class="btn btn-primary radius"></i> 今天</a>
        <a href="javascript:;" onclick="datadel()" class="btn btn-primary radius"></i> 最近一周</a>
        <a href="javascript:;" onclick="datadel()" class="btn btn-primary radius"></i> 最近一个月</a>
        <input type="text" class="input-text" style="width:250px" placeholder="输入评论平台" id="" name="">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜平台</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            <a href="javascript:;" onclick="category_add('导入评论','/admin/comment/import')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 导入评论</a>
        </span>
        <span class="r">该页共有数据：<strong>{{count($faceu_comments)}}</strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                {{--<th width="80">序号</th>--}}
                <th width="100">内容</th>
                <th width="40">平台</th>
                <th width="100">评分</th>
                <th width="100">时间</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faceu_comments as $faceu_comment)
                <tr class="text-c">
                    <td><input type="checkbox" value="1" name=""></td>
                    {{--<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>--}}
                    <td>{{$faceu_comment->content}}</td>
                    <td>{{$faceu_comment->platform}}</td>
                    <td>{{$faceu_comment->rate}}</td>
                    <td>{{$faceu_comment->time}}</td>
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
    <div class="pull-right">
        {!! $faceu_comments->render() !!}
    </div>
</div>

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript">
    $(function(){
        $('.table-sort').dataTable({
            "aaSorting": [[ 1, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
            ]
        });

    });
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!',{icon: 6,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>
{{--新增的--}}
@section('my-js')
    <script type="text/javascript">
        function category_add(name,url){
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