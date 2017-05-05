<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/1
 * Time: 23:59
 */

namespace App\Http\Controllers;
use App\User;  //引入模型
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;

class TestUserController extends Controller
{

    /**用原始方式DB facade 实现数据库的增删改查**/
    public function test1()
    {
/*        $User=DB::select('select * from User');
        var_dump($User);
        dd($User);//以节点树的形式输出数据*/
        $bool=DB::insert("insert into User(id,name) values(?,?)",[5,'sjy']);
        var_dump($bool);
        $boolUpdate =DB::update('update User set id=? where name=?',[800,'zll']);
        var_dump($boolUpdate);
        $num=DB::delete('delete from User where id=?',[2]);
        echo $num;
        User::create(['id'=>100,'name'=>'sgf']);
    }

    /**用查询构造器方式实现数据库的增删改查**/
    public function test2()
    {
       //增加多条数据
        $bool=DB::table("User")->insert([
           ['id'=>40,name=>'zqb'],
            ['id'=>41,name=>'yjq'],
        ]);
        echo $bool;
        $id=DB::table("User")->insertGetId(['id'=>900,'name'=>'swk']);
        echo $id;
        //删除
        $num=DB::table("User")->where('id','>',4)->delete();//删除多条
        echo $num;
        //修改
        $bool=DB::table("User")->where('id',800)->update(['name'=>'zhu']);
        echo $bool;
        //查询模板，实现根据要求查询数据，排序查询数据，多个条件

/*        //get()返回多条数据
        $student=DB::table("vipinfo")->get();
        var_dump($student);
//first()返回1条数据
        $student=DB::table("vipinfo")->first();  //结果集第一条记录
        $student=DB::table("vipinfo")->orderBy('vip_ID','desc')->first();//按vip_ID倒序排序
        var_dump($student);
//where()条件查询
        $student=DB::table("vipinfo")->where('vip_ID','>=',2)->get(); //一个条件
        $student=DB::table("vipinfo")->whereRaw('vip_ID> ? and vip_fenshu >= ?',[2,300])->get(); //多个条件
        dd($student);
//pluck()指定字段,后面不加get
        $student=DB::table("vipinfo")->pluck('vip_name');
        dd($student);
//lists()指定字段，可以指定某个字段作为下标
        $student=DB::table("vipinfo")->lists('vip_name','vip_ID');   //指定vip_ID为下标
        dd($student);
        $student=DB::table("vipinfo")->lists('vip_name');   //不指定下标，默认下标从0开始
//select()指定某个字段
        $student=DB::table("vipinfo")->select('vip_name','vip_ID')->get();
        dd($student);
//chunk()每次查n条
        $student=DB::table("vipinfo")->chunk(2,function($students){  //每次查2条
            var_dump($students);
            if(.......) return false;  //在满足某个条件下使用return就不会再往下查了
});*/

//使用聚合函数返回数据库的相关总体信息

/*//count()统计记录条数
        $nums=DB::table("vipinfo")->count();
        echo $nums;
//max()某个字段的最大值,同理min是最小值
        $max=DB::table("vipinfo")->max("vip_fenshu");
        echo $max;
//avg()某个字段的平均值
        $avg=DB::table("vipinfo")->avg("vip_fenshu");
        echo $avg;
//sum()某个字段的和
        $sum=DB::table("vipinfo")->sum("vip_fenshu");
        echo $sum;*/
    }
    //
    public function test4()
    {
        return view('admin/section1');
    }
}