<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function index(){
	$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    /**
     * 显示单词
     */
    public function showWord() {
        $user = $this->getUser();
        if(empty($user)) {
            $this->redirect("/Home/user/login",array(),3,"请先登录");
            exit;
        }
        $wordInfo = $this->getOneWordRandom();
        $word =$wordInfo['word'];
        $explain = $wordInfo['explain'];
        $length = strlen($word);
        $char1 = intval(mt_rand(1,intval($length/2)));
        $char2 = intval(mt_rand(intval($length/2),$length-1));
        $this->word = $word;
        $this->char1 = $char1;
        $this->char2 = $char2;
        $this->wordLength = $length;
        $this->explain = $explain;
        $this->userName = $user['userName'];
        $this->display("showWord");
    }

    public function inputResult() {
        $wordLen = I("wordlength");
        if(!$wordLen) {
            $this->error("处理异常，继续答题");
        }
        $word = "";
        for($i=0;$i<$wordLen;$i++) {
            $str = "word".$i;
            $word .= I($str);
        }
        $result = $this->checkWord($word);
        if(empty($result)) {
            $this->redirect("/Home/Index/showWord",array(),2,"单词未找到，请重新答题");
            exit;
        }
        //答题正确 - 清楚正在答的此题记录，添加用户当前答题记录 - redis - 跳转到答题页面进行新一轮答题
        $this->redirect("/Home/Index/showWord",array(),1,"继续答题");
        exit;
    }

    public function test() {
        $test_value = I("test_key");
        var_dump($test_value);
    }

    private function checkWord($word) {
        $englishWordModel = D("EnglishWord");
        $result = $englishWordModel->getWordInfoByWord($word);
        return $result;
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