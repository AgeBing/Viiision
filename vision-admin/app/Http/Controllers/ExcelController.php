<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Excel;

class ExcelController extends Controller
{
    //从网站上获取Excel表格
    public function export()
    {
        $cellData = [
            ['学号', '姓名', '成绩'],
            ['10001', 'AAAAA', '99'],
            ['10002', 'BBBBB', '92'],
            ['10003', 'CCCCC', '95'],
            ['10004', 'DDDDD', '89'],
            ['10005', 'EEEEE', '96'],
        ];
        Excel::create(iconv('UTF-8', 'GBK', '学生成绩'), function ($excel) use ($cellData) {
            $excel->sheet('score', function ($sheet) use ($cellData) {
                $sheet->rows($cellData);
            });
        })->store('xls')->export('xls');
    }


//app相关信息导入
    public function apps_import(){
        $filePath = 'storage/import/'.iconv('UTF-8', 'GBK', 'apps_import').'.xlsx';
        Excel::selectSheetsByIndex(0)->load($filePath, function($reader) {
            $datas =$reader->toObject();
            foreach ($datas as $data ){
                DB::insert('insert into app_info (app_name,platform,download,comment_count,date) values(?,?,?,?,?)',
                [$data->app_name, $data->platform,$data->download,$data->comment_count,$data->date]);
            }
            echo("导入成功,哇哈哈哈！");
        });
    }
}
