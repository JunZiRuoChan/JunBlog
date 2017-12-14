<?php
/* Smarty version 3.1.30, created on 2017-05-29 20:03:19
  from "D:\wamp\www\Blog\App\Back\View\Privilege\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592c0e07dba599_83778336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '702fa4e4eebde34fd7634e9102115585cec5a230' => 
    array (
      0 => 'D:\\wamp\\www\\Blog\\App\\Back\\View\\Privilege\\login.html',
      1 => 1496058258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592c0e07dba599_83778336 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>博客后台</title>
	<link rel="stylesheet" type="text/css" href="Public/<?php echo @constant('PLAT');?>
/css/app.css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="Public/<?php echo @constant('PLAT');?>
/js/app.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="loginform">
    	<div class="title"> <span class="logo-text font18">博客后台管理系统</span></div>
        <div class="body">
       	  <form id="form1" name="form1" method="post" action="index.php">
          <input type="hidden" name="p" value="Back" />
          <input type="hidden" name="m" value="Privilege" />
          <input type="hidden" name="a" value="check" />
          	<label class="log-lab">用户名</label>
            <input name="username" type="text" class="login-input-user" id="textfield" value=""/>
          	<label class="log-lab">密码</label>
            <input name="password" type="password" class="login-input-pass" id="textfield" value=""/>
			<label class="log-lab">验证码</label>
			<div class="padding-bottom5"><img src="http://localhost/php-47/web/index.php?p=backend&amp;c=User&amp;a=captcha" width="220" height="30"></div>
			<input name="captcha" type="text" class="login-input" id="textfield" value=""/>
			<label class="log-lab"><input type="checkbox" name="rememberMe" class="uniform"> 7天内自动登录</label>
            <input type="submit" name="button" id="button" value="登录" class="button"/>
       	  </form>
        </div>
    </div>
</div>
</body>
</html>
<?php }
}
