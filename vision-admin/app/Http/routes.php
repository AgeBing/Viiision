<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('/','WelcomeController@index');
///*Route::get('/',function (){
//    $name=DB::connection()->getDataBaseName();
//    echo $name;
//});*/
//Route::get('/test1',['uses'=>'TestUserController@test1']);
//Route::get('User','TestUserController@test4');
    Route::get('excel/apps_import', 'ExcelController@apps_import');//app相关信息导入

/***zll学习***
//通过下面两个函数实现了url和页面的变化，将name的值传到了另一个页面里，写在as后面的相当于是一个url,可以让别人来访问你
Route::any('/hello/laravel/{id}',['as'=>'zll',function($id){
    return 'Hello Laravelcademy'.$id;
}]);
Route::any('/testNamedRoute/{name}',function($name){
   //return route('zll');//指向as后的字母，调用了一个叫route的函数
	return redirect()->route('zll',['id'=>$name]);
});


//通过function 把值传进来
Route::match(['get','post'],'/hello/{name?}',function($name="ggg"){
	//如果是单引号的话，{$name}原样输出，双引号就不一样,用单引号再加上点的形式把各个字符串连接起来
	return 'sHello '.$name.'!'; 
})->where('name','[A-Z a-z]+');

Route::any('/testPost',function(){
	$csrf_token = csrf_token();
    $form = <<<FORM
        <form action="/hello" method="POST">
            <input type="hidden" name="_token" value="{$csrf_token}">
            <input type="submit" value="Test"/>
        </form>
FORM;
    return $form;
});
//为什么要用middleware,新增文件后的整个流程是怎么样的啊？
Route::group(['middleware'=>'test'],function(){
    Route::get('/write/laravelacademy',function(){
        //使用Test中间件
        return redirect()->route('refuse');
    });
    Route::get('/update/laravelacademy',function(){
       //使用Test中间件
    });
});
Route::get('/age/refuse',['as'=>'refuse',function(){
    return "未成年人禁止入内！";
}]);
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//Route::group(['as' => 'admin::'], function () {
//    Route::get('dashboard', ['as' => 'dash', function () {
//        return "hellp";
//    }]);
//});
//Route::get('/test',function(){
//    return route('admin::dash');
//});
//Route::group(['middleware' => ['web']], function () {
//    //
//});
/***后台管理页面zll***/
/*Route::group(['prefix'=>'admin'],function (){
    Route::get('index',function(){
        return view('admin.index');
    });
});*/
/**zll**/

//Route::get('upload','StudentController@upload');



//Route::group(['middleware' => 'web'], function () {
//    Route::auth();
//
//    Route::get('/', 'HomeController@index');
//});
//文件上传
Route::get('/uploadfile','Admin\UploadFileController@index');
Route::post('/uploadfile','Admin\UploadFileController@showUploadFile');
//前缀
Route::group(['profix' => 'admin'], function () {
    //Route::group(['profix' => 'service'], function (){
    Route::post('servicelogin', 'Admin\IndexController@login');
    //});
    Route::get('index', 'Admin\IndexController@toIndex');
    Route::get('category', 'Admin\CategoryController@toCategory');
    Route::get('login', 'Admin\IndexController@toLogin');
    Route::get('category/add', 'Admin\CategoryController@toCategoryAdd');
    //有关评论的路由
    Route::get('comment', 'Admin\Comment\CommentController@toComment');
    Route::get('commentByPlatform','Admin\Comment\CommentController@toCommentByPlatform');
    Route::get('comment/appName/{appName}/date/{date}','Admin\Comment\CommentController@toAppNameAndDate');
    Route::get('comment/import','Admin\Comment\CommentController@toExcelImport');
    Route::get('comment/importFromInternet','Admin\Comment\CommentController@toUploadFromInternet');
    //用于测试
    Route::get('faceu_comment', 'Admin\Comment\faceu_commentController@toComment');
    Route::get('test','Admin\App\faceu_commentController@printList');
    Route::get('selectCommentByDay','Admin\App\Appcontroller@selectCommentByDay');
    //
    //有关用户的路由
    Route::get('user','Admin\User\UserController@toUser');//用户列表呈现
    Route::get('user/add','Admin\User\UserController@toAdd');//用户新增页面
    Route::get('user/save','Admin\User\UserController@toSave');//用户新增并保存
    Route::get('user/edit','Admin\User\UserController@toEdit');//用户信息编辑
    Route::get('user/delete/id/{id}','Admin\User\UserController@toDelete');//删除用户
    Route::get('user/user_word','Admin\User\UserController@toWord');//查看分词
    //有关app的路由
    Route::get('
}app','Admin\App\AppController@toApp');//app列表路由
    Route::get('appCategory','Admin\App\AppCategoryController@toAppCategory');//app分类路由
    Route::get('appCategory/add', 'Admin\App\AppCategoryController@toAppCategoryAdd');
    Route::get('appCategory/save','Admin\App\AppCategoryController@toSave');
    Route::get('selectByAppName','Admin\App\AppController@toSelectByAppName');
});

