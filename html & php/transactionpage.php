<?php


include ("connect.php");


 session_start();

if(!isset($_SESSION['username'])){
      header("location: welcomepage.php");
}
$account = $_SESSION['account_no'];
$query1 = "SELECT * FROM offline_users WHERE account_no = '".$account."'";
  $result1 = mysqli_query($con, $query1);
  if($result1 && mysqli_num_rows($result1) > 0)
  {
    $acc_data = mysqli_fetch_assoc($result1);
    $balance = $acc_data['balance'];
  }
if (isset($_POST['transbtn'])) {
  $account = $_SESSION['account_no'];
  $accnt = $_POST['accnt_no'];
  $IFSC = $_POST['IFSC'];
  $amount = $_POST['amount'];
  $password = $_POST['accnt_pass'];


  if ($password === $_SESSION['password']) {
    $_SESSION['accnt'] = $accnt;
    $_SESSION['IFSC1'] = $IFSC;
    $_SESSION['amount'] = $amount;
    $query = "SELECT * FROM offline_users WHERE account_no = '".$account."'";
    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
      $acc_data = mysqli_fetch_assoc($result);
      $balance = $acc_data['balance'];

      if($balance < $_SESSION['amount'])
      {
        $message = "You don't have sufficient Balance!";
        echo "<script type='text/javascript'>alert(\"$message\");</script>";
        die;
      }
      else
      {
        $_SESSION['balance'] = $balance; 
        $rndno=rand(100000, 999999);
        $message = urlencode("otp number.".$rndno);
        $to=$_SESSION['email'];
        $subject = "Your Bank of Vellore OTP";
        $txt = "Your OTP to complete your transaction is:" .$rndno;
        $headers = "From: bankofvellore@gmail.com";
        mail($to, $subject, $txt, $headers);

        $_SESSION['otp'] = $rndno;
        header("location:enterotptransaction.php");
        die;
     }
   }
  }
  else
  {
    $message = "Transaction cannot be processed! Please fill your password correctly.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die;
  }
}



?>




<!DOCTYPE html>
<html>
    <head>
      <title>Transaction</title>
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
  <div class="topnav">
  <a href="homepage.php" id="home">Home<div class="tip2"><span class="tiptext2">&#9432; Click here to go to Home page</span></div></a>
  <a class="active" href="transactionpage.php" id="trans">Transaction<div class="tip3"><span class="tiptext3">&#9432; Click here to go to Transaction page</span></div></a>
  <a href="transactionhistorypage.php" id="transhis">Transaction History<div class="tip4"><span class="tiptext4">&#9432; Click here to view your Transaction History</span></div></a>
  <a href="changeatmpinpage.php" id="chatm">Change ATM Pin<div class="tip5"><span class="tiptext5">&#9432; Click here to change your ATM Pin</span></div></a>
  <a href="checkbalance.php" id="chbal">Check Balance<div class="tip18"><span class="tiptext18">&#9432; Click here to check your account balance</span></div></a>
  <a href="helppage.php" id="help">Help<div class="tip19"><span class="tiptext19">&#9432; Click here to find help for using Bank of Vellore Online portal</span></div></a>
  <a href="contactpage.php" id="contact">Contact<div class="tip6"><span class="tiptext6">&#9432; Click here to knoow our contact details</span></div></a>
  <a href="usability.php" id="usability">Usability Testing<div class="tip20"><span class="tiptext20">&#9432; Click here to watch our Usability Testing Recording</span></div></a>
</div>
        <div class="transaction">
          <form action="transactionpage.php" method="post">
            <h1 id="Header">Transaction Form</h1>
            <b>Beneficiary Account no.</b> : <input type="text" class="txtField" id="accnt_no" name="accnt_no" placeholder="Enter Account Number" onchange="checkbankacc(accnt_no);" required><br><br>
            <b>Re-Enter Beneficiary Account No.</b> : <input type="text" class="txtField" id="re_enter_acnt_no" name="re_enter_acnt_no" placeholder="Re-Enter Account Number" size="40" onfocus="hide(accnt_no)" onblur="show1(accnt_no);" onkeyup="check(accnt_no,re_enter_acnt_no,message);" required>&nbsp;<span id="message"></span><br><br>
            <b>IFSC Code</b> : <input type="text" class="txtField" id="IFSC" name="IFSC" placeholder="Enter IFSC Code" onchange="checkIFSC(IFSC)" required><br><br>
            <b>Amount</b> : <input type="text" class="txtField" id="amount" name="amount" placeholder="Enter Amount"><font style="font-size: 15px;"> Balance:<?php echo $balance ?></font><br><br>
            <b>Password</b> : <input type="password" class="txtField" id="accnt_pass" name="accnt_pass" placeholder="Enter your login password" onchange="CheckPassword1(accnt_pass);" required><br><br>
            <div class="tip9"><input type="submit" class="btn1" id="Submit" name="transbtn" value="Submit"><span class="tiptext9">&#9432; Click here to process your transaction</span></div></form>
        </div>
    </body>
</html>