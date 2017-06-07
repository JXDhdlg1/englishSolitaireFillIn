<?php
/**
 * Created by PhpStorm.
 * User: jiangxudong
 * Date: 2017/6/7
 * Time: 13:48
 */

namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    protected $tableName = "user";

    /**
     * 通过用户名查用户信息
     * @param $name
     * @return array
     */
    public function getUserByName($name) {
        $where['userName'] = $name;
        $info = $this->where($where)->select();
        return $info ? $info[0] : array();
    }

    /**
     * 根据用户名密码获取用户信息
     * @param $name
     * @param $pass
     * @return array
     */
    public function getUserByNamePass($name,$pass) {
        $where['userName'] = $name;
        $where['password'] = $pass;
        $info = $this->where($where)->select();
        return $info ? $info[0] : array();
    }

    /**
     * 根据cookie获取用户信息
     * @param $cookie
     * @return array
     */
    public function getUserByCookie($cookie) {
        $where['cookie'] = $cookie;
        $info = $this->where($where)->select();
        return $info ? $info[0] : array();
    }

    /**
     * 新增用户
     * @param $userName
     * @param $password
     * @param $cookie
     * @param $email
     * @param $phone
     * @return mixed
     */
    public function saveUser($userName,$password,$cookie,$email,$phone) {
        $data = array(
            'userName' => $userName,
            'password' => $password,
            'cookie' => $cookie,
            'email' => $email,
            'phone' => $phone
        );
        $result = $this->data($data)->add();
        return $result;
    }

}