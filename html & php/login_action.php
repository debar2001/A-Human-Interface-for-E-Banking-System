<?php
 include ("connect.php");

 /* Avoid multiple sessions warning
   Check if session is set before starting a new one. */
   if(!isset($_SESSION['username']))
   {
      session_start();
   }

    if(isset($_POST['loginbtn']))
    {
    	$username = $_POST['user'];
    	$pw1 = $_POST['pw2'];

    	$query = "SELECT * FROM useraccounts WHERE username ='".$username."'";
    	$result = mysqli_query($con, $query);

    	if ($result && mysqli_num_rows($result) > 0) 
      {
    		$user_data = mysqli_fetch_assoc($result);
         
         if($user_data['password'] === $pw1)
         {
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['account_no'] = $user_data['account_no'];
            $_SESSION['IFSC'] = $user_data['IFSC'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['password'] = $user_data['password'];
            header("location: homepage.php");
            die;
         }
    		
    	}
      else
      {
         die(header("location: welcomepage.php?loginFailed=true"));
      }
    	
    }
?>