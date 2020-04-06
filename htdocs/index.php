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
$config = parse_ini_file('../dbConfig.ini');
// DB接続情報設定
$connInfo = array(
    'host'     => $config['host'],
    'dbname'   => $config['dbname'],
    'dbuser'   => $config['dbuser'],
    'password' => $config['password']
);
DAOBase::setConnectionInfo($connInfo);

session_start();
//リクエスト処理
$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot(ROOT_PATH);
$dispatcher->dispatch();

?>
