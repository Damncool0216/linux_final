<?php

try{
	$dbtype = "mysql";
	$database ="student_course";  
    $user = "root";  
    $pwd = "12345";  
    $host = "mysql";

	$dsn  = "$dbtype:host=$host;dbname=$database;charset=utf8";
	// echo "$dsn";
    $pdo = new PDO($dsn, $user, $pwd);

	$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

}catch(PDOException $e){
	die ("数据库连接失败！" . $e -> getMessage() . "<br/>");
}
