<?php

namespace app\filenum\controller;

use think\Controller;

class mgr extends Controller
{
    protected $beforeActionList=[
        'loadlayout'
    ];
    protected function loadlayout()
    {
        $this->view->engine->layout('layout_mgr');
    }
    public function index()
    {
        $this->assign('title','后台管理');
        $this->assign('jsfile','mgr_index.js');
        return view();
    }
    public function dept()
    {
        $this->assign('jsfile','mgr_dept.js');
        $this->assign('title','单位管理');
        return view();
    }
    public function user()
    {
        $this->assign('jsfile','mgr_user.js');
        $this->assign('title','用户管理');
        return view();
    }
    public function num(){
        $this->assign('jsfile','mgr_num.js');
        $this->assign('title','用户管理');
        return view();
    }
}
