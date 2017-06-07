<?php
/**
 * Created by PhpStorm.
 * User: jiangxudong
 * Date: 2017/6/7
 * Time: 13:32
 */

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    /**
     * 获取用户信息
     * @return array
     */
    protected function getUser() {
        $cookie = cookie(C("USER_LOGIN_COOKIE"));
        $userInfo = array();
        if($cookie) {
            $userModel = D("User");
            $userInfo = $userModel->getUserByCookie();
        }
        return $userInfo;
    }

}