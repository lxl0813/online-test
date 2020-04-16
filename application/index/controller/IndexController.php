<?php
namespace app\index\controller;

use app\index\model\RuleModel;
use app\index\model\SubjectModel;
use app\index\model\TypeModel;
use think\Controller;
use think\Db;
use think\facade\Cache;

class IndexController extends Controller
{
    public function index(){
        Cache::store('redis')->set('lxl','0513',3600);
        return view();
    }

    public function subject_index(){
        //随机生成题目（每个维度下面各5题）
        //获取题目类型id
        $type_id = TypeModel::TypeSelect(['status'=>1]);
        //取规则
        $nums = RuleModel::RuleFind(['id'=>1]);
        foreach($type_id as $k=>$v){
            $subject[]=Db::name('subject')->where(['type_id'=>$v['id']])->orderRand()->limit($nums['nums'])->select();
        }
        foreach($subject as $k=>$v){
            foreach($v as $k1=>$v1){
                if($v1["status"]==1){
                    $subject[$k][$k1]['d_wen']=explode('|',$v1['d_wen']);
                }
            }
        }
        foreach($subject as $k=>$v){
            foreach($v as $k1=>$v1){
                $a[]=$v1;
            }
        }
        shuffle($a);//打乱
        $b='1';//定义一个序号
        return view('',['a'=>$a,'b'=>$b]);
    }
}
