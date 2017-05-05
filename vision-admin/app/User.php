<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
//这个文件是数据库的一个模型文件，自定义了数据库的相关增删改查的格式
class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded=['id'];//表示希望id不被重写
    protected $table='User';
    protected $fillable=['id','name'];
    public $timestamps=false;//标明不使用时间戳
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //受保护的信息，不被显示
 /*   protected $hidden = [
        'name'
    ];*/
}
