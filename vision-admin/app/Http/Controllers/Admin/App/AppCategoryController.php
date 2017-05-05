<?php

namespace App\Http\Controllers\Admin\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\AppCategory;
use Illuminate\Support\Facades\DB;

class AppCategoryController extends Controller
{
    //
    public function toAppCategory()
    {
        $app_categories=AppCategory::all();
        return view('admin.App.app_category')->with('app_categories',$app_categories);
    }
    //app类别新增页面
    public function toAppCategoryAdd()
    {
        return view('admin.App.app_category_add');
    }
    public function toSave(Request $request){
        $data=$request->input(           'AppCategory');

        $app_categories=AppCategory::all();
        //return view('admin.app_category')->with('app_categories',$app_categories);
        $this->toAppCategory();
        //var_dump($data);
    }
}