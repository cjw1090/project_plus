<?php

//연결
require_once("connection.php");
if(empty($_SESSION)) {session_start();}
//자신의 id와 같으면 관심상품 리스트 보여줌
$id = $_SESSION['user_id'];
?>
<!DOCTYPE html>

<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
      <style>
        .category {
          display: inline;
        }

        .left-menu{
          background-color: rgb(230, 230, 230);
          position: fixed;
          width: 150px;
          top: 70px;
          left: 0;
          height: auto;

        }
      </style>

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
              <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mypage.php">MyPage</a>
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

<!--MyPage이동-->
<div class="category">
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
</div>

<!--Content Source-->
    <div class="category">
      <div class="container">
        <div class="main_margin">
          <div class="tit"><h3>Mypage</h3></div>
          <div class="tit"><h5>관심상품</h5></div>
        </div>
      </div>

      <div class="container">
        <div class="main_margin">
          <div class="row">
            <div class="col">

              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr height="5"><td width="5"></td></tr>
                <tr style="repeat-x; text-align:center;">
                 <td width="58"></td>
                  <tr height="1" bgcolor="#D2D2D2"><td colspan="6"></td></tr>
                  <tr height="1" bgcolor="#82B5DF"><td colspan="6" width="752"></td></tr>
               </tr>

               <?php
               //관심상품 테이블과 연결

               $query = "SELECT num, interesting_item FROM interesting_item_imfo where id='$id'";
               $result = mysql_query($query, $connect);
               $num = 1;

                while($row = mysql_fetch_array($result)){
               
              ?>
              <!--번호와 상품명을 보여준다. -->
              <tr height="25" align="center">
                 <td width="73"><?php echo $num;?></td>
                 <td width="379"><?php echo $row['interesting_item'];?></td>

                    <!--옆에 버튼 -->
                   <td><div class="textCenter">
                   <form method="post" action="login_review_list.php" style="display:inline;">
                   <input type="hidden" name="interesting_item" value="<? echo $row['interesting_item'];?>">
                   <button type="submit" class="btn btn-primary">리뷰</button>
                   </form>
                   <form method="post" action="delect_interesting_item.php" style="display:inline;">
                   <input type="hidden" name="interesting_item" value="<? echo $row['interesting_item'];?>">
                   <button type="submit" class="btn btn-primary">삭제</button>
                   </form>
                   </div></td>

                 <?php
                $num = $num+1;}
               ?>

              </tr>


             </table>



           </div>
          </div>
        </div>
       </div>
     </div>

   </body>
</html>
