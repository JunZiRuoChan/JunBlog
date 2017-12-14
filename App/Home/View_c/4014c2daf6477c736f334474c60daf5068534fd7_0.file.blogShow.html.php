<?php
/* Smarty version 3.1.30, created on 2017-06-04 08:40:54
  from "D:\wamp\www\Blog\App\Home\View\article\blogShow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593357168d9da9_33584723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4014c2daf6477c736f334474c60daf5068534fd7' => 
    array (
      0 => 'D:\\wamp\\www\\Blog\\App\\Home\\View\\article\\blogShow.html',
      1 => 1496536845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593357168d9da9_33584723 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\wamp\\www\\Blog\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>博文内容</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link href="Public/<?php echo @constant('PLAT');?>
/css/app.css" rel="stylesheet" media="screen">
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/modernizr.custom.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/detectizr.min.js"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 type="text/javascript" src="Vendor/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
</head>

<!-- Body -->
<body>
<!-- Page Wrapper -->
<div class="page-wrapper">
  <!-- Navbar -->
  <!-- Add class ".navbar-sticky" to make navbar stuck when it hits the top of the page. Another modifier class is: "navbar-fullwidth" to stretch navbar and make it occupy 100% of the page width. The screen width at which navbar collapses can be controlled through the variable "$nav-collapse" in sass/variables.scss -->
  <header class="navbar">

    <!-- Toolbar -->
    <div class="topbar">
      <div class="container">
        <a href="index.php" class="site-logo">
          博文前台
        </a><!-- .site-logo -->
      </div><!-- .container -->
    </div><!-- .topbar -->
  </header><!-- .navbar -->

  <!-- Page Title -->
  <!--Add modifier class : "pt-fullwidth" to stretch page title and make it occupy 100% of the page width. -->
  <section class="page-title">
    <div class="container">
      <div class="inner">
        <div class="column">
          <div class="title">
            <h1>博文内容</h1>
          </div><!-- .title -->
        </div><!-- .column -->
        <div class="column">
        </div><!-- .column -->
      </div>
    </div>
  </section><!-- .page-title -->

  <!-- Container -->
    <div class="container">

      <!-- Content -->
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
          <h1><?php echo $_smarty_tpl->tpl_vars['art']->value['a_name'];?>
</h1>
          <div class="post-meta">
            <div class="column">
              <span>
                <i class="icon-head"></i>
                <a href="#">刘德华</a>
              </span>
              <span>在</span>
              <span>
                <i class="icon-ribbon"></i>
                <a href="#"><?php echo $_smarty_tpl->tpl_vars['art']->value['c_name'];?>
</a>
              </span>
              <span>下发布</span>
              <span class="post-comments">
                <i class="icon-speech-bubble"></i>
                <a href="#"><?php echo $_smarty_tpl->tpl_vars['counts']->value;?>
</a>
              </span>
            </div>
            <div class="column"><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['art']->value['a_publishtime'],"%Y %m %d");?>
</span></div>
          </div><!-- .post-meta -->
          <!-- <img src="Public/<?php echo @constant('PLAT');?>
/img/blog/single/slide01.jpg" alt="Image"> -->
          <p><?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['art']->value['a_content']);?>
</p>
          <div class="post-tools space-top-2x">
            <div class="column">
              <div class="tags-links">
                <a href="#">美食</a>
                <a href="#">教程</a>
                <a href="#">厨艺</a>
              </div>
            </div><!-- .column -->
            <div class="column">
            </div><!-- .column -->
          </div><!-- .post-tools -->
          <div class="post-tools space-top-2x">
            <div class="column"></div>
            <div class="column text-center">
              <a href="index.php?m=article&a=zan&id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
"><i class="fa fa-thumbs-up dz" aria-hidden="true">(<?php echo $_smarty_tpl->tpl_vars['art']->value['a_zan'];?>
)</i></a>
            </div><!-- .column -->
            <div class="column">
            </div><!-- .column -->
          </div><!-- .post-tools -->

          <!-- Comments -->
          <div class="comments-area space-top-3x">
            <h4 class="comments-count">共有<?php echo $_smarty_tpl->tpl_vars['counts']->value;?>
条评论</h4>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
            <!-- Comment -->
            <div class="comment">
              <div class="comment-meta">
                <div class="column">
                  <span class="comment-autor"><i class="icon-head"></i><a href="#"><?php echo $_smarty_tpl->tpl_vars['comment']->value['u_username'];?>
</a></span>
                </div>
                <div class="column">
                  <span class="comment-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value['c_time'],"%Y.%m.%d");?>
</span>
                </div>
              </div><!-- .comment-meta -->
              <div class="comment-body">
                <p><?php echo $_smarty_tpl->tpl_vars['comment']->value['c_content'];?>
</p>
              </div><!-- .comment-body -->

            </div><!-- .comment -->
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            
            
            <!-- Comment Form -->
            <div class="comment-respond">
              <h4 class="comment-reply-title">发布新评论</h4>
              <form method="post" id="comment-form" class="comment-form" action="index.php">
              <input type="hidden" name="m" value="comment" />
              <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
" />
                <div class="form-group">
                  <label for="cf_comment" class="sr-only">Comment</label>
                  <textarea name="comment" id="cf_comment" class="form-control input-alt ckeditor" rows="7" placeholder="输入您的评论"></textarea>
                  <?php echo '<script'; ?>
>CKEDITOR.replace('comment')<?php echo '</script'; ?>
>
                </div>            
                <p class="form-submit">
                  <?php if (isset($_SESSION['u'])) {?>
                  <input name="submit" type="submit" id="submit" class="btn btn-primary btn-block" value="发布">
                  <?php }?>
                </p>
              </form>
            </div><!-- .comment-respond -->
          </div><!-- .comments-area -->
        </div><!-- .col-lg-9.col-md-8 -->
      </div><!-- .row -->
    </div><!-- .container -->

    <!-- Scroll To Top Button -->
    <a href="#" class="scroll-to-top-btn">
      <i class="icon-arrow-up"></i> 
    </a><!-- .scroll-to-top-btn -->

    <!-- Footer -->
    <!-- Footer -->
    <footer class="footer">
      <div class="bottom-footer">
        <div class="container">
          <div class="copyright">
            <div class="column">
              <p>&copy; 2016. 保留所有权利。</p>
            </div><!-- .column -->
            <div class="column">
            </div><!-- .column -->
          </div><!-- .copyright -->
        </div><!-- .container -->
      </div><!-- .bottom-footer -->
    </footer><!-- .footer -->

  </div><!-- .page-wrapper -->

  <!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/waves.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/placeholder.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/waypoints.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/vendor/velocity.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="Public/<?php echo @constant('PLAT');?>
/js/scripts.js"><?php echo '</script'; ?>
>
</body><!-- <body> -->
</html>
<?php }
}
