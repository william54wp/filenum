<?php
namespace app\filenum\controller;

use think\Controller;
use app\filenum\model\depts;

class dept extends Controller
{
    protected $db;

    // 前置方法，初始化dept 数据库实例
    public function __construct()
    {
        $this->db = new depts;
    }
    // 增加单位
    public function add()
    {
        $deep = 0;
        $sort = 0;
        $sort =  depts::max('sort')+1;
        $dept = new depts($_POST);
        $parent_id = $dept->parent_id;

        $parentDept = $this->db::get($parent_id);
        if (!is_null($parentDept)) {
            $deep = $parentDept->deep + 1;
        }

        $dept->deep = $deep;
        $dept->show = true;
        $dept->sort = $sort;
        $dept->save();
        $this->success('增加成功', 'filenum/mgr/dept');
    }
    // 单位列表
    public function list($deep = 0, $id = 0)
    {
        // $depts = new db_dept();
        if ($id==0) {
            $result = $this->db->where('deep', $deep)->order('sort')->select();
        } else {
            $result = $this->db->find($id);
        }
        echo json_encode($result, 256);
    }
}
