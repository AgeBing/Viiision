<?php

namespace App\Http\Controllers\Admin\Comment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\Comment;
use DB;
use Carbon\Carbon;
use Excel;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    //
    //根据获得的平台名称反馈评论信息
    public function toComment()
    {
        $comments = DB::table('meiyan_comment')
            ->whereBetween('date',[Carbon::now()->subDays(0)->toDateString(),Carbon::now()->toDateString()])

            ->paginate(50);
        return view('admin.Comment.comment')->with('comments', $comments);
    }
    //根据app名称和时间来选择,两个下拉框的实时反应
    public function toAppNameAndDate($appName,$date){
            if ($appName == 'faceu') {
                $comments = DB::table('faceu_comment')
                    ->whereBetween('date',[Carbon::now()->subDays($date)->toDateString(),Carbon::now()->toDateString()])
                    ->get();
            }
            if ($appName == 'ins') {
                $comments = DB::table('ins_comment')
                    ->whereBetween('date',[Carbon::now()->subDays($date)->toDateString(),Carbon::now()->toDateString()])
                    ->get();
            }
            if ($appName == 'meiyan') {
                $comments = DB::table('meiyan_comment')
                    ->whereBetween('date',[Carbon::now()->subDays($date)->toDateString(),Carbon::now()->toDateString()])
                    ->get();
            }
        return $comments;
    }
    public function toCommentByPlatform(Request $request)
    {
        $app=$request->input('appName');
        $date=$request->input('date');
        $platform = $request->input('platform');
        if ($app == 'faceu') {
            $comments = DB::table('faceu_comment')
                    ->where(['platform' => $platform])
                    ->whereBetween('date',[Carbon::now()->subDays($date)->toDateString(),Carbon::now()->toDateString()])
                    ->paginate(50);
            }
        if ($app == 'ins') {
            $comments = DB::table('ins_comment')
                    ->where(['platform' => $platform])
                    ->whereBetween('date',[Carbon::now()->subDays($date)->toDateString(),Carbon::now()->toDateString()])
                    ->paginate(50);
            }
        if ($app == 'meiyan') {
            $comments = DB::table('meiyan_comment')
                   ->where(['platform' => $platform])
                    ->whereBetween('date',[Carbon::now()->subDays($date)->toDateString(),Carbon::now()->toDateString()])
                    ->paginate(50);
            }
        return view('admin.Comment.comment')->with('comments', $comments);
    }
    public function toExcelImport()
    {
        $filePath = 'storage/import/'.iconv('UTF-8', 'GBK', 'comment_import').'.xls';
        Excel::selectSheetsByIndex(0)->load($filePath, function($reader) {
            $datas =$reader->toObject();
            foreach ($datas as $data ){
                DB::insert('insert into faceu_comment(name,content,score,date,platform) values(?,?,?,?,?)',
                    [$data->name, $data->content,$data->score,$data->date,$data->platform]);
            }
            echo("导入成功,哇哈哈哈！");
        });
    }
    //从网上自动获取数据
    public function toUploadFromInternet()
    {
        return view('admin.Comment.uploadFromInternet');
    }
}
