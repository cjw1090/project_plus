<!--마이페이지 첫 화면입니다.-->
<?php
if(empty($_SESSION)) {session_start();}

if(!isset($_SESSION['user_id'])) {//세션의 id가 없으면 로그인 화면으로 이동
header("location: login.php");
exit;
}
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <link rel="stylesheet" type="text/css" href="mypage.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


<title>mypage</title>
</head>
<body>

  <!--메뉴바-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="Main.html">With PluS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="Main.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mypage.php">My Page</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" onclick="logout();" href="logout.php">로그아웃</a>
                 <script>function logout(){alert('로그아웃 되었습니다.');}</script>
              </li>
              <li class="nav-item">
                      <a class="nav-link" href="login_shop.php">검색</a>
              </li>
            </ul>
          </div>
        </nav>
  <!--메뉴바-->
  <!--좌측 메뉴바-->
  <div class ="left-menu">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="upload_info.php">개인정보 수정</a>
      </li>
      <li class="nav-item">
         <a class="nav-link"  href="delete_info.php">회원탈퇴</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="interesting_item_list.php">관심상품 보기</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mypage_review_list.php">내 리뷰</a>
      </li>
    </ul>
  </div>
  <!--좌측 메뉴바-->
  <div class = "container">
    <h2>my page</h2>
    <div class="ma10">
    <h4>My page 입니다. 왼쪽에서 메뉴를 선택해주세요!</h4>
    </div>
    <!--이안에 페이지 별 내용-->
  </div>






</body>
</html>
