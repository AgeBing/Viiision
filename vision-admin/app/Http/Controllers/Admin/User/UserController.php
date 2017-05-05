<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\User;
use DB;

class UserController extends Controller
{
    //
    public function toUser()
    {
        $users=User::all();
        return view('admin.User.user')->with('users',$users);//跳转到user列表显示页
    }
    //用户新增页面
    public function toAdd()
    {
        return view('admin.User.user_add');
    }
    public function toSave(Request $request)
    {
        $data=$request->input('User');
        DB::insert('insert into users (id,name,sex,password,class) values(?,?,?,?,?)',[$data['user_id'],$data['user_name'],$data['user_sex'],$data['user_password'],$data['user_class']]);
        $app_categories=User::all();
        $this->toUser();
    }
    public function toDelete($id){
        DB::delete('delete from users where id=?',[$id]);
    }
    public function toWord(){
        $words=DB::table("meiyan_comment")->paginate(50);
        return view('admin.User.user_word')->with('words', $words);
    }
//    public function toEdit(Request $request)
//    {
//        $data=$request->input('User');
//        DB::update(\'update users set name="$data[\'user_sex\']",sex=$data[\'user_sex\'],password=$data[\'user_password\'] where 1');
//    }
}
