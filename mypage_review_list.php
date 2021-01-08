<?php require_once("connection.php"); 
  if(empty($_SESSION)) {session_start();}
  $id = $_SESSION['user_id']; 
?>
<!DOCTYPE html>

<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta http-equiv="Content-Style-Type" content="text/css">
        
        <link rel="stylesheet" type="text/css" href="Search.css">
        <link rel="stylesheet" type="text/css" href="mypage_review_list.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
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
                          <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
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
          


<!--메뉴바-->
<!--Content Source-->
 <div class="container">
    <div class="main_margin">
      <h3 class="title">Mypage Review</h3>
    </div> 
  </div>


  <div class="container">
    <div class="main_margin">
      <div class="row">
        <div class="col">
<!--리스트 -->
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr height="5"><td width="5"></td></tr>
            <tr style="background:url('img/table_mid.gif') repeat-x; text-align:center;">
             <td width="5"><img src="img/table_left.gif" width="5" height="30" /></td>
             <td width="73">평점</td>
             <td width="379">상품이름</td>
             <td width="73">작성자</td>
             <td width="164">구매시기</td>
             <td width="58">구매가격</td>
             <td width="58"></td>
             <td width="58"></td>
              <tr height="1" bgcolor="#D2D2D2"><td colspan="6"></td></tr>
              <tr height="1" bgcolor="#82B5DF"><td colspan="6" width="752"></td></tr>
           </tr>

           <?php
            $query = "SELECT *FROM review_imfo where id='$id' ORDER BY num ASC"; //user_imfo에서 받아온 아이디가 review_imfo에서 받아온 아이디가 있는 row를 선택 
            $result = mysql_query($query,$connect);


           if($result != 0){ //게시물이 있으면

           while($row = mysql_fetch_array($result))          
           {
              
             
          ?>
          <tr class="list" height="25" align="center">
           <td width="5"><img src="img/table_left.gif" width="5" height="30" /></td>
             <td width="73"><?php echo $row['score'];?></td>
             <?php  
            if($row['receipt_img'] == "1"){ //reciept_img가 1이면 인증이 된상태
              ?>

             <td width="379"><?php echo $row['review_item'];?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="confirm_text">★운영자 인증★</span></td>
            <?php 
            }
             else{ 
              ?>
              <td width="379"><?php echo $row['review_item'];?></td>
              <?php  
             }

            ?>
             <td width="73"><?php echo $row['id'];?></td>
             <td width="164"><?php echo $row['buy_date'];?></td>
             <td width="58"><?php echo $row['price'];?></td>
             <td width="58"> 
             <form action="review_detail_update.php" method="get">
                <input type="hidden" name="num" value="<?php echo $row['num']; ?>" >
                <button class="btn btn-secondary" type="submit">수정하기</button>
              </form>
              </td>
              <td width="58">
              <form action="review_delete.php" method="post" onsubmit="return" enctype="multipart/form-data" >
                <input type="hidden" name="num" value="<?php echo $row['num']; ?>" >
                <button class="btn btn-secondary" type="submit">삭제하기</button>
              </form>
              </td>
             
           <tr height="1" bgcolor="#D2D2D2"><td colspan="6"></td></tr>
           <tr height="1" bgcolor="#82B5DF"><td colspan="6" width="752"></td></tr>
             <?php

           }
         }// 게시물이 없을때
          else{ ?> 
              <td colspan="6" class="noreview">게시물이 없습니다</td> 
              <?php 
            }
           ?>
          
          </tr>
         
           </tr>
         </table>       
        </div>
      </div>
    </div>
  </div>
<!--리스트 -->
</body>
</html>