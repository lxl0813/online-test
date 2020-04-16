<?php
/**
 * Created by PhpStorm.
 * User: 李小龙
 * Date: 2020/4/3
 * Time: 13:56
 */
namespace app\admin\controller;

use app\admin\model\SubjectModel;
use app\admin\model\Type;
use app\admin\model\TypeModel;
use think\facade\Cookie;

class IndexController extends CommonController
{
    public function index(){
        if(request()->isGet()){
            //查询所有维度并且计算出维度总数
            $type = TypeModel::TypeSelect();

            foreach($type as $key=>$value){
                $subject = SubjectModel::SubjectSelect(['type_id'=>$value['id']]);
                $type[$key]['subject'] = $subject;
                $type[$key]['subject_nums']=count($subject);//计算每个维度下，有多少道题目；
            }
            //计算每个维度下面各有多少题目
            $type_nums = count($type); // 总维度数量

            return view('',['type'=>$type,'type_nums'=>$type_nums]);
        }
        if(request()->isPost()){

        }
    }

    public function out(){
        Cookie::delete('admin');
        echo json_encode(['status'=>1,'msg'=>'退出成功']);
    }
}
