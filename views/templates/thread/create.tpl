<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8">
<title>新規スレッド</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body text=#000000 link=#0000FF alink=#FF0000 vlink=#660099 bgcolor=#FFFFFF background="/img/img180206104407.jpg">
<table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center>
<tr><td><table border=0 cellpadding=4 width=99% align=center>
<tr><td nowrap width='99%'><font size=+1 color=#000000><b>新規スレッド作成</b></font></td>
    <td nowrap align=right valign=top>&nbsp;</td></tr>
<tr><td colspan=2>
<ul style="line-height: 123%;">
★<font color="red"><b>単発質問スレッド禁止！</b></font> 自分の質問のためにスレッドを立ててはいけません。<br>
<br>
★マルチポスト禁止！ 【マルチポスト＝複数の場所に同じ投稿をすること】<br>
　 レスは気長に待とう。他所で質問するときは「質問を取り下げます」と断ってから。<br>
<br>
★著作権侵害などの違法行為に関係すると思われる質問・話題は禁止です。<br>
<br>
★荒らしは完全無視＆放置してください。無視できないあなたも荒らしです。<br>
</ul>
<form method=POST action="/thread/store">
<table border=0 cellspacing=2 width=100%>
<tr><td nowrap align="right" width=16%>タイトル：</td><td><input name="thre_name" size="40" maxlength=40>&nbsp; &nbsp;<input type=submit name=submit value="新規スレッド書込"></td></tr>
<tr><td></td><td>（全角２０文字以内で入力してください。）</td></tr>
<tr><td nowrap align="right" width=16%>名 前：</td><td nowrap><input name="name" size=19 maxlength=20>：（全角１０文字以内で入力してください。）</td></tr>
<tr><td nowrap align="right" valign="top">内 容：</td><td><textarea rows=5 cols=60 wrap=OFF name="text" maxlength=400 style="margin:3px;"></textarea><br>
<div style="margin: 3px;">（全角２００文字以内で入力してください）</div>
</td></tr>
</table>
<input type="hidden" name="token" value="{$threadCreateInfo.session_id|escape}">
</form>
</td></tr>
</table></td></tr>
<tr><td align=center style="padding:5px; font-size:small;"><a href="/">掲示板に戻る</a></td></tr>
</table><br>
</body></html>
