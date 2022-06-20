<?php
  include 'conn.php';
  $sno = $_GET['sno'];
  $sname = $_GET['sname'];
  $ssex = $_GET['ssex'];
  $sage  = $_GET['sage'];
  $sdept = $_GET['sdept'];
  echo "<br><br><br>";
  $sql = "update student set sname = '{$sname}' , ssex = '{$ssex}',sage = {$sage}, sdept = '{$sdept}' where sno = {$sno}";
  
  $result  = $pdo->exec($sql);
  if(!$result){
	echo "<script language=\"JavaScript\">alert(\"修改失败！\");history.back();</script>";
 }else{
	echo "<script>alert('修改成功!');location.href='student.php';</script>"; 
}
