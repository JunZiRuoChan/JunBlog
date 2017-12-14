<?php
/* Smarty version 3.1.30, created on 2017-06-05 23:45:13
  from "D:\wamp\www\Blog\App\Back\View\Public\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59357c89835a30_13851150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad8fee6ff5d6c0b399fffe0ceb0d10fc53049526' => 
    array (
      0 => 'D:\\wamp\\www\\Blog\\App\\Back\\View\\Public\\header.html',
      1 => 1496673604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59357c89835a30_13851150 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="header">
    	<!-- logo -->
    	<div class="logo">	<a href="index.php?p=back"><span class="logo-text text-center font18">博客后台</span></a>	</div>

        <!-- notifications -->
        <div id="notifications">
          <div class="clear"></div>
        </div>

        <!-- quick menu -->
        <div id="quickmenu">
            <a href="index.php?p=back&m=article&a=add" class="qbutton-left tips" title="新增一篇博客"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/header/newpost.png" width="18" height="14" alt="new post" /></a>
            <a href="index.php" target="__blank" class="qbutton-right tips" title="直达前台"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/magnify.png" width="18" height="14" alt="new post" /></a>
            <div class="clear"></div>
        </div>

        <!-- profile box -->
        <div id="profilebox">
        	<a href="#" class="display">
            	<img src="Public/<?php echo @constant('PLAT');?>
/img/simple-profile-img.jpg" width="33" height="33" alt="profile"/> <span>管理员</span> <b>昵称：<?php echo $_SESSION['user']['a_username'];?>
</b>
            </a>

            <div class="profilemenu">
            	<ul>
                	<li><a href="index.php?p=back&m=Index&a=logout">退出</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div><?php }
}
