<?php require_once('conn.php'); ?>
<html>
<head>
<link rel="stylesheet" href="css/table.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.aline_center {
	text-align: center;
}
.ca {
	text-align: center;
}
.outtd {
    font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
    font-size: 18px;
    font-weight: bold;
    background-color: #A4E0EC;
}
h1 {
    font-size: 24px;
}
</style>
</head>
<body class="ca">
<br><br>
	
  <?php
	$sno= $_GET['sno'];

  try {
    $sql = "select * from student where sno = '{$sno}'";
    $result = $pdo->query($sql);
  } catch (PDOException $e) {
    die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
  }
	$info=$result->fetch();
?>
<h1 align="center">&nbsp;</h1>
<h1 align="center"><strong>修改学生信息</strong></h1>
<form action="updatestudent.php" method="get">
<table width="80%" border="0" align="center" cellpadding="10" cellspacing="20">
  <tr>
    <td width="25%" class="outtd">学号</td>
    <td width="23%" class="outtd">姓名</td>
    <td width="14%" class="outtd">性别</td>
    <td width="22%" class="outtd">年龄</td>
    <td width="16%" class="outtd">专业</td>
  </tr>
  <tr>
      <td><input name="sno" type="text" id="sno" placeholder="<?php echo $info['sno'];?>" value="<?php echo $info['sno'];?>" readonly="readonly"-></td>
      <td><input name="sname" type="text" id="sname" size="10" value="<?php echo $info['sname'];?>" placeholder="<?php echo $info['sname'];?>"></td>
      <td><select name="ssex" id="ssex">
		<option value="<?php echo $info['ssex'];?>"><?php echo $info['ssex'];?></option>
        <option value="男">男</option>
        <option value="女">女</option>
      </select></td>
	  <td><input name="sage" type="number" id="sage" size="3" value="<?php echo $info['sage'];?>" placeholder="<?php echo $info['sage'];?>"></td>
	  <td><input name="sdept" type="text" id="sdept" size="3" value="<?php echo $info['sdept'];?>" placeholder="<?php echo $info['sdept'];?>"></td>
    </tr>
	<input  type="button" value="返回" onclick="window.location.href='student.php'">
	&nbsp;
	&nbsp;
	<input  type="submit" value="修改" >
</table>
</form>
<hr>
<p>&nbsp;</p>
</body>
</html>
