<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/3
 * Time: 13:51
 */
namespace app\admin\controller;
use app\admin\model\AdminModel;
use think\Controller;
use think\Cookie;
use think\Db;

class LoginController extends Controller{
    public function index(){
        if(request()->isGet()){

            return view();
        }

        if(request()->isPost()){
            if (request()->isPost()) {
                //接值判断
                $admin_name = request()->post("admin_name");
                $admin_pwd = request()->post("admin_pwd");
                if ($admin_name == ""){
                    echo json_encode(["status" => 2, "msg" => "账号不能为空"]);
                }
                if($admin_pwd == ""){
                    echo json_encode(["status" => 2, "msg" => "密码验不能为空"]);
                }
                $data = AdminModel::AdminFind(['admin'=>$admin_name]);

                if (!$data) {
                    echo json_encode(["status" => 2, "msg" => "账号不存在"]);
                } else {
                    if (md5($admin_pwd) != $data["pwd"]) {
                        echo json_encode(["status" => 2, "msg" => "密码错误，请重新输入"]);
                    } else {
                        $arr = [
                            "admin_id" => $data["id"],
                            "admin_name" =>$data["admin"],
                        ];
                        //var_dump($arr);exit;
                        cookie("admin", $arr);
                        //记录登录时间
                        $admin=AdminModel::AdminUpdate(['id'=>$data['id']],['login_time'=>time()]);
                        if($admin){
                            echo json_encode(["status" => 1, "msg" => "登录成功"]);
                        }

                    }
                }
            }
        }

    }
}