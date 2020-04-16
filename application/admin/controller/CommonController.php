<?php
/**
 * Created by PhpStorm.
 * User: 李小龙
 * Date: 2020/4/3
 * Time: 13:56
 */
namespace app\admin\controller;
use think\Controller;
use think\Cookie;
use think\Db;

class CommonController extends Controller{
    public function __construct(){
        //echo 1;exit;
        parent::__construct();
        if(!cookie("admin")){
            $this->redirect("Login/index");
        }

    }

}