<?php require_once("connection.php"); //mypage_review_list에서 넘어오는 num을 받아서 자세히 보기
$num = $_GET['num'];?>  

<!DOCTYPE html>
<html lang="ko">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta http-equiv="Content-Style-Type" content="text/css">
        
        <link rel="stylesheet" type="text/css" href="Search.css">
        <link rel="stylesheet" type="text/css" href="review_detail_update.css">
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

                  <div class ="left_menu">
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
    <div class="main_wrap">
        <form method="post" class="main_form" action="review_update.php" onsubmit="return" enctype="multipart/form-data">
            <div class="main_content">
            	<?php 
            		$query = "SELECT *FROM review_imfo where num='$num'";
                    $result = mysql_query($query,$connect);
            		$row= mysql_fetch_array($result);
            		  
         		?>
            		<table class="board_view1">
                    <colgroup>
                        <col width="1%">
                        <col width="9%">
                    </colgroup>
                    <tbody>
                        <tr >
                            <th class="board_text" scope="row">상품명</th>
                            <td class="board_text"> <?php  echo $row['review_item']; ?></td>
                        </tr>
                    </tbody>
                </table> 
            	<table  class="board_view1">
                    <colgroup>
                        <col width = "10%"> 
                        <col width = "10%">
                        <col width = "20%">
                        <col width = "10%">
                        <col width = "20%">
                        <col width = "10%">
                        <col width = "20%">
                        <col width = "10%">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="board_text" scope="row">평점</th>
                            <td class="board_text"><input  type="text" name="score" value="<?php  echo $row['score']; ?>" size="2" ></td>
                            <th class="board_text" scope="row">구매시기 </th>
                            <td class="board_text"><input  type="date" name="buy_date" value="<?php  echo $row['buy_date']; ?>"></td>
                            <th class="board_text" scope="row">구매가격</th>
                            <td class="board_text"><input  type="text" name="price" value="<?php  echo $row['price']; ?>" size="5" ></td>
                            <th class="board_text" scope="row">구매처</th>
                            <td class="board_text"><input  type="text" name="shop" value="<?php  echo $row['shop']; ?>" size="5" ></td>
                        </tr>

                        </tbody>
                    </table>

                    <table class = "board_view1">
                        <colgroup>
                        <col width="15%">
                        <col width="85%">
                        </colgroup>
                        <tr>
                            <th class="board_text" scope="row">배송상태</th>
                            <td class="board_text"><input type="text" name="buy_state" value="<?php  echo $row['buy_state']; ?>" size="5" ></td>
                        </tr>
                        <tr>
                            <th scope="row">구매방법&amp;결제방법</th>
                            <td class="board_text2"><input type="text" name="buy_method" value="<?php  echo $row['buy_method']; ?>" ></td>
                        </tr>
                        <tr>
                            <th  scope="row">구매 Tip</th>
                            <td class="board_text2"><textarea name="buy_tip" cols="60" rows="1"><?php  echo $row['buy_tip']; ?></textarea></td>
                        </tr>
                        <table class="board_view1">
                            <colgroup>
                                <col width="13%">
                                <col width="87%">
                            </colgroup>
                            <tbody>
                                 <tr>
                                    <th class="board_text" scope="row">장점</th>
                                    <td class="board_text"><textarea name="good" cols="60" rows="1"><?php  echo $row['good']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <th class="board_text" scope="row">단점</th>
                                    <td class="board_text2"><textarea name="bad" cols="60" rows="1"><?php  echo $row['bad']; ?></textarea></td>
                                </tr>   
                            </tbody>
                        </table>
                        
                    </table>
                    <table class="board_view2">
                         <colgroup>
                                <col width="1%">
                                <col width="9%">
                            </colgroup>
                        <tbody>
                            <tr>
                                <th class="board_text" scope="row">Note</th>
                                <td class="board_text"><textarea name="note" cols="70" rows="5"><?php  echo $row['note']; ?></textarea></td>
                            </tr>
                        </tbody>    
                    </table>

                    <table class="img_table">
                    <colgroup>
                                <col width="1%">
                                <col width="9%">
                            </colgroup>
                    <tbody>
                    <?php if($row['item_img'] != "./upload/"){?>
                        <tr>
                            <th class="board_text">상품 사진</th>
                        </tr>
                        <tr>
                            <th ><img class="img_option" src="<?php  echo $row['item_img']; ?>"></th>
                        </tr>
                    <?php } ?>
                    </tbody>
                    
                </table>
                        
                        
                    </tbody>
                </table>
                <table class="board_btn">
                    <tbody>
                        <tr>
                            
                            <td>
                                 <input type="hidden" name="num" value="<?php echo $row['num']; ?>" >
                                 <button class="board_button" type="submit">수정하기</button>
                                
                            </td> 
                     
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>   	
<!--Content Source-->          

</body>
</html>