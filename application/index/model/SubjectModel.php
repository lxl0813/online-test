<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/13
 * Time: 10:39
 */
namespace app\index\model;
use think\Db;
use think\Model;

class SubjectModel extends Model{

    //多查询
    public static function SubjectSelect($data){
        return self::where($data)->all()->toArray();
    }

    //删除
    public static function SubjectDelete($data){
        return self::destroy($data);
    }

    //提交
    public static function SubjectAdd($data){
        return self::insert($data);
    }

    public static function SubjectSelectFen($data){
        return self::where($data)->paginate(10);
    }

    public static function SubjectSelectField($data){
        return self::where($data)->field('id')->select()->toArray();
    }
}