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

// TODO ホスト名をファイルから読み込むようにする、もしくは別の形式
// 各環境のホスト名により、読み込む設定ファイルを切り替える
switch ($_SERVER["SERVER_NAME"]) {
    // 本番環境の設定
    case ('bbs-maekawa.herokuapp.com'):
        $env = 'prod';
        break;

    // ローカル開発環境の設定
    case ('localhost'):
        $env = 'dev';
        break;

    default:
        trigger_error('環境ホスト名が正しく設定されていません',E_USER_ERROR);
}
$config = parse_ini_file('../env.' . $env);

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
