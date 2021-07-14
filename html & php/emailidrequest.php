<?php

include("connect.php");
session_start();

if (isset($_POST['emailidreq'])) {
	$email = $_POST['email1'];
	$_SESSION['email'] = $email;


	$rndno=rand(100000, 999999);
  $message = urlencode("otp number.".$rndno);
  $to = $_SESSION['email'];
  $subject = "Your Bank of Vellore OTP";
  $txt = "Your OTP to complete your password change process is:" .$rndno;
  $headers = "From: bankofvellore@gmail.com";
  mail($to, $subject, $txt, $headers);

  $_SESSION['otp'] = $rndno;
  header("location: enterotpforgotpassword.php");
  die;
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Enter Email Id</title>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
<link rel="stylesheet" type="text/css" href="../css/transferstyle.css">
	<script type="text/javascript" src="../js/check.js"></script>
</head>
<body>
	<canvas></canvas>
	<script src="../js/canvas.js"></script>
  <img src="../logo/Logo2.png" alt="logo" usemap="#logomap" width="100" height="50">
<map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom" href="welcomepage.php">
</map>

	<div class="email1">
		<form action="emailidrequest.php" method="post">
		<h1>Please enter the Email Id registered with your Account:</h1><br><br>
		<input type="text" name="email1" id="email1" onchange="checkEmail(email1)" class="txtField" required><br><br><br>
		<div class="tip17"><input type="submit" style="width: 150px; height: 75px;" name="emailidreq" value="Submit" class="btn1"><span class="tiptext17">&#9432; Click here to get OTP</span></div></form>
</div>
</body>
</html>