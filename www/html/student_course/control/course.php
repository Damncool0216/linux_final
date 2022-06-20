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
	<br><br>
	<br>
	<div align="center">
		<p align="center">
			<label for="textfield"></label>

		<form action="addcourse.php" method="get">
			<input type="text" name="cname" id="cname" placeholder="课程名">
			<input type="number" name="cpno" id="cpno" placeholder="前导课程">
			<input type="number" name="ccredit" id="ccredit" placeholder="学分">
			<input type="submit" value="添加" class="btn">
		</form>


		</p>
		<table width="960" border="1" class="table">
			<tr>
				<th>课程号</th>
				<th>课程名</th>
				<th>前导课程</th>
				<th>学分</th>
				<th>选修人数</th>
				<th>平均成绩</th>
			</tr>
			<?php
			include 'conn.php';

			try {
				$sql = "select * from course;";
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
				if ($row['cpno'] != '') {
					
					try {
						$sql2 = "select cname from course where cno = {$row['cpno']}";
						$result2 = $pdo->query($sql2);
					} catch (PDOException $e) {
						die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
					}

					$pre = "";
					while ($s = $result2->fetch()) {
						$pre .= $s['cname'];
					}
					echo "<td>" . $pre . "</td>";
				} else {
					echo "<td></td>";
				}

				echo "<td>" . $row['ccredit'] . "</td>";


				try {
					$sql3 = "select count(sc.sno),avg(sc.grade) from course,sc where course.cno = sc.cno and sc.cno = {$row['cno']}";
					$result3 = $pdo->query($sql3);
				} catch (PDOException $e) {
					die("查询sql语句执行失败。错误信息：" . $e->getMessage() . "<br/>");
				}
				$s = $result3->fetch();
				echo "<td>" . $s['count(sc.sno)'] . "</td>";
				echo "<td>" . round($s['avg(sc.grade)'], 1) . "</td>";
				echo "</tr>";
			}
			if ($t == 0) {
				$t = 1;
			}
			// 关闭连接
			$pdo = null;
			?>

		</table>
	</div>
		<!--	<input type="button" value="返回" onclick="javascript:history.back();"> -->
</body>

</html>