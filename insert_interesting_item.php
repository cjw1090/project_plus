<?php
require_once("connection.php");
header("Content-Type: text/html; charset=UTF-8"); 

$id = $_POST['id'];
$interesting_item = $_POST['interesting_item'];

$query = "SELECT *from interesting_item_imfo order by num desc";
$result = mysql_query($query, $connect);
$res = mysql_fetch_array($result);

$num = $res['num'];
$num = $num+1;

$query = "SELECT *from interesting_item_imfo where num!='$num' and id='$id' and interesting_item='$interesting_item'";
$result = mysql_query($query, $connect);
$res = mysql_fetch_array($result);

if(!$res){

    $query = "INSERT INTO interesting_item_imfo (num, id, interesting_item) values ('$num', '$id', '$interesting_item');";
    $result = mysql_query($query, $connect);
    if(!$result){echo"<script>alert('관심상품 등록에 실패했습니다.'); document.location.href='again_login_shop.php'; </script>"; exit;}
    else{echo"<script>alert('관심상품에 등록되었습니다.'); document.location.href='again_login_shop.php'; </script>"; exit;}

}

else{echo"<script>alert('이미 관심상품에 등록한 상품입니다.'); </script>";}

?>
<script>document.location.href='again_login_shop.php';</script>
