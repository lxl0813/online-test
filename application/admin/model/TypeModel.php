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

class TypeModel extends Model{
    //定义id
    protected $pk = "id";
    //多查询
    public static function TypeSelect(){
        return self::all()->toArray();
    }

    //单查询
    public static function TypeFind($data){
        return self::get($data)->toArray();
    }

    //添加
    public static function TypeAdd($data){
        return self::insert($data);
    }

    //修改
    public static function TypeUpdate($id,$data){
        return self::where($id)->update($data);
    }

    //删除
    public static function TypeDelete($data){
        return self::destroy($data);
    }




}