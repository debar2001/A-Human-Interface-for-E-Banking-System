<?php

include("connect.php");
session_start();

if (isset($_POST['fpassbtn'])) {
    $new_pass = $_POST['new_pass'];
    $_SESSION['new_pass'] = $new_pass;
    header("location: emailidrequest.php");
    die;
}
  ?>



<!DOCTYPE html>
<html>
    <head>
      <title>Forgot Password</title>
      <script type="text/javascript" src="../js/check.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/transferstyle.css">

  <link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
    </head>
    <body>
       <canvas></canvas>
      <script type="text/javascript" src="../js/canvas.js"></script>
  <img src="../logo/Logo2.png" alt="logo" usemap="#logomap" width="100" height="50">
  <map name="logomap">
  <area shape="rect" coords="0,0,200,80" alt="hom">
</map>
       <div class="passchange">
        <h1 id="Header">Forgot Password</h1>
        <form action="forgotpasswordpage.php" method="post">
        <b>New Password </b> : <input type="password" id="new_pass" name="new_pass" class="txtField" placeholder="Enter New Password" onchange="CheckPassword1()" required><br><br>
        <b>Re-Enter New Password </b> : <input type="password"  id="re_new_pass" name="re_new_pass" class="txtField" placeholder="confirm new password" onkeyup="check(new_pass, re_new_pass, message)" required><span id="message"></span><br><br>
        <div class="tip11"><input type="submit" class="btn1" id="Submit" value="Submit" name="fpassbtn"><span class="tiptext11">&#9432; Click here to process your password change request</span></div></form>
       </div>
    </body>
</html>