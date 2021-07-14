<?php    

if (isset($_GET['signupFailed'])) {
        $message1 = "Record not Found ! Please visit your nearest Bank of Vellore Branch.";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }

if (isset($_GET['loginFailed'])) {
        $message = "You are not a portal user! Please complete the Sign Up Process/ You filled a wrong username!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

if (isset($_GET['signupFailed1'])) {
        $message2 = "You already have an account ! Please Log In.";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }

if (isset($_GET['signupFailed2'])) {
        $message2 = "Username already taken please fill a different username.";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bank Of Vellore</title>
	<link rel="icon" type="image/x-icon" href="../logo/Logo1.png">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.7.7/dat.gui.min.js"></script>
	<script type="text/javascript" src="../js/account.js"></script>
	<script type="text/javascript" src="../js/check.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/welcomestyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<body>
	<canvas></canvas>
	<script type="text/javascript" src="../js/canvas.js"></script>
	<img src="../logo/Logo.png" alt="logo" usemap="#logomap" width="600" height="150">
    <map name="logomap">                                                  <!--use of imagemap-->
	   <area shape="rect" coords="0,0,600,150">
    </map>



    <div class="tooltip">
    <button class="login" id="myBtn" onclick="login();">Log In</button><span class="tooltiptext">&#9432; Use this button if you are a registered user.</span></div>
    <div class="modal" id="myModal">
    	<div class="modal-content">
    		<form action="login_action.php" method="post">
    		<font size="20" style="font-weight: bold">Log In</font>
    		<span class="close">&times;</span>
    		<br><br>
    		
		<label for="user">Username &nbsp;:&nbsp; </label><input type="text" id="username" name="user" placeholder="Enter your Username" size="40" required onchange="CheckUsername1(username)"><br><br>
		<label for="pw2">Password &nbsp;:&nbsp; </label>
		<input type="password" id="pw1" name="pw2" required  size="40" placeholder="Enter your Password" onchange="CheckPassword1(pw1);">
		<br><br>
		<div class="tip5"><input type="submit" class="btn1" value="Submit" name="loginbtn"><span class="tiptext5">&#9432; Click on this button to Log In to your Account</span></div><br><br><br><br><hr>
		<font size="3">Do not have an account?<div class="tip1"><a id="myLink" href="javascript:void(0)" onclick="signup1();">Create Account</a><span class="tiptext1">&#9432; Click on this link to create a new account</span></font></div><br><br>
		<font size="3">Forgot Password?<div class="tip2"><a id="myLink1" href="forgotpasswordpage.php">Click Here</a><span class="tiptext2">&#9432; Click on this link if you don't remember your password and want to change it</span></font></div>	
    </form></div>
    </div>
    <div class="tooltip1"><button class="signup" id="myBtn1" onclick="signup();">Sign Up</button><span class="tooltiptext1">&#9432; Use this button to create new account</span></div>
    <div class="modal1" id="myModal1">
    	<div class="modal-content1">
    		<form action="signup_action.php" method="post">
    		<font size="20" style="font-weight: bold">Create New Account</font>
    		<span class="close1">&times;</span>
    		<br><br>

    		<label for="fname">First Name <font size="2">&#9733;</font>&nbsp;:&nbsp; </label><input type="text" id="fname" name="fname" placeholder="Enter your First Name" size="40" required onchange="CheckName(fname);"><br><br>

		<label for="lname">Last Name <font size="2">&#9733;</font>&nbsp;:&nbsp; </label>
		<input type="text" id="lname" name="lname" required size="40" placeholder="Enter your Last Name" onchange="CheckName(lname);"><br><br>

		<label for="address" style="position: relative; top: -70px;">Address <font size="2">&#9733;</font>&nbsp;:&nbsp; </label>
		<textarea id="address" name="address" placeholder="Enter your Address" rows="5" cols="50" required></textarea><br><br>

		<label for="city">City <font size="2">&#9733;</font>&nbsp;:&nbsp; </label>
		<input type="text" id="city" name="city" required size="40" placeholder="Enter City"><br><br>

		<label for="branch">Branch Name <font size="2">&#9733;</font>&nbsp;:&nbsp; </label>
		<select name="branch" id="branch" onblur="checkselect1();" required>
			<option selected="selected">Select Your Branch Name</option>
			<option value="Vellore">Vellore</option>
			<option value="Nellore">Nellore</option>
			<option value="Tirumala">Tirumala</option>
		</select><br><br>

		<label for="pincode">Pin Code <font size="2">&#9733;</font>&nbsp;:&nbsp; </label>
		<input type="text" id="pincode" name="pincode" required size="40" placeholder="Enter Pin Code of your Locality" onchange="checkpincode(pincode);"><br><br>

		<label for="user">Username <font size="2">&#9733;</font>&nbsp;:&nbsp; </label>
		<input type="text" id="user" name="user" required size="40" placeholder="Write a Username of your choice" onchange="CheckUsername(user);" onfocus="show(span1);" onblur="document.getElementById('span1').style.display='none';"><span id="span1" style="font-size: 12pt;">&#9432; Convention: Username should contain only 5 characters which should include atleast one from @,#,$,&</span><br><br>

		<label for="pw2">Password<font size="2">&#9733</font> :    
<input type="password" id="pw2" name="pw2" required size="40" placeholder="Please enter a password of your choice" onfocus="show(span2);" onblur="document.getElementById('span2').style.display='none';" onchange="CheckPassword(pw2);"></label><span id="span2" style="font-size: 12pt;">&#9432; Convention: Password can vary in length from 8-12 characters which should include atleast one from @,#,$,% , it should also have atleast one uppercase and one lower case letter, it should also have atleast one number</span><br><br>

		<label for="cpw">Confirm-Password<font size="2">&#9733;</font> :  </label>
<input type="password" id="cpw" name="cpw" required size="40" onkeyup='check(pw2,cpw,message);' placeholder="Please confirm the password written above">&nbsp;<span id="message"></span><br><br>

<label for="phone">Enter Phone Number<font size="2">&#9733;</font> :  </label><div class="ph"><input type="tel" name="phone" id="phone" onchange="checkcontact(phone);" required></div><br><br>

<label for="Email">Email Id<font size="2">&#9733;</font> :  </label>
<input type="email" name="Email" id="Email" size="40" placeholder="Enter your Email Id" required onchange="checkEmail(Email);"><br><br>

<label for="actype">Account Type<font size="2">&#9733;</font> :  </label>
<select name="actype" id="actype" required onblur="checkselect2();">
			<option selected="selected">Select Your Account Type</option>
			<option value="Savings Account">Savings Account</option>
			<option value="Current Account">Current Account</option>
		</select><br><br>

<font size="3">&#9733; Mandatory Fields</font><br><br>
<div class="tip4">
<input type="submit" value="Submit" class="btn2" name="signupbtn"><span class="tiptext4">&#9432; Click on this button to complete the process of creating your Account</span></div><br><br><hr>
<font size="3">Already have an account?<div class="tip3"><a id="myLink" href="javascript:void(0)" onclick="login1();">Click here to Log In</a><span class="tiptext3">&#9432; Click on this link to log into your Account</span></font></div><br><br></form>
</div></div>
</body>
<script>
   function getIp(callback) {
 fetch('https://ipinfo.io/json?token=e8d8fb45a7cc9c', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
   	 initialCountry: "auto",
     geoIpLookup: getIp,
     preferredCountries: ["in","us","uk","ru"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });

   function telephone(){
   	const phoneNumber = phoneInput.getNumber();
   	alert(phoneNumber);
   }
 </script>
</html>