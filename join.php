<?php
require_once("connection.php");
header("Content-Type: text/html; charset=UTF-8"); 


$id = $_POST['id'];
$passwd = $_POST['passwd'];
$email = $_POST['email'];

$query = "SELECT *from user_imfo where id='$id'";
$result = mysql_query($query, $connect);
$res = mysql_fetch_array($result);
if($res){echo"<script>alert('아이디가 중복되었습니다. 다른 아이디를 등록해 주세요.'); history.back();</script>"; exit;}


$query = "INSERT INTO user_imfo (id, passwd, email) values ('$id', '$passwd', '$email');";
$result = mysql_query($query, $connect);
if(!$result){echo"<script>alert('회원가입에 실패했습니다.'); history.back();</script>"; exit;}
else{echo"<script>alert('회원가입 되었습니다.');</script>";}
?>
<script>document.location.href='login_input.php';</script>