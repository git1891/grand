<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
    	echo 123;die;
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }
	
	// tp5.0 显示模板  基本输出
	public function show(){
		//return 'show shuchu !';
        $this->assign('domain',$this->request->url(true));
		//return $this->display();    3.2 支持视图渲染
		
		$data = array(
		   array('name'=>'zhangs','pwd'=>'123456'),
		   array('name'=>'lisi','pwd'=>'666666')
		);
		$this->assign('list',$data);
		
        return $this->fetch('show_index');   //  5.0支持视图渲染
	}
	
	//  curd      
	 
	//  读取   查询    DB{ public static function table(){ }   }
	//  $db -> connnect() ->con()  -> read();    //连贯操作
	//   return $this
	public function testr(){
		//  M('t7')->where('id=100')->find();   //tp3.2
		//  table 表全名   
		//  配置文件  配置了  表前缀   name  prx_    
		//  select * from user     dede_    
		// $id=Db::table('t7')->where('id',100)->find();  // 单查   tp5.0
		//$res=db('t7')->where('id','>',0)->select();     //多查    tp5.0
		$res=db('t7')->where('id>80')->select();    // 多查 tp5.0
		dump($res);
	}
	
	// 添加数据
	public function testc(){
		$data = [
		'id' => '1000',
		'id' => '1000',     // C  config  I input  
		'id' => '1000',
		'id' => '1000',
		'id' => '1000'
		];
		//  $res=M('t7')->add($data);   // tp3.2
		$res=db('t7')->insert($data);   // tp5.0
		echo db('t7')->getlastsql();    //输出上一条SQL
		exit;
		
		dump($res);
	}
	
	// 更新数据 修改数据
	public function testu(){
		$data = ['name'=>'zhamin'];
		//  M('t7')->where('id=1008')->save($data);   //3.2
        $res=Db::name('t7')->where('id', 1008)->update($data);
        echo Db::name('t7')->getlastsql();
	}
	
	// 删除数据 
	public function testd(){
		//M('t7')->delete(1,2,3);        TP 3.2
		
//		$con['id'] = 1008;
//		M('t7')->where($con)->delete()   TP 3.2
        $res=Db::table('t7')->where('id',1000)->delete();
		dump($res);
	}
	
	//  Model 模型   自动补全
	public function testm(){    //自动补全   自动验证
		$user = model('T7');    //调用模型
		$user->data([
		'id'  =>  '91',    
		'name' =>  'sxy@qq.com',
		'ip'=>'192.178'
		]);
		$user->save();
	}
}
