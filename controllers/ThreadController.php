<?php

require_once "ControllerBase.php";
require_once "ThreadModel.php";

class ThreadController extends ControllerBase
{

    /*Controllerではデータの取得・ビューへの割り当てのみ行う*/

    // スレッド一覧表示処理
    public function listAction()
    {
        $threadDAO = new ThreadDAO();
        $threadList = $threadDAO->getThreadList();

        $this->view->assign('threadList', $threadList);
    }

    // スレッド詳細表示処理
    // $query = [スレID, ページング]
    public function parameterAction()
    {
        $query = $this->request->getParam();
        // パラメータのスレッドIDが存在しない、もしくは3つ目のパラメータが存在する場合はエラーとする。
        if(empty($query[0]) || count($query) > 2){
            echo 'エラー';
            exit ;
        }

        $thre_id = $query[0];
        $page = !empty($query[1]) ? $query[1] : null;
        
        $thread = new ThreadModel();
        $threadInfo = $thread->getThreadInfo($thre_id, $page);
        $this->view->assign('threadInfo', $threadInfo);
    }

    //スレッドに紐づくレス取得処理(非同期通信用)
    // $query = ['getResponse', スレID, ページング]
    public function getResponseAction()
    {
        $query = $this->request->getParam();
        // パラメータのスレッドIDが存在しない、もしくは3つ目のパラメータが存在する場合はエラーとする。
        if(empty($query[1]) || count($query) > 3){
            exit ;
        }

        $thre_id = $query[1];
        $page = !empty($query[2]) ? $query[2] : null;

        $thread = new ThreadModel();
        
        $responseInfo = $thread->getResponseInfo($thre_id, $page);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($responseInfo);
        exit();
    }

    public function resWriteAction()
    {
        // レス投稿処理
        $query = $this->request->getPost();
        $thread = new ThreadModel();
        $thread->addResponse($query);

        // 投稿処理後、スレッド内容表示画面へリダイレクト
        $http = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
        header('Location: '. $http. $_SERVER['SERVER_NAME']. '/thread/'. $query['thre_id']. '/l20');
    }

    // スレッド新規作成画面表示処理
    public function createAction()
    {
        $threadCreateInfo['session_id'] = sha1(session_id());

        $this->view->assign('threadCreateInfo', $threadCreateInfo);
    }

    // スレッド作成処理
    public function storeAction()
    {
        $query = $this->request->getPost();
        $thread = new ThreadModel();
        $thread->addThread($query);

        // 作成処理後、スレッド内容表示画面へリダイレクト
        $http = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
        header('Location: '. $http. $_SERVER['SERVER_NAME']. '/thread/comp');
    }

    // スレッド作成完了画面表示処理
   public function compAction()
    {
        // スレッド作成時に登録した内容をセッションから取得し、表示
        if (empty($_SESSION['thre_id']) && empty($_SESSION['thre_name'])){
            errorResponse('ページ遷移が不正です。');
        }
        $threadCompInfo['thre_id'] = $_SESSION['thre_id'];
        $threadCompInfo['thre_name'] = $_SESSION['thre_name'];

        $this->view->assign('threadCompInfo', $threadCompInfo);
    }
}
?>
