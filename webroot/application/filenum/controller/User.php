<?php
namespace app\filenum\controller;

use think\Controller;
use app\filenum\model\users;

class user extends Controller
{

    public function index()
    {
        echo 'demo';
    }
    public function reg()
    {
        $ip = input('server.REMOTE_ADDR');
        $this->assign('ip', $ip);
        $this->assign('jsfile', 'user_reg.js');

        if (request()->isPost()) {
            $password = md5(input('password'));
            $user = new users($_POST);
            $user->password = $password;
            $user->ip = $ip;
            if (!is_null(input('password'))) {
                $user->usepassword = true;
            } else {
                $user->password = false;
            }
            try {
                $result = $user->save();
                $this->success('注册成功', url('filenum/my/index'));
            } catch (exception $e) {
                dump($user);
            }
        } else {
            return view();
        }
    }
    public function list()
    {
        $users = new users;
        $users = $users->field(['id','name','dept','ip'])->select();
        return json_encode($users, 256);
    }
    public function get()
    {
        $ip = input('server.REMOTE_ADDR');
        // $ip = '192.168.0.1';
        $user = users::get(['ip'=>$ip]);
        if (is_null($user)) {
            $result = ['status'=>'err','detail'=>'ip not exists!'];
        } else {
            // $result = ['status'=>'ok','username'=>$user->name];
            $result = ['status'=>'ok','username'=>$user->name,'is_mgr'=>$user->is_mgr];
        }
        return json_encode($result);
    }
}
