<?php

require_once("connection.php");
header("Content-Type: text/html; charset=UTF-8"); 


$email = $_POST['email'];

$query = "SELECT *from user_imfo where email='$email'";
$result = mysql_query($query, $connect);
$res = mysql_fetch_array($result);
if(!$res){echo"<script>alert('입력하신 이메일 정보가 존재하지 않습니다.'); history.back();</script>"; exit;}

echo "<script>alert('아이디는 ".$res['id']." 입니다.');</script>";

?>
<script>document.location.href='login_input.php';</script>

