@extends('admin.master')
@section('content')
        <!DOCTYPE HTML>
<html>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户管理
    <span class="c-gray en">&gt;</span> 用户管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            <a href="javascript:;" onclick="user_add('添加用户','/admin/user/add')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a>
        </span>
        <span class="r">共有用户：<strong>{{count($users)}}</strong> 名</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="100">用户名</th>
                <th width="40">性别</th>
                <th width="40">密码</th>
                <th width="40">组别</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="text-c">
                    <td><input type="checkbox" value="1" name=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->sex}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->class}}</td>
                    <td class="td-manage">
                        <a title="编辑" href="javascript:;" onclick="member_add('编辑','/admin/User/edit')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                        <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
                        <a title="删除" href="javascript:;" onclick="member_del(this,'{{$user->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
    //点击编辑后跳出的界面
    function member_add(title,url){
        layer_show(title,url);
    }
    /*用户-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }

    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,id,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function member_del(obj,id){
            $.ajax({
                type: 'get',
                url: '/admin/user/delete/id/'+id,
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();  //删除显示栏中的一整行
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
    }
</script>
{{--新增的--}}
@section('my-js')
    <script type="text/javascript">
        /*用户-添加*/
        function user_add(name,url){
            var index = layer.open({
                type: 2,
                title: name,
                content: url
            });
            layer.full(index);
        }
        /*用户-编辑*/
        function member_add(title,url){
            layer_show(title,url);
        }
    </script>
@endsection
</body>
</html>