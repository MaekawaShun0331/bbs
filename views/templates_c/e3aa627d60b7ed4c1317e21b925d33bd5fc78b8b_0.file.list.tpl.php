<?php
/* Smarty version 3.1.30, created on 2020-03-30 14:32:57
  from "C:\workspace\bbs\views\templates\thread\list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e818489b62b25_57442160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3aa627d60b7ed4c1317e21b925d33bd5fc78b8b' => 
    array (
      0 => 'C:\\workspace\\bbs\\views\\templates\\thread\\list.tpl',
      1 => 1585288612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e818489b62b25_57442160 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8">
<title>スレッド一覧</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body text=#000000 link=#0000FF alink=#FF0000 vlink=#660099 bgcolor=#FFFFFF background="/img/img180206104407.jpg">
<h1>スレッド一覧</h1>
<table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center><tr><td><small>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['threadList']->value, 'thread', false, NULL, 'foo', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['thread']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']++;
?>
	<a href="/thread/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['thre_id'], ENT_QUOTES, 'UTF-8', true);?>
/l20" target="body"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration'] : null);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['thre_name'], ENT_QUOTES, 'UTF-8', true);?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['newres'], ENT_QUOTES, 'UTF-8', true);?>
)</a>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<b><a href="/" style="display:block;text-align:right;">掲示板に戻る</a></b>
</small></td></tr></table></body></html><?php }
}
