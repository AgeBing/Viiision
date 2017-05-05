<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use DB;
use Carbon\Carbon;



class GraphController extends Controller
{
	public function download_comment_bytime(Request $request)
	{
		//set the parameters

		$time_range = $request->time_range;
		// $app_name = $request->app_name;
		// $platform = $request->platform;

		//data store into the varible
		
		//$time_range = 7;
		$platform = 'meizu';
		$app_name = 'faceu';
		$weekage = Carbon::now()->subDays($time_range)->toDateString();
		//echo $weekage;
		$download_comment_bytime = DB::table('app_info')
										->whereBetween('app_date',[$weekage,Carbon::now()->toDateString()])
										->where(['app_platform'=>$platform,'app_name'=>$app_name])
										->select('app_download_count','app_comment_count','app_date')
										->get();
		
		return $download_comment_bytime;
//        return view('garph')->with('download_comment_bytime',$download_comment_bytime)
	}


	public function keyword_bytime()
	{
		@header("content-Type: text/html; charset=UTF-8");

		$app_name = 'faceu';
		$keyword_bytime = DB::table('keywords')
								->where(['app_name'=>$app_name])
								->select('keyword','weight','time')
								->orderBy('time','asc')
								->orderBy('keyword','decs')
								->get();
		//var_dump($keyword_bytime);
		$i=0;
		$keyword_array=[];
		for($i=0;$i<count($keyword_bytime);$i++)
		{
			$keyword_array[$i]['keyword'] = $keyword_bytime[$i]->keyword;
			$keyword_array[$i]['data']['weight'] = $keyword_bytime[$i]->weight;
			$keyword_array[$i]['data']['time'] = $keyword_bytime[$i]->time;
		}
		return $keyword_array;
	}
}