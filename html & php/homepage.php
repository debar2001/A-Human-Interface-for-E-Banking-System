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
	<script type="text/javascript" src="../js/account.js"></script>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="../css/transferstyle.css">
</head>
<body>
<canvas></canvas>
      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo2.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom" href="homepage.html">
</map>
<div class="tip1"><a href="logout_action.php">
	<button type="submit" class="logout">Log Out</button></a><span class="tiptext1">&#9432; Click here to Log Out, if clicked you have to Log In again</span></div>
<div class="topnav">
  <a class="active" href="homepage.php" id="home">Home<div class="tip2"><span class="tiptext2">&#9432; Click here to go to Home page</span></div></a>
  <a href="transactionpage.php" id="trans">Transaction<div class="tip3"><span class="tiptext3">&#9432; Click here to go to Transaction page</span></div></a>
  <a href="transactionhistorypage.php" id="transhis">Transaction History<div class="tip4"><span class="tiptext4">&#9432; Click here to view your Transaction History</span></div></a>
  <a href="changeatmpinpage.php" id="chatm">Change ATM Pin<div class="tip5"><span class="tiptext5">&#9432; Click here to change your ATM Pin</span></div></a>
  <a href="checkbalance.php" id="chbal">Check Balance<div class="tip18"><span class="tiptext18">&#9432; Click here to check your account balance</span></div></a>
  <a href="helppage.php" id="help">Help<div class="tip19"><span class="tiptext19">&#9432; Click here to find help for using Bank of Vellore Online portal</span></div></a>
  <a href="contactpage.php" id="contact">Contact<div class="tip6"><span class="tiptext6">&#9432; Click here to knoow our contact details</span></div></a>
  <a href="usability.php" id="usability">Usability Testing<div class="tip20"><span class="tiptext20">&#9432; Click here to watch our Usability Testing Recording</span></div></a>
</div>
<div class="accountinfo">
	<h1 id="Header">Account Details</h1>
	<b class="userinfo">Account No. </b> : <?php echo $_SESSION['account_no']; ?> <br><br>
    <b class="userinfo">Username </b> : <?php echo $_SESSION['username'];  ?> <br><br>
    <b class="userinfo">IFSC Code</b> : <?php echo $_SESSION['IFSC']; ?><br><br>
    <div class="tip7"><a href="changeusername.php"><button type="submit" style="height: 80px;">Change Username</button></a><span class="tiptext7">&#9432; Click here to Change your Username</span></div>
    <div class="tip8"><a href="changepasswordpage.php"><button type="submit" style="height: 80px;">Change Password</button></a><span class="tiptext8">&#9432; Click here to Change your Password, Recommended to change in every 3 months</span></div>
</div>

</body>
</html>