<!--회원 탈퇴 화면입니다.-->
<!--마이페이지에서 받아온 id를 보내게 수정-->
<?php
if(empty($_SESSION)) {session_start();}

if(!isset($_SESSION['user_id'])) {//세션의 id가 없으면 로그인 화면으로 이동
header("location: login_input.php");
exit;
}
?>
 <!DOCTYPE html>
 <html lang="ko">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <link rel="stylesheet" type="text/css" href="mypage.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


<title>mypage</title>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!--메뉴바-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">With PluS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
<!--개인정보 수정-->
<div class = "container">
  <h2>my page</h2>
  <div class="ma10">
    <h3>회원탈퇴</h3>
    </br>
    </hr>
      <form method="post" action="do_delete_info.php">
        <input type="password" class="form-control" name="password" placeholder="비밀번호를 다시 입력하세요">
      </br>
      </hr>
        <button type="submit" class="btn btn-primary">탈퇴하기</button>
      </form>
    </div>
</div>

</body>
</html>
