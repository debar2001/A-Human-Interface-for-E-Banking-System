<?php
include ("connect.php");

session_start();

if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

   if(isset($_POST['passchotp']))
  {
   $rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $account = $_SESSION['account_no'];
    $updated_pass = $_SESSION['new_pass'];
    $query1 = "UPDATE online_users SET password = '".$updated_pass."' WHERE account_no = '".$account."'";
    mysqli_query($con, $query1);
    header("location: confirmpasswordchange.php");
    die;
   }
   else
   {
    $message = "Invalid OTP! Password remains unchanged";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die;
   }
}



?>




<!DOCTYPE html>
<html>
<head>
	<title>Enter OTP</title>
  <script type="text/javascript" src="../js/check.js"></script>
<link rel="stylesheet" type="text/css" href="../css/transferstyle.css">

  <link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
    </head>
    <body>
       <canvas></canvas>
      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo2.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="homepage.html">
</map>
<div class="tip1"><a href="logout_action.php">
    <button type="submit" class="logout">Log Out</button></a><span class="tiptext1">&#9432; Click here to Log Out, if clicked you have to Log In again</span></div>
       <div class="otppasschange">
        <form action="enterotppasswordchange.php" method="post">
        <h1>Enter the OTP(One Time Password) sent to your registered Email Id  :</h1> <br><br><input type="password" id="otp" class="txtField" placeholder="Enter OTP" onchange="checkotp(otp)" name="otpval" required><br><br>
        <div class="tip14"><input type="submit" name="passchotp" id="Submit" class="btn1" value="Submit"><span class="tiptext14">&#9432; Click here to complete the procedure for Password Change</span></div></form>
       </div>
    </body>
</html>