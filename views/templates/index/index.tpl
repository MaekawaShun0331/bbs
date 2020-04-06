<!DOCTYPE html>
<html lang="ja">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>掲示板</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body text=#000000 link=#0000FF alink=#FF0000 vlink=#660099 bgcolor=#FFFFFF background="/img/img180206104407.jpg">
<h1>掲示板</h1>
<a name="menu"></a>
<ul>
</ul>
<table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center><tr><td><small>
{foreach from=$bbsTopInfo.threadHeaderList item=thread name=foo}
	<a href="/thread/{$thread.thre_id|escape}/l20" target="body">{$smarty.foreach.foo.iteration}: {$thread.thre_name|escape} ({$thread.newres|escape})</a>
{/foreach}
<a href="/thread/list" style="display:block;text-align:right;"><b>スレッド一覧はこちら</b></a></small></td></tr></table>

<center><table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center>
<tr><td align=center>
<input type="button" onclick="location.href='/thread/create'" value="新規スレッド書き込み画面へ" /></td></tr></table></center><br>

{foreach from=$bbsTopInfo.threadDetailList item=thread name=foo}
    <table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor="#EFEFEF" align=center><tr><td><dl>
    <b>【{$smarty.foreach.foo.iteration}:{$thread.newres|escape}】<font size=5 color="#FF0000">{$thread.thre_name|escape}</font></b><br><br>
    {foreach from=$thread.reses item=res name=bar}
        <dt>{$res.res_no|escape} 名前：<font color=green><b>{$res.user_name|escape}</b></font> ：{$res.createdy|escape} ID:{$res.user_id|escape}
        <dd>{$res.res_text|escape|nl2br}<br><br>
    {/foreach}
    <dd><form method=POST action="/thread/resWrite">
    <input type="hidden" name="token" value="{$bbsTopInfo.token|escape}">
    <input type="hidden" name="thre_id" value="{$thread.thre_id|escape}">
    <input type=submit value="書き込む" name="submit"> 名前：<input name="name" size=19 maxlength=20>：（全角１０文字以内で入力してください。）<br>
    <textarea rows=5 cols=64 wrap=OFF name="text" maxlength=400></textarea>
    <br><div style="margin: 4px 20px;">（全角２００文字以内で入力してください）</div>
    </form>
    <dd><b><a href="/thread/{$thread.thre_id|escape}">全部読む</a> <a href="/thread/{$thread.thre_id|escape}/l20">最新20</a> <a href="/thread/{$thread.thre_id|escape}/1-100">1-100</a> <a href="#menu">板のトップ</a> <a href="/">リロード</a></b>
    </dl></td></tr></table><br>
{/foreach}

<center><table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center>
<tr><td align=center>
<input type="button" onclick="location.href='/thread/create'" value="新規スレッド書き込み画面へ" /></td></tr></table></center><br>

</body>
</html>
