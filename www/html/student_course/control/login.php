<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>学生课程管理系统</title>
</head>
<body><form action="control/login.php" class="login" method="post">
    <p>学生课程管理系统</p>
<!--	<p>Login</p>-->
    <input type="text" placeholder="账号" method="post" id="account" name="account">
    <input type="password" placeholder="密码" method="post" id="password" name="password">
    <input type="submit" class="btn" value="登  录">
</form>
    
</body>
</html>

<?php
header( "Content-Type: text/html; charset=utf8" );

$account = $_POST[ 'account' ];
$password = $_POST[ 'password' ];

if ( $account && $password ) {
  include "conn.php";
  $sql = "select * from user where account='" . $account . "' and password = '" . $password . "'";
  //echo $sql;
  $stmt = $pdo->query( $sql );
  //echo $stmt->rowCount();
  if ( $stmt->rowCount() > 0 ) {
    //echo "Dadadadad";
    $_SESSION[ 'account' ] = $account;
    //header( 'location:main.php?page=1' );
    echo '<script>alert("登录成功");window.location.href="main.php";</script>';

  } else {
    echo "<script language=\"JavaScript\">alert(\"用户名或密码错误！\");history.back();</script>";
  }
  $pdo = null;
  $stmt = null;
} else {
  echo "<script language=\"JavaScript\">alert(\"用户名或密码不能为空！\");history.back();</script>";
}
?>

