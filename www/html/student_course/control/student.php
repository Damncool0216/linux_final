<?php
header("Content-Type: text/html; charset=utf8");
echo '<br>';
$name = $_GET['name'];
$sex = $_GET['sex'];
$where = '';
if ($name != '') {
	$where .= " where sname like '{$name}%' ";
}
if ($sex != 'null' && $sex != '') {
	if ($name != '') {
		$where .= "and ssex = '{$sex}'";
	} else {
		$where .= " where ssex = '{$sex}'";
	}
}

//分页
include 'conn.php';

try {
	$sql = "select * from student {$where}";
	$result = $pdo->query($sql);
} catch (PDOException $e) {
	die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
}

$totalnum = $result->rowCount();
//每页显示条数
$pagesize = 10;
//总共有几页
$maxpage = ceil($totalnum / $pagesize);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($page < 1) {
	$page = 1;
}

if ($page > $maxpage) {
	$page = $maxpage;
}


//下一页
$nextpage = $page + 1;
if ($nextpage >= $maxpage) {
	$nextpage = $maxpage;
}

//上一页
$prepage = $page - 1;
if ($prepage <= 1) {
	$prepage = 1;
}
$offset = ($page - 1) * $pagesize;
if ($offset < 0) {
	$offset = 0;
}

?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/table.css">
<script type="text/javascript">
	//添加编辑弹出层
	function del() {
		if (confirm("确定要删除吗？")) {
			// alert('删除成功！'); 
			return true;
		} else {
			return false;
		}
	}

	function add() {
		if (confirm("确定要添加吗？")) {
			// alert('删除成功！'); 
			return true;
		} else {
			return false;
		}
	}
</script>


<style type="text/css">
	body {
		background-size: 100%;
	}

	.wrapper {
		width: 1000px;
		margin: 20px auto;
	}

	h1 {
		text-align: center;
	}

	.add {
		margin-bottom: 20px;
	}

	.add a {
		text-decoration: none;
		color: #fff;
		background-color: #00CCFF;
		padding: 6px;
		border-radius: 5px;
	}

	td>a {
		text-decoration: none;
		color: #73A0CF;
		padding: 4px;
		/* background-color: #00CCFF; */
	}


	td {
		text-align: center;
	}
</style>

<head>
	<meta charset="UTF-8">
	<title>学生信息显示</title>
</head>

<body>
	<br>
	<br>
	<br>
	<div align="center">
		<form action="student.php" method="get">
			<input type="text" name="name" value="<?php echo $_GET['name'] ?>" size="8" placeholder="搜索姓名">
			性别：
			<select name="sex" id="sex" value="<?php echo $_GET['sex'] ?>">
				<option value="null"> </option>
				<option value="男">男</option>
				<option value="女">女</option>
			</select>
			<input class ='btn' type="button" value="重置" onclick="window.location='student.php'">
			<input class ='btn' type="submit" value="搜索">
		</form>

		<form action="addstudent.php" method="get">
			<input type="number" name="sno" id="sno" placeholder="学号">
			<input type="text" name="sname" id="sname" placeholder="姓名">
			<input type="text" name="ssex" id="ssex" placeholder="性别">
			<input type="number" name="sage" id="sage" placeholder="年龄">
			<input type="text" name="sdept" id="sdept" placeholder="专业">
			</td>
			<input class ='btn' border=1px type="submit" value="添加" onclick='if(!add())return false;'></td>
			</tr>
		</form>


		<table width="960" border="1" class="table">
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>年龄</th>
				<th>专业</th>
				<th>课程成绩</th>
				<th>操作</th>
			</tr>
			<?php

			//	echo $sql;,
			try {
				$sql = "select * from student {$where} order by sno asc limit {$offset},{$pagesize}";
				$result = $pdo->query($sql);
			} catch (PDOException $e) {
				die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
			}

			$n = $result->rowCount();
			while ($row = $result->fetch()) {
				echo "<tr>";
				echo "<td>" . $row['sno'] . "</td>";
				echo "<td>" . $row['sname'] . "</td>";
				echo "<td>" . $row['ssex'] . "</td>";
				echo "<td>" . $row['sage'] . "</td>";
				echo "<td>" . $row['sdept'] . "</td>";
				echo "<td><a href='showcourse.php?sno={$row['sno']}&sname={$row['sname']}'>详情</a></td>";
				echo "<td><a href='editstudent.php?sno={$row['sno']}'>修改</a>
			<a href='deletestudent.php?sno={$row['sno']}' onclick='if(!del())return false;'>删除</a>
			</td>";
				echo "</tr>";
			}

			// 关闭连接
			$pdo = null;
			?>

			<tr>
				<td colspan="6"><?php
								echo " 当前{$page}/{$maxpage}页 共{$totalnum}条";
								echo " <a href='student.php?page=1'>&nbsp首页&nbsp</a>";
								echo "<a href='student.php?page=" . ($page - 1) . "{$url}'>&nbsp上一页&nbsp</a>";
								echo "<a href='student.php?page=" . ($page + 1) . "{$url}'>&nbsp下一页&nbsp</a>";
								echo "<a href='student.php?page=" . ($maxpage) . "{$url}'>&nbsp末页&nbsp</a>";
								?></td>
			</tr>
	</div>
	</table>
</body>

</html>