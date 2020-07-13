<!DOCTYPE html>
<html lang="ja">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/read.js"></script>
<title>掲示板</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>

<body text=#000000 link=#0000FF alink=#FF0000 vlink=#660099 bgcolor=#EFEFEF style="margin: 10px;">
<hr style="background-color:#888;color:#888;border-width:0;height:1px;position:relative;" />
{if isset($threadInfo.addCompMsg)}
{$threadInfo.addCompMsg|escape}<br><br>
{/if}
<font size=4 color="#FF0000">{$threadInfo.thre_name|escape}</font><br>
<dl id="thread">
    <dt>1 名前：<font color=green><b>[読み込み中。。。]</b></font> ：[読み込み中。。。]
    <dd>[読み込み中。。。]<br><br>
</dl>
<hr style="background-color:#888;color:#888;" />
<b><a href="javascript:void 0;" id="top">掲示板に戻る</a> <a href="javascript:void 0;" id="all">全部</a> <a href="javascript:void 0;" id="f100">前100</a> <a href="javascript:void 0;" id="b100">後100</a> <a href="javascript:void 0;" id="l20">最新20</a> <a href="javascript:void 0;" id="reload">リロード</a></b>
<form id="postForm" method=POST action="javascript:void 0;">
<input type="hidden" name="token" value="{$threadInfo.token|escape}">
<input type="hidden" name="thre_id" value="{$threadInfo.thre_id|escape}">
<input type=submit value="書き込む" name="submit"> 名前：<input name="name" size=19 maxlength=20>：（全角１０文字以内で入力してください。）<br>
<textarea rows=5 cols=64 wrap=OFF name="text"  maxlength=400 style="margin: 0px;"></textarea>
<br>（全角２００文字以内で入力してください）
</form><br></body>
</html>
