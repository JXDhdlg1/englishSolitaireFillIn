<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function index(){
	$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function showWord() {
        $user = $this->getUser();
        if(!empty($user)) {
            echo $user['userName'];
        }
    }

    /**
     * 随机获得单词
     */
    private function getOneWordRandom() {
        $wordId = intval(mt_rand(1,$this->getWordNum()));
        $wordModel = D("EnglishWord");
        $word = $wordModel->getWordById($wordId);
        return $word;
    }

    /**
     * 获取当前一共有的单词数量
     * @return int
     */
    public function getWordNum() {
        return 103988;
    }
}