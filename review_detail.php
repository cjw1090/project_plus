<?php require_once("connection.php"); 
$num = $_POST['num'];?>
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
<!--메뉴바-->
<!--Content Source-->
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
                                <?php  
                                if($row['receipt_img'] ==1){ //reciept_img가 1이면 인증이 된상태? 
                                  ?>

                                 <td class="board_text"><?php echo $row['review_item'];?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="confirm_text">★운영자 인증★</span></td>
                                <?php 
                                }
                                 else{ 
                                  ?>
                                  <td width="board_text"><?php echo $row['review_item'];?></td>
                                  <?php  
                                 }

                                ?>
                        </tr>
                    </tbody>
                </table>
            	<table  class="board_view1">
                    <colgroup>
                        <col width = "3%"> 
                        <col width = "6%">
                        <col width = "5%">
                        <col width = "6%">
                        <col width = "5%">
                        <col width = "6%">
                        <col width = "5%">
                        <col width = "6%">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="board_text" scope="row">평점</th>
                            <td class="board_text"><?php  echo $row['score']; ?></td>
                            <th class="board_text" scope="row">구매시기 </th>
                            <td class="board_text"><?php  echo $row['buy_date']; ?></td>
                            <th class="board_text" scope="row">구매가격</th>
                            <td class="board_text"><?php  echo $row['price']; ?></td>
                            <th class="board_text" scope="row">구매처</th>
                            <td class="board_text"><?php  echo $row['shop']; ?></td>
                        </tr>

                        </tbody>
                    </table>

                    <table class = "board_view1">
                        <colgroup>
                        <col width="1%">
                        <col width="9%">
                        </colgroup>
                        <tr>
                            <th class="board_text" scope="row">배송상태</th>
                            <td class="board_text"><?php  echo $row['buy_state']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">구매방법&amp;결제방법</th>
                            <td class="board_text2"><?php  echo $row['buy_method']; ?></td>
                        </tr>
                        <tr>
                            <th  scope="row">구매 Tip</th>
                            <td class="board_text2"><?php  echo $row['buy_tip']; ?></td>
                        </tr>
                        <table class="board_view1">
                            <colgroup>
                                <col width="1%">
                                <col width="9%">
                            </colgroup>
                            <tbody>
                                 <tr>
                                    <th class="board_text" scope="row">장점</th>
                                    <td class="board_text"><?php  echo $row['good']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">단점</th>
                                    <td class="board_text2"><?php  echo $row['bad']; ?></td>
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
                                <td class="board_text"><?php  echo $row['note']; ?></td>
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
                            <td><button class="board_button">목록</button> </td>
                     
                        </tr>
                    </tbody>
                </table>
            </div>

            	
          

            <footer class="footer">
                

            </footer>

</body>
</html>