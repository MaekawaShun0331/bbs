<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8">
<title>スレッド一覧</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body text=#000000 link=#0000FF alink=#FF0000 vlink=#660099 bgcolor=#FFFFFF background="/img/img180206104407.jpg">
<h1>スレッド一覧</h1>
<table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center><tr><td><small>
{foreach from=$threadList item=thread name=foo}
	<a href="/thread/{$thread.thre_id|escape}/l20" target="body">{$smarty.foreach.foo.iteration}: {$thread.thre_name|escape} ({$thread.newres|escape})</a>
{/foreach}
<b><a href="/" style="display:block;text-align:right;">掲示板に戻る</a></b>
</small></td></tr></table></body></html>