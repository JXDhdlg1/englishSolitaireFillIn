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
        echo $cookie;
        $userInfo = array();
        if($cookie) {
            $userModel = D("User");
            $userInfo = $userModel->getUserByCookie();
        }
        cookie(C("USER_LOGIN_COOKIE"),"e358dab7962b107122fcc20dd69e5f28",3600*12);
        echo cookie(C("USER_LOGIN_COOKIE"));
        exit;
        return $userInfo;
    }

}