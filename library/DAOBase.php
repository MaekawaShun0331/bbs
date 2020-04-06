<?php

class DAOBase
{
    private static $connInfo;
    protected $pdo;
    protected $name;

    public function __construct()
    {
        $this->initDb();
    }

    public function initDb()
    {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8',
            self::$connInfo['host'],
            self::$connInfo['dbname']
            );
        // 接続
        $this->pdo = new PDO($dsn, self::$connInfo['dbuser'], self::$connInfo['password']);
        // SQL実行時に例外を投げるように設定
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // デフォルトのフェッチモードを連想配列形式に設定
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function setConnectionInfo($connInfo)
    {
        self::$connInfo = $connInfo;
    }
}

?>
