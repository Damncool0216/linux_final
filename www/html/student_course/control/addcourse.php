<?php

include 'conn.php';
$cname = $_GET['cname'];
$cpno = $_GET['cpno'];
$ccredit = $_GET['ccredit'];

if($cname==''){
	echo "<script language=\"JavaScript\">alert(\"课程名不能为空！\");history.back();</script>";
}

if($ccredit==''){
	echo "<script language=\"JavaScript\">alert(\"学分不能为空！\");history.back();</script>";
}

echo "<br><br><br>";

try {
	$sql =  "select count(cname) from course where cname = '{$cname}'";
	$result = $pdo->query($sql);
} catch (PDOException $e) {
	die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
}
$n = $result->fetch();
$n = $n['count(cname)'];

if($n!=0){
   echo "<script language=\"JavaScript\">alert(\"课程已存在！\");history.back();</script>";
}
if($cpno==''){
	$cpno = "null";
}

$sql = "insert into course(cname,cpno,ccredit) values('{$cname}',{$cpno},{$ccredit})";
$result  = $pdo->exec($sql);
if(!$result){
	echo "<script language=\"JavaScript\">alert(\"添加失败！\");history.back();</script>";
}else{
	echo "<script>alert('添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>"; 
}

?>
