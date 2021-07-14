<?php
include ("connect.php");

session_start();
if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}

   if(isset($_POST['transotp']))
  {
   $rno=$_SESSION['otp'];
   $urno=$_POST['otpval'];
   if(!strcmp($rno,$urno))
   {
    $query1 = "SELECT * FROM offline_users WHERE account_no = '".$_SESSION['accnt']."'";
    $result1 = mysqli_query($con, $query1);
    if ($result1 && mysqli_num_rows($result1) > 0) {
        $acc_data1 = mysqli_fetch_assoc($result1);
        $balance1 = $acc_data1['balance'];
        $balance = $_SESSION['balance'];
        $amount = $_SESSION['amount'];
        $account = $_SESSION['account_no'];
        $accnt = $_SESSION['accnt'];
        $IFSC1 = $_SESSION['IFSC1'];
        $updated_sender_balance = $balance - $amount;
        $query2 = "UPDATE offline_users SET balance = '".$updated_sender_balance."' WHERE account_no = '".$account."'";
        mysqli_query($con, $query2);
        $query3 = "SELECT * FROM offline_users WHERE account_no = '".$account."'";
        $result2 = mysqli_query($con, $query3);
        if ($result2 && mysqli_num_rows($result2) > 0) {
            $acc_data2 = mysqli_fetch_assoc($result2);
            $balance3 = $acc_data2['balance'];

            $query4 = "INSERT INTO transactions (from_account_no, to_account_no, amount, IFSC1, balance) values('$account','$accnt', '$amount', '$IFSC1', '$balance3')";
            mysqli_query($con, $query4);
        }
        $updated_receiver_balance = $balance1 + $amount;
        $query5 = "UPDATE offline_users SET balance = '".$updated_receiver_balance."' WHERE account_no = '".$accnt."'";
        mysqli_query($con, $query5);
        header("location: confirmtransaction.php");
        die;
    }
    else
    {
        $balance = $_SESSION['balance'];
        $amount = $_SESSION['amount'];
        $account = $_SESSION['account_no'];
        $accnt = $_SESSION['accnt'];
        $IFSC1 = $_SESSION['IFSC1'];
        $updated_sender_balance = $balance - $amount;
        $query6 = "UPDATE offline_users SET balance = '".$updated_sender_balance."' WHERE account_no = '".$_SESSION['account_no']."'";
        mysqli_query($con, $query2);
        $query7 = "SELECT * FROM offline_users WHERE account_no = '".$account."'";
        $result3 = mysqli_query($con, $query3);
        if ($result3 && mysqli_num_rows($result3) > 0) {
            $acc_data2 = mysqli_fetch_assoc($result3);
            $balance3 = $acc_data2['balance'];

            $query8 = "INSERT INTO transactions (from_account_no, to_account_no, amount, IFSC1, balance) values('$account','$accnt', '$amount', '$IFSC1', '$balance3')";
            mysqli_query($con, $query4);
            header("location: confirmtransaction.php");
            die;
        } 
    }

    }
    else
    {
        $message = "Invalid OTP! Transaction Incomplete";
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
  <area shape="rect" coords="0,0,200,80" alt="hom" href="homepage.html">
</map>
<div class="tip1"><a href="logout_action.php">
    <button type="submit" class="logout">Log Out</button></a><span class="tiptext1">&#9432; Click here to Log Out, if clicked you have to Log In again</span></div>
       <div class="otptrans">
        <form action="enterotptransaction.php" method="post">
        <h1>Enter the OTP(One Time Password) sent to your registered Email Id  :</h1> <br><br><input type="password" id="otp" class="txtField" name="otpval" placeholder="Enter OTP" onchange="checkotp(otp)" required><br><br>
        <div class="tip15"><input id="Submit" type="submit" name="transotp" value="Submit" class="btn1"><span class="tiptext15">&#9432; Click here to complete the Transaction procedure</span></div></form>
       </div>
    </body>
</html>