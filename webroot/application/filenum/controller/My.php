<?php
namespace app\filenum\controller;

use think\Controller;
use think\Request;

class My extends Controller
{
    
    protected $beforeActionList = [
        'checkIp'
    ];
    // checkIpAddr
    protected function checkIp()
    {
        // 检查 IP 是否在数据库中，是则默认此IP，否则跳转到用户注册
        // $remote_ip = input('server.REMOTE_ADDR');
        // $this->redirect('User/reg');
    }
    public function index()
    {
        $this->assign('jsfile','my_index.js');
        return view();
    }
    public function list()
    {
        return 'filenum my list';
    }
    public function request()
    {
        $this->assign('jsfile','my_req.js');
        return view();
    }
    public function init()
    {
        $remote_ip = input('server.REMOTE_ADDR');
        var_dump($remote_ip);
    }
}
