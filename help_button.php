<input id="name_help" type="hidden" value=<?= basename($_SERVER['PHP_SELF'],'.php'); ?>>
<input id="help_btn" type="button" class="btn btn-default" value="HELP">


<script>
$("#help_btn").click(function(){
    ch=true;
    var name_help = $("#name_help").val();
    window.open("help.php?name_help="+name_help,"","width=auto, height=auto");
  });
  </script>