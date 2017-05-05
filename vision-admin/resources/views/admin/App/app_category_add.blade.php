@extends('admin.master')
@section('content')
    {{--form的id传给js--}}
    <form class="form form-horizontal" id="form-app_category-add"action="/admin/appCategory/save">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>APP名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="app_name"name="AppCategory[app_name]"datatype="*" nullmsg="不能为空">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>APP类别：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="app_category" datatype="*"  name="AppCategory[app_category]"nullmsg="不能为空">
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