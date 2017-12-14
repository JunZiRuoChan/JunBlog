<?php
#项目单一入口文件
#定义入口安全口令
define('ACCESS', TRUE);
#引入初始化文件
include_once "Core/App.class.php";
#触发类工作：通常初始化类是静态资源
\Core\App::run();		#类资源使用了命名空间 完全限定名称

