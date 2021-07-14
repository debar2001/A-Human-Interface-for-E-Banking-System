<?php

include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

if (isset($_POST['atmpinbtn'])) {
    $old_atmpin = $_POST['old_atmpin'];
    $new_atmpin = $_POST['new_atmpin'];
    $_SESSION['new_atmpin'] = $new_atmpin;

    $query1 = "SELECT * FROM offline_users WHERE atm_pin = '".$old_atmpin."'";
    $result1 = mysqli_query($con, $query1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $acc_data = mysqli_fetch_assoc($result1);
        $_SESSION['old_atmpin'] = $user_data['atm_pin'];
        

        $rndno=rand(100000, 999999);
        $message = urlencode("otp number.".$rndno);
        $to=$_SESSION['email'];
        $subject = "Your Bank of Vellore OTP";
        $txt = "Your OTP to complete your atm pin change process is:" .$rndno;
        $headers = "From: bankofvellore@gmail.com";
        mail($to, $subject, $txt, $headers);

        $_SESSION['otp'] = $rndno;
        header("location:enterotpatmpinchange.php");
        die;

    }
    else
    {
        $message = "Please fill correct old atm pin";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
  ?>


<!DOCTYPE html>
<html>
<head>
	<title>Change ATM PIN</title>
<link rel="stylesheet" type="text/css" href="../css/transferstyle.css">
<script type="text/javascript" src="../js/check.js"></script>


  <link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
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
  <a class="active" href="changeatmpinpage.php" id="chatm">Change ATM Pin<div class="tip5"><span class="tiptext5">&#9432; Click here to change your ATM Pin</span></div></a>
  <a href="checkbalance.php" id="chbal">Check Balance<div class="tip18"><span class="tiptext18">&#9432; Click here to check your account balance</span></div></a>
  <a href="helppage.php" id="help">Help<div class="tip19"><span class="tiptext19">&#9432; Click here to find help for using Bank of Vellore Online portal</span></div></a>
  <a href="contactpage.php" id="contact">Contact<div class="tip6"><span class="tiptext6">&#9432; Click here to knoow our contact details</span></div></a>
  <a href="usability.php" id="usability">Usability Testing<div class="tip20"><span class="tiptext20">&#9432; Click here to watch our Usability Testing Recording</span></div></a>
</div>       
<div class="atmpin">
        <form action="changeatmpinpage.php" method="post">
        <h1 id="Header">Change ATM Pin</h1>
        <b>Old ATM Pin </b> : <input type="text" id="old_atmpin" name="old_atmpin" class="txtField" placeholder="Enter Old ATM Pin" onchange="checkatmpin(old_atmpin);" required><br><br>
        <b>New ATM Pin </b> : <input type="text" id="new_atmpin" name="new_atmpin" class="txtField" placeholder="Enter New ATM Pin" onchange="checkatmpin(new_atmpin);" required><br><br>
        <b>Re-Enter New ATM Pin </b> : <input type="text"  id="re_new_atmpin" name="re_new_atmpin" class="txtField" placeholder="Confirm new ATM Pin" onfocus="hide(new_atmpin);" onblur="show1(new_atmpin);" onkeyup="check(new_atmpin,re_new_atmpin,message);" required><span id="message"></span><br><br>
        <div class="tip10"><input type="submit" name="atmpinbtn" id="Submit" class="btn1"><span class="tiptext10">&#9432; Click here to process your ATM Pin change request</span>
       </div></form></div>
    </body>
</html>