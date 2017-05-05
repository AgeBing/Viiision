<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/1
 * Time: 21:54
 */

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;


class WelcomeController extends BaseController
{
    public function index(){
        $data=[
            'name'=>'ll',
            'age'=>18
        ];
        //conpact(‘name')  with方法
       // return view('welcome',$data); //将参数传入view
    }
}