<?php
session_cache_expire(36000);  
if(empty($_SESSION)) {session_start();}
require_once("connection.php");
header("Content-Type: text/html; charset=UTF-8"); 


$id = $_POST['id'];
$passwd = $_POST['passwd'];


$query = "SELECT *from user_imfo where id='$id' and passwd='$passwd'";
$result = mysql_query($query, $connect);
$res = mysql_num_rows($result);
if(!$res){echo"<script>alert('아이디 또는 비밀번호가 존재하지 않습니다.'); history.back();</script>"; exit;}

while($array = mysql_fetch_array($result)){
    $user_id=$array['id'];
}

$_SESSION['user_id']= $user_id;

echo"<script>alert('".$_SESSION['user_id']."님 로그인에 성공하였습니다.');</script>";

?>
<script>document.location.href='main.php';</script>

