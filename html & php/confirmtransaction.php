<?php

session_start();
if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<title>Confirm Transaction</title>
  <link rel="stylesheet" type="text/css" href="../css/transferstyle.css">
</head>
<body>
<canvas></canvas>
      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo2.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom" href="homepage.php">
</map>
<div class="tip1"><a href="logout_action.php">
      <button type="submit" class="logout">Log Out</button></a><span class="tiptext1">&#9432; Click here to Log Out, if clicked you have to Log In again</span></div>
    <div class="cnftrans"><h1>Your Transaction is Completed</h1>
    	<br>
    	<a href="homepage.php"><button type="Submit" style="height: 100px;">Go to Home Page</button></a></div>


</body>
</html>
