<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/13
 * Time: 10:38
 */
namespace app\admin\model;
use think\Db;
use think\Model;

class AdminModel extends Model{
    //定义id
    protected $pk = "id";
    //查询
    public static function AdminFind($data){
        return Db::name("admin")->where($data)->find();

    }
    //修改
    public static function AdminUpdate($id,$update){
        return Db::name('admin')->where($id)->update($update);
    }

}