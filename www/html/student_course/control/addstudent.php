<?php

include 'conn.php';
$sname = $_GET['sname'];
$sno= $_GET['sno'];
$ssex = $_GET['ssex'];
$sage = $_GET['sage'];
$sdept = $_GET['sdept'];

echo $sage;
if($sname==''){
	echo "<script language=\"JavaScript\">alert(\"姓名不能为空！\");history.back();</script>";
}
if($sage==''){
    $sage = 'null';
}
if($ssex==''){
    $ssex = 'null';
}else{
    $ssex = "'{$ssex}'";
}
if($sdept==''){
    $sdept = 'null';
}else{
    $sdept = "'{$sdept}'";
}

if($sno !=''){
    try {
        $sql =  "select count(sno) from student where sno = '{$sno}';";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
    }
    $n = $result->fetch();
    $n = $n['count(sno)'];

    if($n!=0){
    echo "<script language=\"JavaScript\">alert(\"该学生已存在！\");history.back();</script>";
    }
}



echo "<br><br><br>";

$sql = "";
if($sno == ''){
    $sql = "insert into student(sname,ssex,sage,sdept) values('{$sname}',{$ssex},{$sage},{$sdept});";
}else{
    $sql = "insert into student(sno,sname,ssex,sage,sdept) values({$sno},'{$sname}',{$ssex},{$sage},{$sdept});";
}

echo $sql;
$result  = $pdo->exec($sql);
if(!$result){
	echo "<script language=\"JavaScript\">alert(\"添加失败！\");history.back();</script>";
}else{
	echo "<script>alert('添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>"; 
}

?>

