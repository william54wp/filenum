<?php
namespace app\filenum\controller;

use think\Controller;
use app\filenum\model\users;

class Index extends Controller
{
    public function index()
    {
        $ip = input('server.REMOTE_ADDR');
        $users = users::Get(['ip'=>$ip]);
        if (is_null($users)) {
            $this->redirect('filenum/user/reg');
        } else {
            $this->redirect('filenum/my/index');
        }
    }
}
