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

    /**
     * 根据id获取单词信息
     * @param $id
     * @return array
     */
    public function getWordById($id) {
        $where['id'] = $id;
        $data = $this->where($where)->select();
        return $data ? $data[0] : array();
    }


    /**
     * 根据英语单词获取单词信息 - check是否存在改单词
     * @param $id
     * @return array
     */
    public function getWordInfoByWord($word) {
        $where['word'] = $word;
        $data = $this->where($where)->select();
        return $data ? $data[0] : array();
    }
}