<?php
/* Smarty version 3.1.30, created on 2017-06-04 08:14:41
  from "D:\wamp\www\Blog\App\Back\View\Public\sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593350f1305b27_00308145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6685467ef25b7ca4a3982b96f57f13f67b7770f' => 
    array (
      0 => 'D:\\wamp\\www\\Blog\\App\\Back\\View\\Public\\sidebar.html',
      1 => 1496505454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593350f1305b27_00308145 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <div id="sidebar">
            <div id="searchbox" style="z-index: 880;">
                <div class="in" style="z-index: 870;">
                    <p class="text-center font18 line-height35">此广告位常年招商</p>
                </div>
            </div>
            <!-- start sidemenu -->
            <div id="sidemenu">
            	<ul>
                	<li class="active"><a href="index.html"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/laptop.png" width="16" height="16" alt="icon"/>控制面板</a></li>
                    <!-- 分类管理 -->
                    <li class="subtitle">
                        <a class="action tips-right" href="#" title="分类管理"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/key.png" width="16" height="16" alt="icon"/>分类管理<img src="Public/<?php echo @constant('PLAT');?>
/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /></a>
                        <ul class="submenu display-block">
                            <li><a href="index.php?p=back&m=category"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/file.png" width="16" height="16" alt="icon"/>分类列表</a></li>
                            <li><a href="index.php?p=back&m=category&a=add"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/file_add.png" width="16" height="16" alt="icon"/>添加分类</a></li>
                        </ul>
                    </li>
                    <!-- 分类管理 -->

                    <!-- 博文管理 -->
                    <li class="subtitle">
                    	<a class="action tips-right" href="#" title="博文管理"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/mail.png" width="16" height="16" alt="icon"/>博文管理<img src="Public/<?php echo @constant('PLAT');?>
/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /></a>
                    	<ul class="submenu display-block">
                        <li><a href="index.php?p=Back&m=Article&a=add"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/file_add.png" width="16" height="16" alt="icon"/>添加博文</a></li>
                        <li><a href="index.php?p=Back&m=Article"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/file.png" width="16" height="16" alt="icon"/>博文列表</a></li>
                        </ul>
                    </li>
                    <!-- 博文管理 -->

                    <!-- 用户管理 -->
                    <li class="subtitle">
                        <a class="action tips-right" href="#" title="用户管理"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/user.png" width="16" height="16" alt="icon"/>用户管理<img src="Public/<?php echo @constant('PLAT');?>
/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /></a>
                        <ul class="submenu display-block">
                            <li><a href="userAdd.html"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/user_add.png" width="16" height="16" alt="icon"/>添加用户</a></li>
                            <li><a href="index.php?p=back&m=User"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/file.png" width="16" height="16" alt="icon"/>用户列表</a></li>
                        </ul>
                    </li>
                    <!-- 用户管理 -->

                    <!-- 评论管理 -->
                    <li><a href="index.php?p=back&m=comment"><img src="Public/<?php echo @constant('PLAT');?>
/img/icons/sidemenu/file.png" width="16" height="16" alt="icon"/>评论列表</a></li>
                    <!-- 评论管理 -->
                </ul>
            </div>
            <!-- end sidemenu -->
        </div><?php }
}
