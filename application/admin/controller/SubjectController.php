<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/13
 * Time: 10:22
 */
namespace app\admin\controller;
use app\admin\model\SubjectModel;
use app\admin\model\TypeModel;

class SubjectController extends CommonController{
    //


    public function add(){
        if(request()->isGet()){
            $type_id = input('type_id');
            //查询维度名称
            $type = TypeModel::TypeFind(['id'=>$type_id]);
            return view('',['type'=>$type]);
        }

        if(request()->isPost()){
            $title= input('title');
            $type = input('type');
            $status = input('status');
            $is_more = input('xuan');
            //var_dump($is_more);exit;
            if($title==''){
                $this->error('请填写题目');
            }
            //查询维度id
            $type_id = TypeModel::TypeFind(['type_name'=>$type]);
            //文字类型提交
            if($status == 1){
                $content = input('daan');
                if($content == ''){
                    $this->error('请填写文字选项');
                }else{
                    $content = trim($content);   //取出两边空格
                    $content = nl2br($content);  //将换行换成 <br / >
                    $content = explode("<br />",$content); // 然后再用<br />作为分隔符，变成数组。虽然变成数组了，还是value还是有空格的，要去空格
                    foreach($content as $k=>$v){         //去空格
                        $content[$k]=trim($v);
                    }
                    $content=trim(implode('|',$content));  //转字符串去空格
                    //var_dump($content);exit;
                    $data['name']=$title;$data['d_wen']=$content;$data['status']=$status;$data['type_id']=$type_id['id'];$data['is_more']=$is_more;
                    $subject=SubjectModel::SubjectAdd($data);
                    if($subject){
                        $this->success('题目上传成功');
                    }
                }


            }
            //图片类型提交
            if($status == 2){
                $content = request()->file();
                if($content == ''){
                    $this->error('请上传图片选项');
                }
                $ext=$_FILES['file']['name'];//图片名称
                $end = strrchr($ext,'.');//截取后缀
                $filetype = ['.jpg', '.jpeg', '.bmp', '.png'];                    //图片类型范围
                //判断上传文件格式
                if(!in_array($end,$filetype)){
                    $this->error('请上传JPG, jpeg, GIF, BMP, PNG格式的图片');
                }
                $dir='../public/imgs/'.date('Y/m/d').'/';                          //上传路径
                if (!file_exists($dir)){                                          //创建文件夹
                    mkdir($dir,0777,true);
                }
                $tmp_name=$_FILES['file']['tmp_name'];
                $new_photo=uniqid().'.'.$ext;
                if (move_uploaded_file($tmp_name,$dir.$new_photo)){
                    //提交入库
                    $data['name']=$title;$data['d_img']=substr($dir.$new_photo,9);$data['status']=$status;$data['type_id']=$type_id['id'];$data['is_more']=$is_more;
                    $subject=SubjectModel::SubjectAdd($data);
                    if($subject){
                        $this->success('题目上传成功');
                    }
                }
            }
            //问答类型提交
            if($status == 3){
                $data['name']=$title;$data['status']=$status;$data['type_id']=$type_id['id'];
                $subject=SubjectModel::SubjectAdd($data);
                if($subject){
                    $this->success('题目上传成功');
                }
            }
        }
    }

    //条件查找
//    public function select(){
//        $type_id = input('type_id');
//        $status  = input('status');
//        $subject = SubjectModel::SubjectSelectFen(['type_id'=>$type_id,'status'=>$status]);
//        var_dump($subject);exit;
//        if($subject){
//            echo json_encode(['status'=>1,'msg'=>'查询成功','subject'=>$subject]);
//        }else{
//            echo json_encode(['status'=>2,'msg'=>'没有查询到相关内容']);
//        }
//    }


    public function update(){
        if(request()->isGet()){
            $subject_id = input('subject_id');
            $subject = SubjectModel::SubjectFind(['id'=>$subject_id]);
            if($subject['status']==1){
                $content="";
                $subject['d_wen']=explode('|',trim($subject['d_wen']));
                foreach($subject['d_wen'] as $k3=>$v3){
                    $content.=$v3."\n";
                }
                $subject['d_wen']=$content;
            }
            //维度查询
            $type = TypeModel::TypeSelect();
            //var_dump($subject);exit;
            return view('',['subject'=>$subject,'type'=>$type]);
        }
        if(request()->isPost()){
            $title= input('title'); //公共部分
            $type = input('type');
            $status = input('status');
            $id = input('id');

            $is_more = input('xuan');//公共部分
            if($title==''){
                $this->error('请填写题目');
            }
            //查询维度id
            //$type_id = TypeModel::TypeFind(['type_name'=>$type]);
            //文字类型提交
            if($status == 1){
                $content = input('daan');
                if($content == ''){
                    $this->error('请填写文字选项');
                }else{
                    $content = trim($content);   //取出两边空格
                    $content = nl2br($content);  //将换行换成 <br / >
                    $content = explode("<br />",$content); // 然后再用<br />作为分隔符，变成数组。虽然变成数组了，还是value还是有空格的，要去空格
                    foreach($content as $k=>$v){         //去空格
                        $content[$k]=trim($v);
                    }
                    $content=trim(implode('|',$content));  //转字符串去空格
                    //var_dump($content);exit;
                    $data['name']=$title;$data['d_wen']=$content;$data['type_id']=$type;$data['is_more']=$is_more;
                    $subject=SubjectModel::SubjectUpdate(['id'=>$id],$data);
                    if($subject){
                        $this->success('修改成功');
                    }else{
                        $this->error('修改失败');
                    }
                }


            }
            //图片类型提交
            if($status == 2){
                $content = request()->file();
                if($content == ''){
                    $data['name']=$title;$data['type_id']=$type;$data['is_more']=$is_more;
                    $subject=SubjectModel::SubjectUpdate(['id'=>$id],$data);
                    if($subject){
                        $this->success('修改成功');
                    }else{
                        $this->error('修改失败');
                    }

                }else{
                    $ext=$_FILES['file']['name'];//图片名称
                    $end = strrchr($ext,'.');//截取后缀
                    $filetype = ['.jpg', '.jpeg', '.bmp', '.png'];                    //图片类型范围
                    //判断上传文件格式
                    if(!in_array($end,$filetype)){
                        $this->error('请上传JPG, jpeg, GIF, BMP, PNG格式的图片');
                    }
                    $dir='../public/imgs/'.date('Y/m/d').'/';                          //上传路径
                    if (!file_exists($dir)){                                          //创建文件夹
                        mkdir($dir,0777,true);
                    }
                    $tmp_name=$_FILES['file']['tmp_name'];
                    $new_photo=uniqid().'.'.$ext;
                    if (move_uploaded_file($tmp_name,$dir.$new_photo)){
                        //提交入库
                        $data['name']=$title;$data['d_img']=substr($dir.$new_photo,9);$data['type_id']=$type;$data['is_more']=$is_more;
                        $subject=SubjectModel::SubjectUpdate(['id'=>$id],$data);
                        if($subject){
                            $this->success('修改成功');
                        }else{
                            $this->error('修改失败');
                        }
                    }
                }
            }
            //问答类型提交
            if($status == 3){
                $data['name']=$title;$data['type_id']=$type;
                $subject=SubjectModel::SubjectAdd($data);
                if($subject){
                    $this->success('修改成功');
                }else{
                    $this->error('修改失败');
                }
            }
        }
    }
}
