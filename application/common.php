<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 保存64位编码图片
 */
 function saveBase64Image($base64_image_content){

        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){

                  //图片后缀
                  $type = $result[2];

                  //保存位置--图片名
                  $image_name=date('His').str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT).".".$type;
                  $image_url = '/uploads/image/'.date('Ymd').'/'.$image_name;           
                  if(!is_dir(dirname('.'.$image_url))){
                         mkdir(dirname('.'.$image_url));
                        chmod(dirname('.'.$image_url), 0777);
                       

                  }
                 
                  //解码
                  $decode=base64_decode(str_replace($result[1], '', $base64_image_content));
                  if (file_put_contents('.'.$image_url, $decode)){
                        $data['code']=0;
                        $data['imageName']=$image_name;
                        $data['url']=$image_url;
                        $data['msg']='保存成功！';
                  }else{
                    $data['code']=1;
                    $data['imgageName']='';
                    $data['url']='';
                    $data['msg']='图片保存失败！';
                  }
        }else{
            $data['code']=1;
            $data['imgageName']='';
            $data['url']='';
            $data['msg']='base64图片格式有误！';


        }       
        return $data;


 }


 /**
 * 系统邮件发送函数
 * @param string $tomail 接收邮件者邮箱
 * @param string $name 接收邮件者名称
 * @param string $subject 邮件主题
 * @param string $body 邮件内容
 * @param string $attachment 附件列表
 * @return boolean
 * @author static7 <static7@qq.com>
 */
function send_mail($tomail, $name,$host,$port,$user,$pwd,$sname, $subject = '', $body = '', $attachment = null) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();           //实例化PHPMailer对象
    $mail->CharSet = 'UTF-8';           //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();                    // 设定使用SMTP服务
    $mail->SMTPDebug = 0;               // SMTP调试功能 0=关闭 1 = 错误和消息 2 = 消息
    $mail->SMTPAuth = true;             // 启用 SMTP 验证功能
    $mail->SMTPSecure = 'ssl';          // 使用安全协议
    $mail->Host = $host; // SMTP 服务器
    $mail->Port = $port;                  // SMTP服务器的端口号
    $mail->Username = $user;    // SMTP服务器用户名
    $mail->Password = $pwd;     // SMTP服务器密码
    $mail->SetFrom($user, $name);
    $replyEmail = '';                   //留空则为发件人EMAIL
    $replyName = '';                    //回复名称（留空则为发件人名称）
    $mail->AddReplyTo($replyEmail, $replyName);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($tomail, $name);
    if (is_array($attachment)) { // 添加附件
        foreach ($attachment as $file) {
            is_file($file) && $mail->AddAttachment($file);
        }
    }
    return $mail->Send() ? true : $mail->ErrorInfo;
}

/**
 * 查询某值是否存在二维数组
 * @param string $value 值
 * @param string $array 数组

 */

function deep_in_array($value, $array) {   
        foreach($array as $item) {   
        if(!is_array($item)) {   
            if ($item == $value) {  
                return true;  
            } else {  
                continue;   
            }  
        }   
            
      if(in_array($value, $item,true)) {  
            return true;      
      } else if(deep_in_array($value, $item)) {  
            return true;      
            }  
      }   
            return false;   
}

/**
 * 删除数组某元素
 * @param string $arr 数组
 * @param string $offset Key值

 */
function array_remove(&$arr, $offset)
  { 
        array_splice($arr, $offset, 1); 
  }

