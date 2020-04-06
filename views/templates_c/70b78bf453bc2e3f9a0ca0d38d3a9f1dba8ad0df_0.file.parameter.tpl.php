<?php
/* Smarty version 3.1.30, created on 2020-03-30 14:33:52
  from "C:\workspace\bbs\views\templates\thread\parameter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e8184c0229218_01348062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70b78bf453bc2e3f9a0ca0d38d3a9f1dba8ad0df' => 
    array (
      0 => 'C:\\workspace\\bbs\\views\\templates\\thread\\parameter.tpl',
      1 => 1585288628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8184c0229218_01348062 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/read.js"><?php echo '</script'; ?>
>
<title>掲示板</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>

<body text=#000000 link=#0000FF alink=#FF0000 vlink=#660099 bgcolor=#EFEFEF style="margin: 10px;">
<hr style="background-color:#888;color:#888;border-width:0;height:1px;position:relative;" />
<?php if (isset($_smarty_tpl->tpl_vars['threadInfo']->value['addCompMsg'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['threadInfo']->value['addCompMsg'], ENT_QUOTES, 'UTF-8', true);?>
<br><br>
<?php }?>
<font size=4 color="#FF0000"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['threadInfo']->value['thre_name'], ENT_QUOTES, 'UTF-8', true);?>
</font><br>
<dl id="thread">
    <dt>1 名前：<font color=green><b>[読み込み中。。。]</b></font> ：[読み込み中。。。]
    <dd>[読み込み中。。。]<br><br>
</dl>
<hr style="background-color:#888;color:#888;" />
<b><a href="javascript:void 0;" id="top">掲示板に戻る</a> <a href="javascript:void 0;" id="all">全部</a> <a href="javascript:void 0;" id="f100">前100</a> <a href="javascript:void 0;" id="b100">後100</a> <a href="javascript:void 0;" id="l20">最新20</a> <a href="javascript:void 0;" id="reload">リロード</a></b>
<form id="postForm" method=POST action="javascript:void 0;">
<input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['threadInfo']->value['token'], ENT_QUOTES, 'UTF-8', true);?>
">
<input type="hidden" name="thre_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['threadInfo']->value['thre_id'], ENT_QUOTES, 'UTF-8', true);?>
">
<input type=submit value="書き込む" name="submit"> 名前：<input name="name" size=19 maxlength=20>：（全角１０文字以内で入力してください。）<br>
<textarea rows=5 cols=64 wrap=OFF name="text"  maxlength=400 style="margin: 0px;"></textarea>
<br>（全角２００文字以内で入力してください）
</form><br></body>
</html>
<?php }
}
