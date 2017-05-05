<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller
{
    public function index()
    {
        return view('admin.Comment.uploadfile');
    }
    public function showUploadFile(Request $request){
        $file = $request->file('image');

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
    }
    //文件上传表单
//    public function getFileupload()
//    {
//        $postUrl = '/request/fileupload';
//        $csrf_field = csrf_field();
//        $html = <<<CREATE
//        <form action="$postUrl" method="POST" enctype="multipart/form-data">
//        $csrf_field
//        <input type="file" name="file"><br/><br/>
//        <input type="submit" value="提交"/>
//        </form>
//        CREATE;
//        return $html;
//    }
//
//        //文件上传处理
//    public function showUploadFile(Request $request){
//         //判断请求中是否包含name=file的上传文件
//    if(!$request->hasFile('file')){
//        exit('上传文件为空！');
//    }
//    $file = $request->file('file');
//    //判断文件上传过程中是否出错
//    if(!$file->isValid()){
//        exit('文件上传出错！');
//    }
//    $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
//    $savePath = 'test/'.$newFileName;
//    $bytes = Storage::put(
//        $savePath,
//        file_get_contents($file->getRealPath())
//    );
//    if(!Storage::exists($savePath)){
//        exit('保存文件失败！');
//    }
//    header("Content-Type: ".Storage::mimeType($savePath));
//    echo Storage::get($savePath);
}
