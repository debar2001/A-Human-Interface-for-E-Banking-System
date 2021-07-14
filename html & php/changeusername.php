<?php

include("connect.php");
session_start();

if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

if (isset($_POST['userchbtn'])) {
    $old_user = $_POST['old_user'];
    $new_user = $_POST['new_user'];
    $_SESSION['new_user'] = $new_user;

    $query1 = "SELECT * FROM online_users WHERE username = '".$old_user."'";
    $result1 = mysqli_query($con, $query1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $acc_data = mysqli_fetch_assoc($result1);
        $_SESSION['old_user'] = $user_data['username'];
        

        $rndno=rand(100000, 999999);
        $message = urlencode("otp number.".$rndno);
        $to=$_SESSION['email'];
        $subject = "Your Bank of Vellore OTP";
        $txt = "Your OTP to complete your username change process is:" .$rndno;
        $headers = "From: bankofvellore@gmail.com";
        mail($to, $subject, $txt, $headers);

        $_SESSION['otp'] = $rndno;
        header("location: enterotpusernamechange.php");
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
	<title>Change Username</title>
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
       <div class="usernamechange">
        <form action="changeusername.php" method="post">
        <h1 id="Header">Change Username</h1>
        <b>Old Username </b> : <input type="text" id="old_user" name="old_user" class="txtField" placeholder="Enter Old Username"
        required><br><br>
        <b>New Username </b> : <input type="text" id="new_user" name="new_user" class="txtField" placeholder="Enter New Username" onchange="CheckUsername(new_user);" required><br><br>
        <b>Re-Enter New Username </b> : <input type="text"  id="re_new_user" name="re_new_user" class="txtField" placeholder="Confirm new Username" onfocus="hide(new_user);" onkeyup="check(new_user, re_new_user, message)" required><span id="message"></span><br><br>
        <div class="tip12"><input type="submit" name="userchbtn" id="Submit" class="btn1" value="Submit"><span class="tiptext12">&#9432; Click here to process your username change request</span></div></form>
       </div>
    </body>
</html>