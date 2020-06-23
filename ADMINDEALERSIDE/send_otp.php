<?php
session_start();
include_once './includes/config.php';
$email=$_POST['email'];
$res=mysqli_query($con,"insert into tbl_dealer(DEALER_EMAIL) values('$email')");
if($res)
{
	$otp=rand(11111,99999);
	mysqli_query($con,"update tbl_dealer set DEALER_OTP='$otp' where DEALER_EMAIL='$email'");
	$html="Your otp verification code is ".$otp;
        $headers = "From: groceryshoopingsurat@gmail.com";
	$_SESSION['EMAIL']=$email;
	mail($email,"OTP Verification",$html,$headers);
        $result="yes";
	echo "yes";
}

?>