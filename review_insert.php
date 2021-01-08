<?php
    session_start();
    require_once("connection.php"); 
    header("Content-Type: text/html; charset=UTF-8"); 



    $query = "SELECT *from review_imfo order by num desc";
    $result = mysql_query($query, $connect);
    $res = mysql_fetch_array($result);
    
    $num = $res['num'];
    $num = $num+1;

    $id = $_SESSION['user_id'];
    $review_item = $_POST['review_item'];
    $price=$_POST['price'];
    $shop=$_POST['shop'];
    $buy_date=$_POST['buy_date'];
    $score=$_POST['score'];
    $buy_state=$_POST['buy_state'];
    $buy_method=$_POST['buy_method'];
    $buy_tip=$_POST['buy_tip'];

    $file_name1 = $_FILES['item_img']['name'];
    $tmp_file1 = $_FILES['item_img']['tmp_name'];
    
    $file_path1 = './upload/'.$file_name1;
    
    move_uploaded_file($tmp_file1, $file_path1);

    $item_img = $file_path1;
    
    $file_name2 = $_FILES['recipe_img']['name'];
    $tmp_file2 = $_FILES['recipe_img']['tmp_name'];
    
    $file_path2 = './receipt/'.$file_name2;
    
    move_uploaded_file($tmp_file2, $file_path2);

    $receipt_img = $file_path2;
 
    $good=$_POST['good'];
    $bad=$_POST['bad'];
    $note=$_POST['note'];
    $query = "INSERT INTO review_imfo(num,id,review_item,price,shop,buy_date,score,buy_state,buy_method,buy_tip,item_img,receipt_img,good,bad,note) VALUES('$num','$id','$review_item','$price',  '$shop', '$buy_date', '$score', '$buy_state', '$buy_method', '$buy_tip', '$item_img','$receipt_img', '$good', '$bad', '$note');";

    $result = mysql_query($query, $connect);

    if(!$result){echo"<script>alert('리뷰등록에 실패하였습니다.'); history.back();</script>"; exit;}
    else{echo"<script>alert('리뷰가 등록되었습니다.');document.location.href='login_review_list.php?review_item=$review_item'; </script>";  exit;}

    ?>
