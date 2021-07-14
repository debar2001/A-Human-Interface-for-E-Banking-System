<?php
include ("connect.php");

session_start();

if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}


   if(isset($_POST['atmpinotp']))
  {
   $rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $account = $_SESSION['account_no'];
    $updated_atmpin = $_SESSION['new_atmpin'];
    $query1 = "UPDATE offline_users SET atm_pin = '".$updated_atmpin."' WHERE account_no = '".$account."'";
    mysqli_query($con, $query1);
    header("location: confirmatmpinchange.php");
    die;
   }
   else
   {
    $message = "Invalid OTP! ATM Pin remains unchanged";
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
  <area shape="rect" coords="0,0,200,80" alt="hom" href="homepage.php">
</map>
<div class="tip1"><a href="logout_action.php">
    <button type="submit" class="logout">Log Out</button></a><span class="tiptext1">&#9432; Click here to Log Out, if clicked you have to Log In again</span></div>
       <div class="otpatmpin">
        <form action="enterotpatmpinchange.php" method="post">
        <h1>Enter the OTP(One Time Password) sent to your registered Email Id  :</h1> <br><br><input type="password" id="otp" class="txtField" name="otpval" placeholder="Enter OTP" onchange="checkotp(otp)" required><br><br>
        <div class="tip13"><input type="submit" name="atmpinotp" class="btn1" value="Submit" id="Submit"><span class="tiptext13">&#9432; Click to complete the procedure for ATM Pin Change.</span></div></form>
       </div>
    </body>
</html>