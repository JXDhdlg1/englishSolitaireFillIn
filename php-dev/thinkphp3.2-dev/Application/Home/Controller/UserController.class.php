<?php
/**
 * Created by PhpStorm.
 * User: jiangxudong
 * Date: 2017/6/7
 * Time: 13:30
 */

namespace Home\Controller;

use Think\Controller;

class UserController extends Controller
{
    /**
     * 显示登录页面
     */
    public function login() {
        $cookie = cookie(C("USER_LOGIN_COOKIE"));
        if($cookie) {
            $this->redirect('/Home/Index/showWord', array(), 3, '页面跳转中...');
        }
        $this->display();
    }

    /**
     * 判断登录
     */
    public function loginIn() {
        $userName = I("userName");
        $password = I("passWord");
        if(!$userName||!$password) {
            $this->error("请输入用户名和密码");
            exit;
        }
        $userModel = D("User");
        $userInfo = $userModel->getUserByNamePass($userName,$password);
        if(empty($userInfo)) {
            $this->error("用户名或密码错误");
            exit;
        }
        $cookie = $userInfo['cookie'];
        cookie(C("USER_LOGIN_COOKIE"),$cookie,3600*12);
        echo cookie(C("USER_LOGIN_COOKIE"));
        $this->redirect('/Home/Index/showWord', array(), 5, $cookie.'页面跳转中...');
    }

    /**
     * 显示注册页面
     */
    public function register() {
        $this->display();
    }

    /**
     * 保存用户信息
     */
    public function saveUser() {
        $userName = I("userName");
        $passWord = I("passWord");
        $email = I("email");
        $phone = I("phone");
        if(!$userName||!$passWord) {
            $this->error("请传入用户名和密码");
            exit;
        }
        $userModel = D("User");
        $userInfo = $userModel->getUserByName($userName);
        if(!empty($userInfo)) {
            $this->error("该用户名已被注册");
            exit;
        }
        $cookie = md5($userName.C("USER_COOKIE_KEY"));
//        cookie('name','value');  //设置cookie
        $result = $userModel->saveUser($userName,$passWord,$cookie,$email,$phone);
        if(!$result) {
            $this->error("保存失败，请稍后重试");
            exit;
        }
        cookie(C("USER_LOGIN_COOKIE"),$cookie,3600*12);
        $this->redirect('/Home/Index/showWord', array(), 5, $cookie.'页面跳转中...');
    }
}