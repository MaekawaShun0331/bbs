<?php

class Dispatcher
{
    private $sysRoot;
    //TODO iniファイルから呼んだほうがよい
    public function setSystemRoot($path)
    {
        $this->sysRoot = rtrim($path, '/');
    }

    public function dispatch()
    {
        // パラメーター取得（先頭・末尾の / は削除）
        $param = preg_replace('/^\/?/', '', $_SERVER['REQUEST_URI']);
        $param = preg_replace('/\/?$/', '', $param);

        $params = array();
        if ($param != '') {
            // パラメーターを / で分割
            $params = explode('/', $param);
        }

        // １番目のパラメーターをコントローラーとして取得
        $controller = 'index';
        if (count($params) > 0) {
            $controller = $params[0];
        }

        // １番目のパラメーターをもとにコントローラークラスインスタンス取得
        $controllerInstance = $this->getControllerInstance($controller);
        if ($controller == null) {
            header("HTTP/1.0 404 Not Found");
            exit;
        }

        // 2番目のパラメーターをアクションとして取得
        $action= 'index';
        if (count($params) > 1) {
            $action = $params[1];
        }
        // アクションメソッドの存在確認
        if (method_exists($controllerInstance, $action . 'Action') == false) {
            //2番目のパラメーターが指定されているかつ、コントローラーに'parameterAction'が存在する場合、actionに'parameterAction'を指定
            if(count($params) > 1 && method_exists($controllerInstance, 'parameterAction')) {
                $action = 'parameter';
            }
            else {
                header("HTTP/1.0 404 Not Found");
                exit;
            }
        }

        // コントローラー初期設定
        $controllerInstance->setSystemRoot($this->sysRoot);
        $controllerInstance->setControllerAction($controller, $action);
        // 処理実行
        $controllerInstance->run();
    }

    // コントローラークラスのインスタンスを取得
    private function getControllerInstance($controller)
    {
        // 一文字目のみ大文字に変換＋"Controller"
        $className = ucfirst(strtolower($controller)). 'Controller';
        // コントローラーファイル名
        $controllerFileName = sprintf('%s/controllers/%s.php', $this->sysRoot, $className);
        // ファイル存在チェック
        if (false == file_exists($controllerFileName)) {
            return null;
        }
        // クラスファイルを読込
        require_once $controllerFileName;
        // クラスが定義されているかチェック
        if (false == class_exists($className)) {
            return null;
        }
        // クラスインスタンス生成
        $controllerInstarnce = new $className();

        return $controllerInstarnce;
    }
}
?>
