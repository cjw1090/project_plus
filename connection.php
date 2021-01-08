<?php
//mysql 접속 계정 정보
$host = "localhost";
$user = "withplus";
$pass = "withplus4";
$dbName = "withplus";

//접속
$connect = mysql_connect($host, $user, $pass) or die('MySQL 서버에 연결할 수 없습니다.');
mysql_select_db($dbName, $connect) or die('DB 선택 실패');

mysql_query("set names utf8"); //charset 설정




?>