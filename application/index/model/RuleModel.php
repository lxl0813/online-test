<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/15
 * Time: 13:01
 */
namespace app\index\model;
use think\Model;

class RuleModel extends Model{
    public static function RuleUpdate($data){
        return self::where(['id'=>1])->update($data);
    }

    public static function RuleFind($data){
        return self::get($data)->toArray();
    }
}