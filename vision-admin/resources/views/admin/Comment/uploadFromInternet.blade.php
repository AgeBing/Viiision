@extends('admin.master')
@section('content')
    {{--form的id传给js--}}
    <form class="form form-horizontal" id="form-app_category-add"action="">
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="APP store" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP编号：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="592331499" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="华为商城" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP编号：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="C178302" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="应用宝" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP包名：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="com.meitu.meiyancamera" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="豌豆荚" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP包名：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="com.meitu.meiyancamera" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="百度手机助手" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP包名：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="com.meitu.meiyancamera" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="360手机助手" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP包名：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="com.meitu.meiyancamera" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="oppo应用商店" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP编号：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="10518558" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="vivo应用商店" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP编号：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="48370" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="魅族应用商店" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">APP编号：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="888353" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">
                <span class="c-red">*</span>平台名称：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" value="" placeholder="" id="app_name"name=""datatype="*" nullmsg="不能为空">
            </div>
            <label class="form-label col-xs-2 col-sm-2">
                <span class="c-red">*</span>APP编号：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="" id="" datatype="*"  name=""nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-9 col-sm-10 col-xs-offset-5 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <input class="btn btn-default radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;">
            </div>
        </div>
    </form>
@endsection
@section('my-js')
    {{--找不到问题所在--}}
    <script type="text/javascript">
        $("#form-app_category-add").validate({
            rules:{
                app_name:{
                    required:true,
                    minlength:1,
                    maxlength:16
                },
                app_category:{
                    required:true,
                    minlength:1,
                    maxlength:16
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $('#form-app_category-add').ajaxSubmit({
                    type: 'get',//提交方式
                    url: "/admin/appCategory/add" ,//提交url
                    dataType:'json',
                    data:{
                        app_name:$('input[name=app_name]').val(),
                        app_category:$('input[name=app_category]').val(),
                        _token:"{{csrf_field()}}"
                    },
                    success: function(data){
                        alert('提交成功');
                        layer.msg('添加成功!',{icon:1,time:1000});
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    </script>
@endsection