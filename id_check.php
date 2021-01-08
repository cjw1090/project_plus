<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ID CHECK</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
   $(function(){
      $("#id_btn").click(function(){
         window.opener.$("#id").val('<%=id%>'); // 해당 페이지를 오픈한 페이지의 id가 id인 곳에 해당 값을 집어넣는다.
         window.close();
      });
   });
</script>
</head>
<body>
<?php
require_once("connection.php");

$id=$_GET['id'];
$query = "SELECT *from user_imfo where id='$id'";
$result = mysql_query($query, $connect);
$res = mysql_fetch_array($result);

if($res){
?>
   <small>사용할 수 없는 아이디 입니다.</small>
   <?php } 
else{ ?>
    <small>사용할 수 있는 아이디 입니다.</small>
<?php } ?>
</body>

</html>
