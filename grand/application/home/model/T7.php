<?php
namespace app\index\model;

use think\Model;

class T7 extends Model
{
   protected $auto = [];
   protected $insert = ['ip'=>'127.0.0','status' => 1];  
   //protected $update = ['login_ip'=>'192.0.1']; 
   
   protected $table = 't7';
   protected $readonly = ['id'];   //只读属性，ID 不能被修改
   
}