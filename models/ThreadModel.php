<?php

require_once "DAO/ThreadDAO.php";
require_once "DAO/ResponseDAO.php";

class ThreadModel
{
    // TOP画面内容情報を取得
    public function getBbsTopInfo()
    {
        // スレッド最新20件の情報を取得
        $threadDAO = new ThreadDAO();
        $threadHeaderList = $threadDAO->getLimitedThreadList(20);

        $i = 1;
        //スレッドの最新更新10件にレスのレコードを持たせる
        foreach ($threadHeaderList as $thread) {
            if ($i > 10) {
                break;
            }
            $threadDetailList[] = $thread;
            $i++;

        }

        foreach ($threadDetailList as &$thread) {
            $responseDAO = new ResponseDAO();

            $thread["reses"] = $responseDAO->getLimitedResponseList($thread["thre_id"],10);
        }
        unset($thread);

        $bbsTopInfo['threadHeaderList'] = $threadHeaderList;
        $bbsTopInfo['threadDetailList'] = $threadDetailList;
        $bbsTopInfo['token'] = sha1(session_id());

        return $bbsTopInfo;

    }

    // スレッド詳細情報を取得
    public function getThreadInfo($thre_id, $page)
    {
        // スレッド名を取得
        $threadDAO = new ThreadDAO();
        $thre_name = $threadDAO->getThreadName($thre_id);

        if(empty($thre_name)){
            echo '存在しないスレッドです。';
            exit ;
        }

        $threadInfo['thre_id'] = $thre_id;
        if(isset($_SESSION['addCompMsg'])){
        	$threadSubInfo['addCompMsg'] =  $_SESSION['addCompMsg'];
        	unset($_SESSION['addCompMsg']);
        }
        $threadInfo['thre_name'] = $thre_name;
        $threadInfo['token'] = sha1(session_id());
        return $threadInfo;
    }

    // スレッドに紐づくレスを取得
    public function getResponseInfo($thre_id, $page)
    {
        $responseDAO = new ResponseDAO();

        // パラメータのページが存在するかにより処理を振り分ける TODO 別のアクションとした方が良いか検討する
        if (empty($page)) {
            //全レスを取得する
            $reses = $responseDAO->getResponseList($thre_id);
        }else{
            if (strcmp($page,"l20") == 0){
                //最新20件のレスを取得する　また１番目のレスも取得する
                $reses = $responseDAO->getLimitedResponseList($thre_id,20);
            }else{
                //文字列の分割
                $pages = explode("-", $page);
                //文字列の格納
                $pageFrom = $pages[0];
                $pageTo = $pages[1];

                //パラメータが以下のいずれかにあてはまる不正なパラメータでないか判定
                //1.始点のページが指定されていないか
                //2.始点のページが不正でないか
                //3.終点のページが指定されていないか
                //4.終点のページが不正でないか
                if (empty($pageFrom) || !is_numeric($pageFrom) || empty($pageTo) || !is_numeric($pageTo)){
                	//ページパラメータが不正であれば、始点・終点を1とする
                	$pageFrom = 1;
                	$pageTo = 1;
                }
                //始点-終点のレス番であるレスを取得する　また１番目のレスも取得する
                $reses = $responseDAO->getPagingResponseList($thre_id,$pageFrom,$pageTo);

            }
        }

        if(empty($reses)){
            exit ;
        }
        $responseInfo['reses'] = $reses;
        return $responseInfo;
    }

    // レス登録
    public function addResponse($query)
    {
        // エラーチェック
        // トークンチェック
        checkToken($query['token']);
        // 必須チェック
        checkRequired($query['name'],"名前がありません。");
        checkRequired($query['text'],"本文がありません。");

        // 桁数チェック
        checkDigit($query['name'],20,"名前の文字数が全角10文字を超えています。");
        checkDigit($query['text'],400,"本文の文字数が全角200文字を超えています。");

        // レス登録
        $responseDAO = new ResponseDAO();
        $responseDAO->addResponse($query);

        // 正常にレス登録が行われたことを、セッション変数に格納
        $_SESSION['addCompMsg'] = 'レスが登録されました。';
    }

    // スレッド登録
    public function addThread($query)
    {

        // エラーチェック
        // トークンチェック
        checkToken($query['token']);
        // 必須チェック
        checkRequired($query['thre_name'],"スレッド名がありません。");
        checkRequired($query['name'],"名前がありません。");
        checkRequired($query['text'],"本文がありません。");

        // 桁数チェック
        checkDigit($query['thre_name'],40,"スレッド名の文字数が全角20文字を超えています。");
        checkDigit($query['name'],20,"名前の文字数が全角10文字を超えています。");
        checkDigit($query['text'],400,"本文の文字数が全角200文字を超えています。");

        // スレッド登録
        $threadDAO = new ThreadDAO();
        $thre_id = $threadDAO->addThread($query);

        // スレッド作成画面にて表示する内容をセッション変数へ登録
        $_SESSION['thre_id'] = $thre_id;
        $_SESSION['thre_name'] = $query['thre_name'];
    }
}

?>
