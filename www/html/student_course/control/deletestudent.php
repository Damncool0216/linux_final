<?php

include 'conn.php';
$sno = $_GET['sno'];

try {
	$sql =  "DELETE from student WHERE sno={$sno};";
	$result1 = $pdo->exec($sql);
} catch (PDOException $e) {
	die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
}

try {
	$sql =  "DELETE from sc WHERE sno={$sno};";
	$result2 = $pdo->exec($sql);
} catch (PDOException $e) {
	die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
}

if(!$result1 && !$result2){
	echo "<script language=\"JavaScript\">alert(\"删除失败！\");history.back();</script>";
}else{
	echo "<script>alert('删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>"; 
}

?>
