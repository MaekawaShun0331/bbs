<?php
/* Smarty version 3.1.30, created on 2020-03-30 14:32:51
  from "C:\workspace\bbs\views\templates\index\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e818483c17f70_35318888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0616cf10bab2ac938c58180c872a5d7acbf8ac9' => 
    array (
      0 => 'C:\\workspace\\bbs\\views\\templates\\index\\index.tpl',
      1 => 1585546335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e818483c17f70_35318888 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bbsTopInfo']->value['threadHeaderList'], 'thread', false, NULL, 'foo', array (
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

<a href="/thread/list" style="display:block;text-align:right;"><b>スレッド一覧はこちら</b></a></small></td></tr></table>

<center><table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center>
<tr><td align=center>
<input type="button" onclick="location.href='/thread/create'" value="新規スレッド書き込み画面へ" /></td></tr></table></center><br>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bbsTopInfo']->value['threadDetailList'], 'thread', false, NULL, 'foo', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['thread']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']++;
?>
    <table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor="#EFEFEF" align=center><tr><td><dl>
    <b>【<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration'] : null);?>
:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['newres'], ENT_QUOTES, 'UTF-8', true);?>
】<font size=5 color="#FF0000"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['thre_name'], ENT_QUOTES, 'UTF-8', true);?>
</font></b><br><br>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['thread']->value['reses'], 'res', false, NULL, 'bar', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
        <dt><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['res']->value['res_no'], ENT_QUOTES, 'UTF-8', true);?>
 名前：<font color=green><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['res']->value['user_name'], ENT_QUOTES, 'UTF-8', true);?>
</b></font> ：<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['res']->value['createdy'], ENT_QUOTES, 'UTF-8', true);?>
 ID:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['res']->value['user_id'], ENT_QUOTES, 'UTF-8', true);?>

        <dd><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['res']->value['res_text'], ENT_QUOTES, 'UTF-8', true));?>
<br><br>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <dd><form method=POST action="/thread/resWrite">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bbsTopInfo']->value['token'], ENT_QUOTES, 'UTF-8', true);?>
">
    <input type="hidden" name="thre_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['thre_id'], ENT_QUOTES, 'UTF-8', true);?>
">
    <input type=submit value="書き込む" name="submit"> 名前：<input name="name" size=19 maxlength=20>：（全角１０文字以内で入力してください。）<br>
    <textarea rows=5 cols=64 wrap=OFF name="text" maxlength=400></textarea>
    <br><div style="margin: 4px 20px;">（全角２００文字以内で入力してください）</div>
    </form>
    <dd><b><a href="/thread/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['thre_id'], ENT_QUOTES, 'UTF-8', true);?>
">全部読む</a> <a href="/thread/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['thre_id'], ENT_QUOTES, 'UTF-8', true);?>
/l20">最新20</a> <a href="/thread/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thread']->value['thre_id'], ENT_QUOTES, 'UTF-8', true);?>
/1-100">1-100</a> <a href="#menu">板のトップ</a> <a href="/">リロード</a></b>
    </dl></td></tr></table><br>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<center><table border=1 cellspacing=7 cellpadding=3 width=95% bgcolor=#CCFFCC align=center>
<tr><td align=center>
<input type="button" onclick="location.href='/thread/create'" value="新規スレッド書き込み画面へ" /></td></tr></table></center><br>

</body>
</html>
<?php }
}
