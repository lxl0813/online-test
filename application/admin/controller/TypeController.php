<?php
namespace app\admin\controller;

use app\admin\model\RuleModel;
use app\admin\model\SubjectModel;
use app\admin\model\TypeModel;

class TypeController extends CommonController
{
    public function index(){
        if(request()->isGet()){
            //查询所有维度并且计算出维度总数
            $type = TypeModel::TypeSelect();
            if($type==''){

            }else{
                //var_dump($type);exit;
                foreach($type as $key=>$value){
                    $subject = SubjectModel::SubjectSelect(['type_id'=>$value['id']]);
                    $type[$key]['subject'] = $subject;
                    $type[$key]['subject_nums']=count($subject);//计算每个维度下，有多少道题目；
                }
                $type_nums = count($type); // 总维度数量
                return view('',['type'=>$type,'type_nums'=>$type_nums]);
            }

        }
        if(request()->isPost()){

        }
    }

    //维度添加
    public function add(){
        $name = input('name');
        $time = time();
        $add = TypeModel::TypeAdd(['type_name'=>$name,'time'=>$time]);
        if($add){
            echo json_encode(['status'=>1,'msg'=>'添加成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'添加失败，稍后再试']);
        }
    }

    //维度名称修改
    public function update(){
        $data['type_name'] = input('name');
        $id['id']   = input('id');
        $update = TypeModel::TypeUpdate($id,$data);
        if($update){
            echo json_encode(['status'=>1,'msg'=>'修改成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'修改失败，稍后再试']);
        }
    }

    //维度详情（题目页面）
    public function details(){
        if(request()->isGet()){
            $type_id = input('id');
            //var_dump($type_id);exit;
            $details = TypeModel::TypeFind(['id'=>$type_id]);//查询对应的维度
            $details['subject'] = SubjectModel::SubjectSelectFen(['type_id'=>$type_id]);//查询该维度下的所有题目
            //var_dump($details['subject']);exit;
            $details['subject_nums'] = count($details['subject']);//计算题目数量
            return view('',['details'=>$details,'id'=>$type_id]);
        }

        if(request()->isPost()){
            $type_id = input('type_id');
            $status  = input('status');
            $subject = SubjectModel::SubjectSelectFen(['type_id'=>$type_id,'status'=>$status]);
            if($subject){
                echo json_encode(['status'=>1,'msg'=>'查询成功','subject'=>$subject]);
            }else{
                echo json_encode(['status'=>2,'msg'=>'没有查询到相关内容']);
            }

        }
    }

    //题目删除
    public function subject_delete(){
        $subject_id = input('id');
        //var_dump($subject_id);exit;
        $subject = SubjectModel::SubjectDelete(['id'=>$subject_id]);
        if($subject){
            echo json_encode(['status'=>1,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'删除失败,稍后再试']);
        }
    }

    //状态修改（开启改关闭）
    public function qi(){
        $id = input('id');
        $status = TypeModel::TypeUpdate(['id'=>$id],['status'=>2]);
        if($status){
            echo json_encode(['status'=>1,'msg'=>'状态修改成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'状态修改失败']);
        }
    }
    //状态修好（关闭改开启）
    public function guan(){
        $id=input('id');
        $status = TypeModel::TypeUpdate(['id'=>$id],['status'=>1]);
        if($status){
            echo json_encode(['status'=>1,'msg'=>'状态修改成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'状态修改失败']);
        }
    }

    public function delete_all(){
        $id=input('id/a');
        foreach($id as $k=>$v){
            $delete = TypeModel::TypeDelete(['id'=>$v]);
        }
        if($delete){
            echo json_encode(['status'=>1,'msg'=>'批量删除成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'批量删除失败，稍后再试']);
        }
    }

    //题目批量删除
    public function subject_delete_all(){
        $id=input('id/a');
        foreach($id as $k=>$v){
            $delete = SubjectModel::SubjectDelete(['id'=>$v]);
        }
        if($delete){
            echo json_encode(['status'=>1,'msg'=>'批量删除成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'批量删除失败，稍后再试']);
        }
    }

    //出题数量规则
    public function rule(){
        $nums = input('name');
        $rule = RuleModel::RuleUpdate(['nums'=>$nums]);
        if($rule){
            echo json_encode(['status'=>1,'msg'=>'规则设置成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'设置失败，稍后再试']);
        }
    }
}
