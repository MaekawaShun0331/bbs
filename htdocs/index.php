<?php

// システムのルートディレクトリパス
define('ROOT_PATH', realpath(dirname(__FILE__) . '/..'));
// ライブラリのディレクトリパス
define('LIB_PATH', realpath(dirname(__FILE__) . '/../library'));

// ライブラリとモデルのディレクトリをinclude_pathに追加
$includes = array(LIB_PATH , ROOT_PATH . '/models');
$incPath = implode(PATH_SEPARATOR, $includes);
set_include_path(get_include_path() . PATH_SEPARATOR . $incPath);

require_once 'DAOBase.php';
require_once 'Dispatcher.php';
require_once 'Common.php';

// DB接続情報設定
$connInfo = array(
    'host'     => 'localhost',
    'dbname'   => 'bbs_maekawa',
    'dbuser'   => 'root',
    'password' => 'rootpass'
);
DAOBase::setConnectionInfo($connInfo );

session_start();
//リクエスト処理
$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot(ROOT_PATH);
$dispatcher->dispatch();

?>
