<?php
if(empty($_SESSION)) {session_start();}

if(!isset($_SESSION['user_id'])) { 
header("location: shop.php"); 
exit; 
}
// 검색 결과를 호출하고/파싱할 수 있는 파일은 Include 한다. 
require_once 'api.php';
unset($_SESSION['shop']);

$user_id = $_SESSION['user_id'];

$shop = new ShopApiManager();

$count = $_POST['count'];

$query = $_POST['query'];

if($_POST['mode'] == "search"){
        $result = $shop->getShopData($_POST['query'], $count);
}
?>

<script>document.location.href='again_login_shop.php';</script>