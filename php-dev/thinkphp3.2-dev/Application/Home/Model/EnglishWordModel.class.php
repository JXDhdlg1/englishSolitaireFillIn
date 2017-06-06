<?php

/**
 * Created by PhpStorm.
 * User: jiangxudong
 * Date: 2017/6/6
 * Time: 17:45
 */
namespace Home\Model;
use Think\Model;

class EnglishWordModel extends Model
{
    protected  $tableName = "english_word";

    public function getWords() {
        $data = $this->where(array())->limit(1)->select();
        return $data;
    }
    
}