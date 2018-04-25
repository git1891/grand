<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Login extends Controller
{
	public function login()
	{
		return $this->fetch("login");
	}
}