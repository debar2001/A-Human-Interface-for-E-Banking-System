<?php 
include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

$account = $_SESSION['account_no'];
$query1 = "SELECT * FROM offline_users WHERE account_no = '".$account."'";
$result1 = mysqli_query($con, $query1);

if ($result1 && mysqli_num_rows($result1) > 0) {
  $acc_data = mysqli_fetch_assoc($result1);
  $balance = $acc_data['balance'];
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<script type="text/javascript" src="../js/account.js"></script>
	<title>Check Balance</title>
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
  <a href="homepage.php" id="home">Home<div class="tip2"><span class="tiptext2">&#9432; Click here to go to Home page</span></div></a>
  <a href="transactionpage.php" id="trans">Transaction<div class="tip3"><span class="tiptext3">&#9432; Click here to go to Transaction page</span></div></a>
  <a href="transactionhistorypage.php" id="transhis">Transaction History<div class="tip4"><span class="tiptext4">&#9432; Click here to view your Transaction History</span></div></a>
  <a href="changeatmpinpage.php" id="chatm">Change ATM Pin<div class="tip5"><span class="tiptext5">&#9432; Click here to change your ATM Pin</span></div></a>
  <a class="active" href="checkbalance.php" id="chbal">Check Balance<div class="tip18"><span class="tiptext18">&#9432; Click here to check your account balance</span></div></a>
  <a href="helppage.php" id="help">Help<div class="tip19"><span class="tiptext19">&#9432; Click here to find help for using Bank of Vellore Online portal</span></div></a>
  <a href="contactpage.php" id="contact">Contact<div class="tip6"><span class="tiptext6">&#9432; Click here to knoow our contact details</span></div></a>
  <a href="usability.php" id="usability">Usability Testing<div class="tip20"><span class="tiptext20">&#9432; Click here to watch our Usability Testing Recording</span></div></a>
</div>
<div class="accbal"><br><br><br><br><br><br><br><br><font style="font-size:50px; font-weight: bold;">Your Account Balance is : <?php echo $balance; ?></font>
      <br><br></div>