<?php

namespace App\Http\Controllers\Admin\App;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\App;
use DB;


class AppController extends Controller
{
    //
    public function toApp()
    {
        $apps=App::all();
        return view('admin.App.app')->with('apps',$apps);
    }
//    public function toSelectByAppName()
//    {
//        $apps=DB::table('app_info ')->where('platform','=','平台1')->get();
//        return view('admin.app')->with('apps',$apps);
//    }
     public function selectCommentByDay()
     {
         //$apps=App::where([])->orderBy('date','desc')->get();
         //printf("Now: %s", Carbon::now());
         $dt=Carbon::now();//2017-4-11格式
        //printf($dt);
         //$apps=App::whereBetween('comment_count',[10,500])->get();//查找某一区间
         //$apps=App::where('platform','=','oppo');

//         $apps=App::whereBetween('app_date',[Carbon::now()->subDays(13)->toDateString(),Carbon::now()->toDateString()])
//             ->where('app_platform','=','360')
//             ->select('app_download_count','app_date')
//             ->distinct()->get();//选择近一周之内的所有数据


//         orwhere只要符合条件之一的都可以
//         $apps=DB::table('app_info')
//                    ->whereBetween('date',[Carbon::now()->subDays(7)->toDateString(),Carbon::now()->toDateString()])
//                    ->orWhere(function ($query){
//                        $query->where('comment_count','>',500)
//                          ->where('platform','oppo');
//                    })
//                    ->get();
         // $apps=DB::table('app_info')->whereRaw('')
         //$apps=App::where('date','>=',$dt->subDays(7) )->orwhere('date','<=',$dt)->get();
         //$dt->between($dt->subDays(10),$dt,true);
         //var_dump($dt);
         //$apps=DB::table('app_info')->groupBy('app_name')->get();
         //$apps=DB::select('select *from 'app_info' where date between '$dt->subDays(7)' and '$dt'');
         //读取从表单中输入的信息
         //phpUser::whereBetween('created_at', [Input::get('startTime'), Input::get('endTime')])->get();
//         return $apps;
         $time_range = 7;
         $platform = '360';
         $app_name = 'meiyan';
         $weekage = Carbon::now()->subDays($time_range)->toDateString();
         //echo $weekage;
         $download_comment_bytime = DB::table('app_info')
             ->whereBetween('app_date',[$weekage,Carbon::now()->toDateString()])
             ->where(['app_platform'=>$platform,'app_name'=>$app_name])
             ->select('app_download_count','app_date')
             ->get();
       //return $download_comment_bytime;
       return view('welcome')->with('data',$download_comment_bytime);
     }
}
