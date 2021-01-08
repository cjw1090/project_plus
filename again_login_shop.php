<?php
if(empty($_SESSION)) {session_start();}

if(!isset($_SESSION['user_id'])) { 
header("location: again_shop.php"); 
exit; 
}
// 검색 결과를 호출하고/파싱할 수 있는 파일은 Include 한다. 
require_once 'api.php';

$user_id = $_SESSION['user_id'];

$shop = new ShopApiManager();

$count = $_SESSION['count'];

$query = $_SESSION['query'];

$result = $_SESSION['shop'];

$title = array("",);
?>

<!DOCTYPE html>

<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="Search.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
    </head>
    <body>
  
          
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!--메뉴바-->            
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="main.php">With PluS</a>
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


<div class="container mt-5">

<div class="ma">
<form action="login_shop.php" method="POST">
<input type="hidden" name="mode" value="search" />
<input type="hidden" name="count" value="10" >
<div style="display:inline-flex;">
<input  type="text"  class="form-control" name="query" accesskey="s" title="검색어" class="keyword">
<input  type="submit" class="btn btn-secondary" value="Search">
</div>
</form> 
</div>

        <div class="ma imfo">
        관련 상품 데이터가 없는 경우 결과가 표시되지 않습니다.</br>
        최저가 정보가 없는 경우 0으로 표시되며, 가격비교 데이터가 없는 경우 제품의 가격을 나타냅니다.</br>
        최고가 정보가 없거나 가격비교 데이터가 없는 경우 0으로 표시됩니다.
        </div>
                
                
        
                
                <table cellspacing="0" border="1" summary="쇼핑검색 API 결과" class="tbl_type ma">
                <?php
 
                        if(is_array($result)){ 
                                foreach ($result as $response){
                                        
                                        if($response['title']!=""){ 
                ?>
                        
                                <colgroup>
                                <col width="10%">
                                <col width="20%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                        </colgroup>
                        
                        <thead>
                                <tr>
                                <th scope="col"><div class="textCenter">상품이미지</div></th>
                                <th scope="col"><div class="textCenter">상품명</div></th>
                                <th scope="col"><div class="textCenter">최고가</div></th>
                                <th scope="col"><div class="textCenter">최저가</div></th>
                                <th scope="col"><div class="textCenter">Button</div></th>
                                </tr>
                        </thead>

                        <?php break; } break; } ?>

                       <?php
                        // 결과를 반복문(foreach)를 사용하여 페이지에 표현한다. 
                        foreach ($result as $response){
                                
                                if(!in_array((string)$response['title'], (array)$title)){
                ?>
                        
                       
                        <tbody id="list">
                       
                                <tr>
                                        <td><div class="textCenter"><img src="<?php echo $response['image'];?>"  width="50px" height="70px" /></div></td>
                                        <td><?php echo $response['title'];?></td>
                                        <?php $title = $response['title']; ?>
                                        <td><div class="textCenter"><?php echo $response['hprice'];?></div></td>
                                        <td><div class="textCenter"><?php echo $response['lprice'];?></div></td>
                                        <td><div class="textCenter"><a href="login_review_list.php">
                                        <form method="get" action="login_review_list.php" style="display:inline;">
                                        <input type="hidden" name="review_item" value="<?php echo $response['title'];?>">
                                        <button type="submit" class="btn btn-primary">리뷰</button>
                                        </form></a>
                                        <form method="post" action="insert_interesting_item.php" style="display:inline;">
                                        <input type="hidden" name="interesting_item" value="<?php echo $response['title'];?>">
                                        <input type="hidden" name="id" value="<?php echo $user_id?>">
                                        <button type="submit" class="btn btn-primary">관심</button>
                                        </form>
                                        </div></td>
                                </tr>
                        
                         
                        </tbody>
                        <?php }}?>
                        
                                </table>
<?php 
        foreach ($result as $response){
                                        
                if($response['title']!=""){ 
                                             ?>
                        
                                <form action="login_shop.php" method="POST">
                                <input type="hidden" name="mode" value="search" />
                                <input type="hidden" name="count" value="<?php echo $count+10; ?>">
                                <input type="hidden" name="query" value="<?php echo $query; ?>">
                                <button type="submit" class="btn btn-primary">See More</button>
                                </form>
<?php break; } break; } ?>
                                
<?php } ?>
                             
</div>

<?php require_once("help_button.php"); ?>

<!--Content Source-->
    </body>
</html>