<?php $review_item = $_POST['review_item'];?>
<!DOCTYPE html>

<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta http-equiv="Content-Style-Type" content="text/css">
        
        <link rel="stylesheet" type="text/css" href="Search.css">
        <link rel="stylesheet" type="text/css" href="review_insert.css">
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
    <p><strong><abbr title="required">*</abbr></strong>표시는 필수항목입니다. </p>
    <h3> <?php echo $review_item; ?> </h3>
   <!-- 사진추가 -->
 <form name="BoardWritdForm" method="post" action="review_insert.php" onsubmit="return" enctype="multipart/form-data">
    <div class="form-group">
      <div class="plus">
        <label for="exampleFormControlFile1">사진추가</label>
      </div>
      <div class="plus">
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="item_img">
      </div>
    </div>
    <div class="form-group">
      <div class="plus">
        <label for="exampleFormControlFile2">영수증 인증</label>
      </div>
      <div class="plus">
        <input type="file" class="form-control-file" id="exampleFormControlFile2" name="recipe_img">
      </div>
    </div>

  <section>
    <div class="enter">
      평점
      <strong><abbr title="required">*</abbr></strong>
      <select id="num" name="score">
        <option value="5">5</option>
        <option value="4.5">4.5</option>
        <option value="4">4</option>
        <option value="3.5">3.5</option>
        <option value="3">3</option>
        <option value="2.5">2.5</option>
        <option value="2">2</option>
        <option value="1.5">1.5</option>
        <option value="1">1</option>
        <option value="0.5">0.5</option>
      </select>
    </div>
    <div class="enter">
      <label for="input">구매가격
        <strong><abbr title="required">*</abbr></strong>
      </label>
      <input type="text" name="price" placeholder="원" />
    </div>
  
    <div class="enter">
      <label for="time">구매시기</label>
      <strong><abbr title="required">*</abbr></strong>
      <input type="date" name="buy_date" />
    </div>
    <div class="enter">
      <label for="input">구매처
        <strong><abbr title="required">*</abbr></strong>
      </label>
      <input type="text" name="shop"  />
    </div>

  </section>
  <section>
    <div class="minititle">
      [구매후기]
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">배송상태
          <strong><abbr title="required">*</abbr></strong>
        </span>
        <input type="text" class="form-control" name="buy_state" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon2">구매방법&amp;결제방법
          <strong><abbr title="required">*</abbr></strong>
        </span>
        <input type="text" class="form-control"  name="buy_method" aria-describedby="basic-addon2">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">구매팁</span>
        <input type="text" class="form-control"  name="buy_tip" aria-describedby="basic-addon3">
      </div>
    </div>
  </section>
  <section>
    <div class="minititle">
      [제품후기]
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon4">장점
          <strong><abbr title="required">*</abbr></strong>
        </span>
        <input type="text" class="form-control" name="good" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon5">단점
          <strong><abbr title="required">*</abbr></strong>
        </span>
        <input type="text" class="form-control" name="bad" aria-describedby="basic-addon2">
      </div>
    </div>
      <div class="long-input">
        <div class="enter2">
          NOTE
        </div>

        <textarea name=note rows="10" cols="205"></textarea>
      </div>
    </section>
      <input type="hidden" name="review_item" value="<?php echo $review_item; ?>">
      <input type="submit" class="btn btn-secondary" value="Submit">
    </form>
    <?php require_once("help_button.php"); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
