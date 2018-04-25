<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
    	return $this->fetch("index");
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
