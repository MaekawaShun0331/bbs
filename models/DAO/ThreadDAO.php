<?php

require_once "DAOBase.php";
class ThreadDAO extends DAOBase
{

    // スレッド一覧取得
    public function getThreadList()
    {
        $stmt = $this->pdo->prepare("SELECT th.thre_id, th.thre_name, re.newres
							         FROM thread th
							         INNER JOIN (SELECT thre_id, max(createdy) as updatedy, max(res_no) as newres
           					                     FROM response GROUP BY thre_id) re
							         ON th.thre_id = re.thre_id
							         ORDER BY re.updatedy desc");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    // 件数制限ありのスレッド一覧取得
    public function getLimitedThreadList($limit)
    {
        $stmt = $this->pdo->prepare("SELECT th.thre_id, th.thre_name, re.newres
							         FROM thread th
							         INNER JOIN (SELECT thre_id, max(createdy) as updatedy, max(res_no) as newres
           					                     FROM response GROUP BY thre_id) re
							         ON th.thre_id = re.thre_id
							         ORDER BY re.updatedy desc
							         LIMIT :limit ");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    // スレッド名取得
    public function getThreadName($thre_id)
    {
        $stmt = $this->pdo->prepare("SELECT thre_name FROM thread WHERE thre_id = :thre_id");
        $stmt->bindParam(':thre_id', $thre_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    // 新規スレッド作成
    // 作成したスレッドのスレッドIDを返す
    public function addThread($query)
    {
        // 同一スレッド内の最新レス番の取得 TODO排他制御どうする？
        $stmt = $this->pdo->prepare("SELECT max(thre_id) as newid FROM thread");
        $stmt->execute();
        $thre_id = $stmt->fetchAll(PDO::FETCH_COLUMN)[0]+1;

        // 作成日時等を取得する
        $createdy = date("Y-m-d H:i:s");

        // スレッドの登録
        $stmt = $this->pdo->prepare("INSERT INTO thread VALUES (?, ?, ?)");
        $stmt->execute([$thre_id, $query['thre_name'], $createdy]);

        // 1レス目の登録
        $stmt = $this->pdo->prepare("INSERT INTO response VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$thre_id, 1, $query['name'], "00000000", $query['text'], $createdy]);

        return $thre_id;
    }

}
?>
