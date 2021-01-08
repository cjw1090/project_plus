<!--회원 탈퇴 실행문입니다.-->
<!--id를 세션에서 받게 수정.-->
<?php
require_once("connection.php");
header("Content-Type: text/html; charset=UTF-8");

if(empty($_SESSION)) {session_start();}

if(!isset($_SESSION['user_id'])) {
header("location: login_input.php");
exit;
}

//변수선언
$user_id = $_SESSION['user_id'];
$password = $_POST['password'];

$query = "SELECT passwd FROM user_imfo WHERE id='$user_id';";
$result = mysql_query($query, $connect);
$res = mysql_fetch_array($result);
if($password == $res['passwd']){//들어온 비밀번호와 가져온 비밀번호를 확인
  $query = "DELETE FROM user_imfo WHERE id='$user_id'";
  if($result = mysql_query($query, $connect)){//삭제
    $query = "DELETE FROM review_imfo WHERE id='$user_id'";
    if($result = mysql_query($query, $connect)){//삭제
      $query = "DELETE FROM interesting_item_imfo WHERE id='$user_id'";
      if($result = mysql_query($query, $connect)){//삭제
      unset($_SESSION['user_id']);
      session_destroy();
      echo "<script>alert('회원 탈퇴에 성공했습니다.'); document.location.href='index.php';</script>"; 
      }
      else{echo "<script>alert('관심 상품 데이터에서 회원 정보 삭제에 실패했습니다.'); history.back();</script>"; }
    }
    else{echo "<script>alert('리뷰 데이터에서 회원 정보 삭제에 실패했습니다.'); history.back();</script>"; }
  }
  else{echo "<script>alert('회원 데이터에서 회원 정보 삭제에 실패했습니다.'); history.back();</script>"; }
}else{
  echo "<script>alert('비밀번호가 틀립니다.'); history.back();</script>"; 
}
?>

