<?php
    session_start();
    require_once("connection.php"); 
    header("Content-Type: text/html; charset=UTF-8"); 

    $num = $_POST['num'];
    $price=$_POST['price'];
    $shop=$_POST['shop'];
    $buy_date=$_POST['buy_date'];
    $score=$_POST['score'];
    $buy_state=$_POST['buy_state'];
    $buy_method=$_POST['buy_method']; 
    $buy_tip=$_POST['buy_tip'];
    $good=$_POST['good'];
    $bad=$_POST['bad'];
    $note=$_POST['note'];

    $query = "UPDATE review_imfo
     		   SET  price='$price', shop='$shop', buy_date='$buy_date', score='$score', buy_state='$buy_state', buy_method='$buy_method', buy_tip='$buy_tip', good='$good', bad='$bad', note='$note' 
     		   WHERE num = '$num';";

    $result = mysql_query($query,$connect);


    if(!$price){
        echo"<script>alert('가격을 입력해 주세요'); history.back();</script>"; exit;
    }
    elseif (!$shop) {
        echo"<script>alert('구매처를 입력해 주세요'); history.back();</script>"; exit;
    }
    elseif (!$buy_date) {
        echo"<script>alert('구매 날짜를 입력해 주세요'); history.back();</script>"; exit;
    }
    elseif (!$score) {
        echo"<script>alert('평점을 입력해 주세요'); history.back();</script>"; exit;
    }
    elseif (!$buy_state) {
        echo"<script>alert('배송 상태를 입력해 주세요'); history.back();</script>"; exit;
    }
    elseif (!$buy_method) {
        echo"<script>alert('구매방법 & 결제방법을 입력해 주세요'); history.back();</script>"; exit;
    }
    elseif (!$good) {
        echo"<script>alert('장점을 입력해 주세요'); history.back();</script>"; exit;
    }
    elseif (!$bad) {
        echo"<script>alert('단점을 입력해 주세요'); history.back();</script>"; exit;
    }
    else{
        echo"<script>alert('수정 완료');location.replace('mypage_review_list.php');</script>";exit;
    }

    ?>