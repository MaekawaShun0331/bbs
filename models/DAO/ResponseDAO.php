<?php

require_once "DAOBase.php";
class ResponseDAO extends DAOBase
{

    // レス内容取得
    public function getResponseList($thre_id)
    {
        $stmt = $this->pdo->prepare("SELECT res_no, user_name, user_id, res_text, createdy
                                     FROM response WHERE thre_id = ?");
        $stmt->execute([$thre_id]);
        $reses = $stmt->fetchAll();
        return $reses;
    }
    // 指定件数内の最新レス内容取得
    public function getLimitedResponseList($thre_id,$limit)
    {
        $stmt = $this->pdo->prepare("SELECT res_no, user_name, user_id, res_text, createdy
                                     FROM response
                                     WHERE thre_id = :thre_id
                                     AND res_no = 1
                                     UNION
                                     SELECT res_no, user_name, user_id, res_text, createdy FROM
                                      (SELECT res_no, user_name, user_id, res_text, createdy
                                       FROM response
                                       WHERE thre_id = :thre_id
                                       ORDER BY res_no desc
                                       LIMIT :limit ) as latest
                                     ORDER BY res_no");
        $stmt->bindParam(':thre_id', $thre_id, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $reses = $stmt->fetchAll();
        return $reses;
    }

    // 指定範囲内のレス内容取得
    public function getPagingResponseList($thre_id,$pageFrom,$pageTo)
    {
        $stmt = $this->pdo->prepare("SELECT res_no, user_name, user_id, res_text, createdy
								     FROM response
								     WHERE thre_id = :thre_id
								     AND (res_no = 1 or res_no BETWEEN :pageFrom AND :pageTo)
								     ORDER BY res_no");
        $stmt->bindParam(':thre_id', $thre_id, PDO::PARAM_INT);
        $stmt->bindParam(':pageFrom', $pageFrom, PDO::PARAM_INT);
        $stmt->bindParam(':pageTo', $pageTo, PDO::PARAM_INT);
        $stmt->execute();
        $reses = $stmt->fetchAll();
        return $reses;
    }

    // 新規レス登録
    public function addResponse($query)
    {
        // 同一スレッド内の最新レス番の取得
        $stmt = $this->pdo->prepare("SELECT max(res_no) as newno FROM response WHERE thre_id = ?");
        $stmt->execute([$query['thre_id']]);
        $res_no = $stmt->fetchAll(PDO::FETCH_COLUMN)[0];

        // 存在しないスレッドだった場合
        if($res_no == 0){
            errorResponse("不正なレス投稿です。");
        }

        // スレッド上限チェック
        if($res_no >= 1000){
            errorResponse("スレッドのレス数が1000件に達しています。これ以上の投稿は出来ません。");
        }
        // 投稿日時等を取得する
        $createdy = date("Y-m-d H:i:s");
        // データの登録
        $stmt = $this->pdo->prepare("INSERT INTO response VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$query['thre_id'], $res_no+1, $query['name'], "00000000", $query['text'], $createdy]);
    }

}
?>
