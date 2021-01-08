<!--회원정보 수정 실행문입니다.-->
<!--id를 세션에서 받게 수정.-->
<!--실행시 받아온 값 확인하여 실행하도록 수정-->
<?php
require_once("connection.php");
header("Content-Type: text/html; charset=UTF-8");

if(empty($_SESSION)) {session_start();}

if(!isset($_SESSION['user_id'])) {
header("location: login_input.php");
exit;
}
$user_id = $_SESSION['user_id'];

if(empty($_POST['password']) && empty($_POST['email'])){//둘다 없으면
  echo"<script>alert('입력된 값이 없습니다.'); history.back();</script>"; exit;
}else{
  //비밀번호
  if(isset($_POST['password'])){
    $password = $_POST['password'];
    $query = "UPDATE user_imfo SET passwd = '$password' WHERE id = '$user_id';";
    $result = mysql_query($query, $connect) or die('비밀번호 update 쿼리문 실패');
    if(!$result){echo"<script>alert('비밀번호 수정에 실패했습니다.'); history.back();</script>"; exit;}//결과값 존재하지 않을시
    echo "<script>alert('비밀번호가 정상적으로 수정되었습니다.'); document.location.href='mypage.php';</script>";//정상작동시 마이페이지 첫화면으로
  }

  //이메일
  if(isset($_POST['email'])){
    $email = $_POST['email'];
    $query = "UPDATE user_imfo SET email = '$email' WHERE id = '$user_id';";
    $result = mysql_query($query, $connect) or die('이메일 update 쿼리문 실패');
    if(!$result){echo"<script>alert('이메일 수정에 실패했습니다.'); history.back();</script>"; exit;}//결과값 존재하지 않을시
    echo "<script>alert('이메일이 정상적으로 수정되었습니다.'); document.location.href='mypage.php';</script>";//정상작동시 마이페이지 첫화면으로
  }
}


?>
<script>document.location.href='mypage.php';</script>
