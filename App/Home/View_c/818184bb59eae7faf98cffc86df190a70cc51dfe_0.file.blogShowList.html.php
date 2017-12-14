<?php
/* Smarty version 3.1.30, created on 2017-06-02 20:24:52
  from "D:\wamp\www\Blog\App\home\View\Index\blogShowList.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59315914e9def1_30784557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '818184bb59eae7faf98cffc86df190a70cc51dfe' => 
    array (
      0 => 'D:\\wamp\\www\\Blog\\App\\home\\View\\Index\\blogShowList.html',
      1 => 1496394018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59315914e9def1_30784557 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>博文列表</title>
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
</head>

<!-- Body -->
<body>
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close-btn" data-dismiss="modal" aria-label="关闭"><span aria-hidden="true">&times;</span></button>
        <div class="modal-content text-center">
          <h4>登录</h4>
          <form method="post">
            <input type="username" class="form-control" placeholder="请您填写用户名" required>
            <input type="password" class="form-control" placeholder="请您填写密码" required>
            <div class="form-group">
              <button type="submit" class="btn login-btn btn-default waves-effect waves-light">立刻登录<i class="icon-head"></i></button>
            </div>
            <div class="text-left">
              <span class="text-sm text-semibold">新用户? <a href="#" data-toggle="modal" data-target="#registerModal">立即注册</a></span>
            </div>
          </form><!-- <form> -->
        </div><!-- .modal-content -->
      </div><!-- .modal-dialog -->
    </div><!-- .modal.fade -->

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close-btn" data-dismiss="modal" aria-label="关闭"><span aria-hidden="true">&times;</span></button>
        <div class="modal-content text-center">
          <h4>注册</h4>
          <form method="post">
            <input name="username" type="text" class="form-control" placeholder="请您填写用户名" required>
            <input name="email" id="email" type="email" class="form-control" placeholder="请您填写邮箱" required>
            <input name="password" type="password" class="form-control" placeholder="请您填写密码" required>
            <div class="form-group">
              <a href='javascript:window.open("&email="+$("#email").val())'  target="_blank" class="btn btn-primary waves-effect waves-light">发送邮件验证码 <i class="fa fa-envelope"></i></a>
            </div>
            <input name="captcha" type="text" class="form-control" placeholder="请您填写邮件验证码" required>
            <div class="form-group">
              <button type="submit" class="btn login-btn btn-default waves-effect waves-light">立刻注册<i class="icon-head"></i></button>
            </div>
            <div class="text-left">
              <span class="text-sm text-semibold">已注册? <a href="#" data-toggle="modal" data-target="#loginModal">立即登录</a></span>
            </div>
          </form><!-- <form> -->
        </div><!-- .modal-content -->
      </div><!-- .modal-dialog -->
    </div><!-- .modal.fade -->

    <!-- Navbar -->
    <!-- Add class ".navbar-sticky" to make navbar stuck when it hits the top of the page. Another modifier class is: "navbar-fullwidth" to stretch navbar and make it occupy 100% of the page width. The screen width at which navbar collapses can be controlled through the variable "$nav-collapse" in sass/variables.scss -->
    <header class="navbar">
      
      <!-- Toolbar -->
      <div class="topbar">
        <div class="container">
          <a href="index.html" class="site-logo">
            博文前台
          </a><!-- .site-logo -->

          <!-- Mobile Menu Toggle -->
          <div class="nav-toggle"><span></span></div>

          <div class="toolbar">
            <!-- <a href="#" class="text-sm">退出登录</a> -->
            <a href="#" class="btn btn-sm btn-default btn-icon-right waves-effect waves-light" data-toggle="modal" data-target="#loginModal">立刻登录 <i class="icon-head"></i></a>
          </div><!-- .toolbar -->
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
              <h1>博文内容列表</h1>
            </div><!-- .title -->
          </div><!-- .column -->
          <div class="column">
          </div><!-- .column -->
        </div>
      </div>
    </section><!-- .page-title -->

    <!-- Container -->
    <div class="container">
      <div class="row">

        <!-- Content -->
        <div class="col-lg-9 col-md-8">
          <!-- Post -->
          <article class="post-item">
            <a href="post-right-sidebar.html" class="post-thumb waves-effect">
              <img src="Public/<?php echo @constant('PLAT');?>
/img/blog/post01.jpg" alt="Post01">
            </a><!-- .post-thumb -->
            <div class="post-body">
              <div class="post-meta">
                <div class="column">
                  <span>
                    <i class="icon-head"></i>
                    <a href="#">刘德华</a>
                  </span>
                  <span>在</span>
                  <span>
                    <i class="icon-ribbon"></i>
                    <a href="#">科技</a>
                  </span>
                  <span>下发布</span>
                  <span class="post-comments">
                    <i class="icon-speech-bubble"></i>
                    <a href="#">12</a>
                  </span>
                </div>
                <div class="column"><span>2016-08-30</span></div>
              </div><!-- .post-meta -->
              <h3 class="post-title">Reading Design &amp; Typing Art</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ullamco laboris nisi ut aliquip ex ea co...</p>
              <a href="blogShow.html">点击阅读更多</a>
            </div><!-- .post-body -->
          </article><!-- .post-item -->

          <article class="post-item">
            <div class="post-body">
              <div class="post-meta">
                <div class="column">
                  <span>
                    <i class="icon-head"></i>
                    <a href="#">刘德华</a>
                  </span>
                  <span>在</span>
                  <span>
                    <i class="icon-ribbon"></i>
                    <a href="#">美食</a>
                  </span>
                  <span>下发布</span>
                  <span class="post-comments">
                    <i class="icon-speech-bubble"></i>
                    <a href="#">12</a>
                  </span>
                </div>
                <div class="column"><span>2016-08-30</span></div>
              </div><!-- .post-meta -->
              <h3 class="post-title">Reading Design &amp; Typing Art</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ullamco laboris nisi ut aliquip ex ea co...</p>
              <a href="blogShow.html">点击阅读更多</a>
            </div><!-- .post-body -->
          </article><!-- .post-item -->

          <!-- Pagination -->
          <ul class="pagination">
             <li><a href="#">[首页]</a></li>
             <li><a href="#">[上一页]</a></li>
             <li><a href="#">[下一页]</a></li>
             <li><a href="#">[末页]</a></li>
             <li>共有 16 条记录,每页显示 3 条记录， 当前为 1/6</li>
          </ul>
        </div><!-- .col-lg-9.col-md-8 -->

        <!-- Sidebar -->
        <div class="col-lg-3 col-md-4">
          <div class="space-top-2x visible-sm visible-xs"></div>
          <aside class="sidebar">
            <section class="widget widget_search">
              <form method="post" class="search-box">
                <input type="text" class="form-control" placeholder="按标题搜索博文">
                <button type="submit"><i class="icon-search"></i></button>
              </form>
            </section>
            <section class="widget widget_categories">
              <h3 class="widget-title">
                <i class="icon-ribbon"></i>
                分类
              </h3>
              <ul>
                <li><a href="#">Support<span>3</span></a></li>
                <li><a href="#">Design<span>4</span></a></li>
                <li><a href="#">Hosting<span>11</span></a></li>
                <li><a href="#">Development<span>6</span></a></li>
              </ul>
            </section><!-- .widget.widget_categories -->
            <section class="widget widget_recent_posts">
              <h3 class="widget-title">
                <i class="icon-paper"></i>
                最新博文
              </h3>
              <div class="item">
                <div class="thumb">
                  <a href="post-right-sidebar.html"><img src="Public/<?php echo @constant('PLAT');?>
/img/blog/sidebar/post01.jpg" alt="Post01"></a>
                </div>
                <div class="info">
                  <h4><a href="post-right-sidebar.html">Fast and Easy Prototyping App</a></h4>
                </div>
              </div><!-- .item -->
              <div class="item">
                <div class="thumb">
                  <a href="post-right-sidebar.html"><img src="Public/<?php echo @constant('PLAT');?>
/img/blog/sidebar/post02.jpg" alt="Post02"></a>
                </div>
                <div class="info">
                  <h4><a href="post-right-sidebar.html">Resize Your Server in a Single Click</a></h4>
                </div>
              </div><!-- .item -->
              <div class="item">
                <div class="thumb">
                  <a href="post-right-sidebar.html"><img src="Public/<?php echo @constant('PLAT');?>
/img/blog/sidebar/post03.jpg" alt="Post03"></a>
                </div>
                <div class="info">
                  <h4><a href="post-right-sidebar.html">Advanced Mobile App Development</a></h4>
                </div>
              </div><!-- .item -->
            </section><!-- .widget.widget_recent_posts -->
            <section class="widget widget_tag_cloud">
              <h3 class="widget-title">
                <i class="icon-tag"></i>
                标签集
              </h3>
              <a href="#">Design</a>
              <a href="#">Development</a>
              <a href="#">Hosting</a>
              <a href="#">Domains</a>
            </section><!-- .widget.widget_tag_cloud -->
          </aside><!-- .sidebar -->
        </div><!-- .col-lg-3.col-md-4 -->
      </div><!-- .row -->
    </div><!-- .container -->

    <!-- Scroll To Top Button -->
    <a href="#" class="scroll-to-top-btn">
      <i class="icon-arrow-up"></i> 
    </a><!-- .scroll-to-top-btn -->

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
