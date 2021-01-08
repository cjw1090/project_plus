<?php

require_once("connection.php");
header("Content-Type: text/html; charset=UTF-8"); 

$id = $_POST['id'];
$email = $_POST['email'];

$query = "SELECT *from user_imfo where id='$id' and email='$email'";
$result = mysql_query($query, $connect);
$res = mysql_fetch_array($result);
if(!$res){echo"<script>alert('아이디 또는 이메일을 잘못 입력하셨습니다.'); history.back();</script>"; exit;}

echo "<script>alert('비밀번호는 ".$res['passwd']." 입니다.');</script>";

?>
<script>document.location.href='login_input.php';</script>