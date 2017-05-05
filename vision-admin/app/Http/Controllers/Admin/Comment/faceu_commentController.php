<?php

namespace App\Http\Controllers\Admin\Comment;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\faceu_comment;
use DB;
class faceu_commentController extends Controller
{
    //
    public function toComment()
    {
        //$faceu_comments=faceu_comment::all();
        $faceu_comments=faceu_comment::paginate(20);//每页显示20条
        //将categories输出到视图
        return view('admin.Comment.faceu_comment',['faceu_comments'=>$faceu_comments]);
    }
    public function printList()
    {
//        $faceu_comments=DB::table('faceu_comments')
//                            ->select('content','rate','platform')
//                            ->get();
//        return $faceu_comments;
        $platforms=DB::table('faceu_comment')->lists('platform')->distinct()->get();
//        foreach ($platforms as $platform){
//            echo $platform;
//        }
        return $platforms;
    }
}
