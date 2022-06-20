<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/table.css">
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
	<title>课程信息显示</title>
</head>

<body>
	<br>
	<br>
	<br>
	<div align="center">
		<br />
		<table width="960" border="1" class="table">
			<tr>
				<th>课程号</th>
				<th>课程名</th>
				<th>成绩</th>
			</tr>
			<?php
			include 'conn.php';
			$sno = $_GET['sno'];

			$sname = $_GET['sname'];
			echo "学号:" . $sno . "    " . "姓名：" . $sname;
			try {
				$sql = "select sc.cno,cname,grade from sc,course,student where sc.cno=course.cno and student.sno = sc.sno and student.sno = '{$sno}'";
				$result = $pdo->query($sql);
			} catch (PDOException $e) {
				die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
			}
			$n = $result->rowCount();
			$sum = 0;
			$t = 0;
			while ($row = $result->fetch()) {
				echo "<tr>";
				echo "<td>" . $row['cno'] . "</td>";
				echo "<td>" . $row['cname'] . "</td>";
				echo "<td>" . $row['grade'] . "</td>";
				echo "</tr>";
				$sum = $sum + (int)$row['grade'];
				$t = $t + 1;
			}
			if ($t == 0) {
				$t = 1;
			}
			// 关闭连接
			$pdo = null;
			?>
		</table>
		<p>总分: <?php echo $sum; ?></p>
		<p>平均分：<?php echo round($sum / $t, 2); ?></p>
		<input type="button" value="返回" onclick="javascript:history.back();">
</body>

</html>