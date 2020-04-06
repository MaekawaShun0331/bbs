<?php

require_once "ControllerBase.php";
require_once "ThreadModel.php";

class IndexController extends ControllerBase
{

    /*Controllerではデータの取得・ビューへの割り当てのみ行う*/

    // TOP画面内容表示処理
    public function indexAction()
    {

        // TOP画面内容情報取得
        // TODO 本来はBBSModelやTopModel等でModelを分けるべき
        $thread = new ThreadModel();
        $bbsTopInfo = $thread->getBbsTopInfo();

        $this->view->assign('bbsTopInfo', $bbsTopInfo);

    }
}
?>
