<?php
namespace app\cooladmin\controller;

use think\Controller;

class Admin extends Controller
{
    public function Home(){
        $this->assign('title','ceshi');
       return  $this->fetch();
    }
}