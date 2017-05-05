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

Route::get('viewgraph', function () {
    return view('graph');
});
Route::get('viewcomments',function(){
	return view('comment');
});
Route::get('test',function(){
	return view('test');
});

//Route::get('index','CommentController@download_comment_bytime');

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

Route::group(['middleware' => ['web']], function () {
    Route::get('graph','GraphController@download_comment_bytime');
	Route::get('comments','CommentController@sort_comments');
	Route::get('keywords','GraphController@keyword_bytime');
	Route::get('keywordsGraph','KeywordController@keyword_bytime');
	Route::get('keyword_comments','CommentController@keyword_comment');
    Route::get('wordcloud_comments','CommentController@wordcloud_comment');
});
