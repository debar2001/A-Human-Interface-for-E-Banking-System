<?php

session_start();
if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Confirm Username Change</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
<link rel="stylesheet" type="text/css" href="../css/transferstyle.css">
</head>
<body>
<canvas></canvas>
      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo2.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80">
</map>
<div class="cnfusernamechange"><h1>Your Username has Changed</h1>
    	<br>
    	<a href="logout_action.php"><button type="Submit" style="height: 100px;">Log In Again</button></a></div>

</body>
</html>