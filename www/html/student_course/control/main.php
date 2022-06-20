<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/amazeui.min.css">
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/app.css">
<style>
.admin-main {
    padding-top: 0px;
}
a:link {
    display: block;
    text-decoration: none;
    margin: 6px 10px 6px 0px;
    padding: 2px 6px 2px 6px;
    color: #00527f;
    background-color: #d9e8f3;
    border: 1px solid #004266;
}
a:hover {
    color: red;
    background-color: #8cbbda;
}
</style>
</head>
<body>
<body>
<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand"> 
    <p><strong>学生</strong> <small>成绩管理系统</small></p>
  </div>
  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"> <span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span> </button>
</header>
<div class="am-cf admin-main"> 
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
<!--        <li> -->
<!--        <a href="admin-index.html">-->
		<br><br>
        <li class="admin-parent"> <a class="am-cf"  href="student.php" target="right"  ><span class="am-icon-file"></span> &nbsp学生信息 </a> </li>
        <li class="admin-parent"> <a class="am-cf"  href="course.php" target="right"  ><span class="am-icon-file"></span> &nbsp课程信息 </a> </li>
<!--        <li class="admin-parent"> <a class="am-cf" href="salary.php"  target="right" ><span class="am-icon-file"></span> &nbsp工资管理</a></li>-->
      </ul>
      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p> <span class="am-icon-bookmark"></span> 公告 </p>
          <p>欢迎使用管理系统</p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end --> 
  
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <iframe src="student.php" width="100%" height="100%" name="right" style="border: none;"></iframe>
    </div>
  </div>
</div>
<!-- content end -->

</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<footer>
  <hr>
  <p class="am-padding-left">© 2014 womengda.cn, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]--> 

<!--[if (gte IE 9)|!(IE)]><!--> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!--<![endif]--> 
<script src="js/amazeui.min.js"></script> 
<script src="js/app.js"></script> 
<script type="text/javascript" src="myplugs/js/plugs.js"></script> 
<script type="text/javascript">
				//添加编辑弹出层
				function updatePwd(title, id) {
					$.jq_Panel({
						title: title,
						iframeWidth: 500,
						iframeHeight: 300,
						url: "updatePwd.html"
					});
				}
			</script>
</html>
