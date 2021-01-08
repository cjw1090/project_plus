<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HELP</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
   $(function(){
      $("#help_btn").click(function(){
         window.opener.$("#name_help").val('<%=name_help%>'); // 해당 페이지를 오픈한 페이지의 id가 id인 곳에 해당 값을 집어넣는다.
         window.close();
      });
   });
</script>
</head>
<body>
<?php

$name_help=$_GET['name_help'];
?>
<img src="help/<?=$name_help?>_help.png">
</body>

</html>
