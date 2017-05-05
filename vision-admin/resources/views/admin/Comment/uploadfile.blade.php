@extends('admin.master')
@section('content')
    <html>
    <body>

    <?php
    use App\Entity\Form;
    echo Form::open(array('url' => '/uploadfile','files'=>'true'));
    echo '选择一个要上传的文件：<br/>';
    echo Form::file('image');
    echo Form::submit('提交上传');
    echo Form::close();
    ?>
    </body>
    </html>