<?php

require_once "RequestVariables.php";

class RootParameter extends RequestVariables
{
    protected function setValues()
    {
        // パラメーター取得（末尾の / は削除）
        $param = preg_replace('/^\/?/', '', $_SERVER['REQUEST_URI']);
        $param = preg_replace('/\/?$/', '', $param);

        $params = array();
        if ($param != '') {
            // パラメーターを / で分割
            $params = explode('/', $param);
        }
        // 2番目以降のパラメーターを順に_valuesに格納
        $i = 0;
        if (count($params) > 1) {
            for ($i = 1; $i < count($params); $i++) {
                $this->_values[] = $params[$i];
            }
        }
    }
}

?>
