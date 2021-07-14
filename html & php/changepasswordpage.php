<?php

include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

if (isset($_POST['passchbtn'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $_SESSION['new_pass'] = $new_pass;

    $query1 = "SELECT * FROM online_users WHERE password = '".$old_pass."'";
    $result1 = mysqli_query($con, $query1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $acc_data = mysqli_fetch_assoc($result1);
        $_SESSION['old_pass'] = $user_data['password'];
        

        $rndno=rand(100000, 999999);
        $message = urlencode("otp number.".$rndno);
        $to=$_SESSION['email'];
        $subject = "Your Bank of Vellore OTP";
        $txt = "Your OTP to complete your password change process is:" .$rndno;
        $headers = "From: bankofvellore@gmail.com";
        mail($to, $subject, $txt, $headers);

        $_SESSION['otp'] = $rndno;
        header("location: enterotppasswordchange.php");
        die;

    }
    else
    {
        $message = "Please fill correct old password";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
  ?>






<!DOCTYPE html>
<html>
    <head>
      <title>Change Password</title>
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
       <div class="passchange">
        <form action="changepasswordpage.php" method="post">
        <h1 id="Header">Change Password</h1>
        <b>Old Password </b> : <input type="password" id="old_pass" name="old_pass" class="txtField" placeholder="Enter Old Password" required><br><br>
        <b>New Password </b> : <input type="password" id="new_pass" class="txtField" name="new_pass" placeholder="Enter New Password" onchange="CheckPassword1()" required><br><br>
        <b>Re-Enter New Password </b> : <input type="password"  id="re_new_pass" name="re_new_pass" class="txtField" placeholder="confirm new password" onkeyup="check(new_pass, re_new_pass, message)" required><span id="message"></span><br><br>
        <div class="tip11"><input type="submit" name="passchbtn" id="Submit" class="btn1" value="Submit"><span class="tiptext11">&#9432; Click here to process your password change request</span></div></form>
       </div>
    </body>
</html>