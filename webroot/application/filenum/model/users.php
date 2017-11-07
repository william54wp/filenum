<?php
namespace app\filenum\model;

use think\Model;
use app\filenum\model\depts;

class users extends Model
{

    public function getDeptAttr($value)
    {
        $dept = depts::get($value);
        return $dept->deptname;
    }
}
