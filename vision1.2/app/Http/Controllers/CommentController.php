<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
use DB;
use Carbon\Carbon;


class CommentController extends Controller
{
	public function sort_comments(Request $request)
	{
		//get request from the front end

		// $app_name = $request->app_name;


		$time_range = intval($request->time_range);
		$platform = $request->platform;
		$score = intval($request->score);
		// $score = 5;
		//if given the starting point and the end point
		// $starting_point = $request->starting_point;
		// $end_point = $request->point;

		//store data into a variable
		$app_name = 'faceu';
		// $time_range = intval('7');
		// $score = intval('0');
		// $platform = 'AppStore';
		//$numberOfPage = 
		$before_time_point = Carbon::now()->subDays($time_range)->toDateString();
		$app_table = $app_name.'_comment';
		if($score == -1&&$platform == '0')
		{
			$comments=DB::table($app_table)
						->whereBetween('date',[$before_time_point,Carbon::now()->toDateString()])
						// ->where(['platform'=>$platform,
						// 		    'score'=>$score])
						->get();	
		}
		elseif($score == -1 &&$platform != '0')
		{
			$comments=DB::table($app_table)
						->whereBetween('date',[$before_time_point,Carbon::now()->toDateString()])
						->where(['platform'=>$platform])
						->get();
		}
		elseif ($score != -1&&$platform == '0')
		{
			$comments=DB::table($app_table)
						->whereBetween('date',[$before_time_point,Carbon::now()->toDateString()])
						->where(['score'=>$score])
						->get();
		}
		elseif ($score != -1&&$platform != '0') 
		{
			$comments=DB::table($app_table)
						->whereBetween('date',[$before_time_point,Carbon::now()->toDateString()])
						->where(['platform'=>$platform,
								    'score'=>$score])
						->get();	
		}
						//echo $time_range;
		return $comments;
		//return $comments;
	}

	public function keyword_comment(Request $request)
    {
        $keyword=$request->input('keyword');
        $keyword_pattern='%'.$keyword.'%';
        $comment=DB::table('faceu_comment')
                        ->where('content','like',$keyword_pattern)
                        ->get();
        return $comment;
    }
    public function wordcloud_comment(Request $request)
    {
        $keyword=$request->keyword;
        $keyword_pattern='%'.$keyword.'%';
        $comment=DB::table('faceu_comment')
            ->where('content','like',$keyword_pattern)
            ->select('content','score')
            ->distinct()
            ->get();
        return $comment;
    }
}
