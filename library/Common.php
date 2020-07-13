<?php

//const ERMESSAGE = 'erMessage';
//const IPADRESS = '192.168.100.100';

// 同一セッションから送られたリクエストか検査する
function checkToken($token){
    if(sha1(session_id()) !== $token){
        errorResponse('入力が不正です。');
    }
}

// 項目が入力されているか検査する
function checkRequired($str, $erMessage) {
	if(empty($str)){
		errorResponse($erMessage);
	}
}

// 項目の桁数を検査する
function checkDigit($str, $digit, $erMessage){
	if(strlen(mb_convert_encoding($str, 'SJIS', 'UTF-8')) > $digit){
		errorResponse($erMessage);
	}
}

// エラー画面を返す
function errorResponse($erMessage){
// 	// エラーメッセージを設定
// 	$_SESSION[ERMESSAGE] = $erMessage;

// 	// ステータスコードを出力
// 	http_response_code( 301 ) ;

// 	// リダイレクト
// 	header( "Location: https://".IPADRESS."/bbs/error.php" ) ;
    echo $erMessage;
	exit ;
}
?>