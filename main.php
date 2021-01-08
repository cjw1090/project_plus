<?php 
if(empty($_SESSION)) {session_start();}

if(!isset($_SESSION['user_id'])) { 
header("location: index.php"); 
exit; 
}
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
<div class="ma textCenter" style="margin-top:10em;">
    <h1>Welcome!</h1>
    <small>With PluS</small>
</div>

<?php require_once("help_button.php"); ?>

<!--Content Source-->
    </body>
</html>