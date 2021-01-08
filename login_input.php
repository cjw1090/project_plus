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
                          <a class="nav-link" href="join_input.php">회원가입</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="login_input.php">로그인</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="shop.php">검색</a>
                        </li>
                      </ul>
                    </div>
                  </nav>
<!--메뉴바-->
<!--Content Source-->
<div class="ma10">
  <h3>Sign in</h3>
  <form method="post" action="login.php">
    <div class="form-group">
      <label>ID</label>
      <input type="text" class="form-control" name="id" placeholder="Enter ID">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="passwd" placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <div class="ma-t">
    <a href="join_input.php" class="ma-r">회원가입</a>
    <a href="find_id_input.php" class="ma-r">아이디찾기</a>
    <a href="find_passwd_input.php" class="ma-r">비밀번호찾기</a>
    </div>
  </form>
</div>

<?php require_once("help_button.php"); ?>
<!--Content Source-->
    </body>
</html>