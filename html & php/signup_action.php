<?php  

include("connect.php");

/* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

if(isset($_POST['signupbtn']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $branch = $_POST['branch'];
    $pincode = $_POST['pincode'];
    $user = $_POST['user'];
    $pw2 = $_POST['pw2'];
    $phone = $_POST['phone'];
    $Email = $_POST['Email'];
    $actype = $_POST['actype'];

    if ($branch=='Vellore') {
    	$IFSC = "BOVB0000001";
    }
    elseif ($branch=='Tirumala') {
    	$IFSC = "BOVB0000002";
    }
    else{
    	$IFSC = "BOVB0000003";
    }

    $query3 = "SELECT * FROM online_users WHERE fname ='".$fname."' AND lname='".$lname."'";
    $result1 = mysqli_query($con, $query3);
    if ($result1 && mysqli_num_rows($result1) >0)
    {
        session_destroy();
        die(header("location:welcomepage.php?signupFailed1=true"));
    }
    else
    {
    $query1 = "SELECT * FROM offline_users WHERE fname ='".$fname."' AND lname ='".$lname."' LIMIT 1";

    $result = mysqli_query($con, $query1);

    if($result && mysqli_num_rows($result) >0)
    {
    	$acc_data = mysqli_fetch_assoc($result);
    	$account = $acc_data['account_no'];

        $query4 = "SELECT * FROM online_users WHERE username = '".$user."'";

        $result3 = mysqli_query($con, $query3);

        if($result3 && mysqli_num_rows($result3) > 0)
        {
            session_destroy();
            die(header("location: welcomepage.php?signupFailed2=true"));
        }
        else
        {
    	$query2 = "INSERT INTO online_users (account_no, fname, lname, address, city, branch_name, pincode, username, password, phoneno, email, account_type, IFSC) values ('$account', '$fname', '$lname', '$address', '$city', '$branch', '$pincode', '$user', '$pw2', '$phone', '$Email', '$actype', '$IFSC')";

    	mysqli_query($con, $query2);

    	header("location: confirmsignup.php");
    	die;
        }
    }
    else
    {
    	session_destroy();
    	die(header("location:welcomepage.php?signupFailed=true"));
    }}


}
?>