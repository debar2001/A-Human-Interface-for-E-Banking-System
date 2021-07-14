<?php
include("connect.php");
session_start();

if(isset($_POST['fpassotp']))
{
   $rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $email = $_SESSION['email'];
    $updated_pass = $_SESSION['new_pass'];
    $query1 = "UPDATE online_users SET password = '".$updated_pass."' WHERE email = '".$email."'";
    mysqli_query($con, $query1);
    header("location: confirmforgotpassword.php");
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
  <area shape="rect" coords="0,0,200,80" alt="hom1" href="welcomepage.php">
</map>
       <div class="otppasschange">
        <form action="enterotpforgotpassword.php" method="post">
        <h1>Enter the OTP(One Time Password) sent to your registered Email Id  :</h1> <br><br><input type="password" id="otp" name="otpval" class="txtField" placeholder="Enter OTP" onchange="checkotp(otp)" required><br><br>
        <div class="tip14"><input type="submit" value="Submit" name="fpassotp" class="btn1" id="Submit"><span class="tiptext14">&#9432; Click here to complete the procedure for Password Change</span></div></form>
       </div>
    </body>
</html>