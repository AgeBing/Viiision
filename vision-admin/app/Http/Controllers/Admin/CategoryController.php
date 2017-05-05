<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\Category;

class CategoryController extends Controller
{
    //
    public function toCategory()
    {
        $categories=Category::all();
        return view('admin.category')->with('categories',$categories);
    }
    public function toCategoryAdd()
    {
        return view('admin.category_add');
    }
}
