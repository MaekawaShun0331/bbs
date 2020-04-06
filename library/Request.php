<?php

require_once "Post.php";
require_once "QueryString.php";
require_once "RootParameter.php";

class Request
{
    // POSTパラメータ
    private $post;
    // GETパラメータ
    private $query;
    // URLパラメータ
    private $_param;

    // コンストラクタ
    public function __construct()
    {
        $this->post = new Post();
        $this->query = new QueryString();
        // TODO 毎回URLパラメーターの指定があるルートとは限らないので、毎回呼び出すのは非効率ではないか
        $this->_param = new RootParameter();
    }

    // POST変数取得
    public function getPost($key = null)
    {
        if (null == $key) {
            return $this->post->get();
        }
        if (false == $this->post->has($key)) {
            return null;
        }
        return $this->post->get($key);
    }

    // GET変数取得
    public function getQuery($key = null)
    {
        if (null == $key) {
            return $this->query->get();
        }
        if (false == $this->query->has($key)) {
            return null;
        }
        return $this->query->get($key);
    }

    // URLパラメーター取得
    public function getParam($key = null)
    {
        if (null == $key) {
            return $this->_param->get();
        }
        if (false == $this->_param->has($key)) {
            return null;
        }
        return $this->_param->get($key);
    }
}

?>
