<?php
session_start();
include_once './includes/config.php';

$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$res=mysqli_query($con,"select * from tbl_dealer where DEALER_EMAIL='$email' and DEALER_OTP='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($con,"update tbl_dealer set STATUS='A' where DEALER_EMAIL='$email'");
        $result="yes";
	echo "yes";
}else{
    $result="not_exist";
	echo "not_exist";
}
?>