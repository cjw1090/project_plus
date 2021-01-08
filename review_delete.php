<?php 
    session_start();
    require_once("connection.php"); 
    header("Content-Type: text/html; charset=UTF-8"); 

    $num = $_POST['num'];

	$sql = "DELETE FROM review_imfo WHERE num='$num'"; 
	$result =mysql_query($sql, $connect) or die('쿼리실패'); //삭제할때 confirm을 받는걸 구현하려 했는데 실패했어요 미안해요

	if(!$result){echo"<script>alert('삭제할 글이 없습니다.'); history.back();</script>"; exit;} 
    else{echo"<script>alert('삭제 성공');location.replace('mypage_review_list.php');</script>";   exit;}

?>


