@extends('admin.master')
@section('content')
<form class="form form-horizontal" id="form-category-add">
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="" placeholder="" id="adminName" name="name">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
        <div class="formControls col-xs-8 col-sm-9 skin-minimal">
            <div class="radio-box">
                <input name="sex" type="radio" id="sex-1" checked>
                <label for="sex-1">男</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="sex-2" name="sex">
                <label for="sex-2">女</label>
            </div>
        </div>
    </div>

    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
</form>
    @endsection
@section('my-js')
    <script>
    $("#form-app_category-add").validate({
    submitHandler:function(form){
    $('').ajaxSubmit({
    type: 'post',
    url: "/admin/appCategory/add" ,
    dataType:'json',
    success: function(data){
    layer.msg('添加成功!',{icon:1,time:1000});
    },
    error: function(XmlHttpRequest, textStatus, errorThrown){
    layer.msg('error!',{icon:1,time:1000});
    }
    });
    var index = parent.layer.getFrameIndex(window.name);
    parent.$('.btn-refresh').click();
    parent.layer.close(index);
    },});
    </script>
@endsection