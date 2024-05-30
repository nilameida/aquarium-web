<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMART AQUARIUM</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript"> <script type="jquery-latest.js"</script>
    <script language="javascript">
    $(document).ready(function(){
    $(document).ready(function(){
      $("#konten").load("water_status.php");
      var refreshid = setInterval (function(){
      $("#konten").load('water_status.php');
    },500);
    $.ajaxSetup({ cache: false});
      });
    });
</script>
</head>
<body>
<center>
  <div id="konten"></div>
</center>
</body>
</html>
