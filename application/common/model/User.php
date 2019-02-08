<?php
namespace app\common\model;

use think\Model;

class User extends Model
{
     public function add($data){
         $password=$data['password'];
         $data['password']=MD5($password);
         $data['register_ip']=$this->getIp();
        $data['register_time']=date('Y-m-d h:m:s',time());
        return $this->allowField(true)->save($data);
     }
     public function getUserByPhone($data){
        $phone=$data['phone'];
         $password=$data['password'];
         $data['password']=MD5($password);
         $data['login_ip']=$this->getIp();
        $update=[
            'login_ip'=>$data['login_ip'],
            'login_time'=>date('Y-m-d h:m:s',time()),
        ];
         $this->where('phone',$phone)->update($update);
         return $this->where('phone',$phone)->find();
     }
    public  function findPhone($phoneNumber){
         return $this->where('phone',$phoneNumber)->find();
    }
    public function getIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                    $ip = getenv("REMOTE_ADDR");
                else
                    if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                        $ip = $_SERVER['REMOTE_ADDR'];
                    else
                        $ip = "unknown";
        return ($ip);
    }

}