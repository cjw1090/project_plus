<?php
/*관심상품 삭제*/

//내 관심상품 리스트에서 관심상품 삭제 버튼을 누르면 상품명을 받아온다
$interesting_item= $_POST['interesting_item'];

//연결
require_once("connection.php");
if(empty($_SESSION)) {session_start();}
header("Content-Type: text/html; charset=UTF-8");

//id받아옴(자신의 관심상품중을 삭제해야 함으로)
$id = $_SESSION['user_id'];

//삭제(id와 상품명이 같으면)
$query = "DELETE FROM interesting_item_imfo WHERE id ='$id' and interesting_item ='$interesting_item'";


$result = mysql_query($query, $connect)or die('삭제 쿼리문 실패');

?>
<script>document.location.href='interesting_item_list.php';</script>
