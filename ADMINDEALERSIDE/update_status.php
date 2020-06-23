<?php
	session_start();
        include_once './includes/config.php';
	if(strlen($_SESSION['alogin'])==0)
	{	
            header('location:login.php');
        }
    
	$get_userid = intval($_GET['userid']);
	$q=  mysqli_query($con,"select * from tbl_dealer where DEALER_ID='$get_userid'");
	
	$row = mysqli_fetch_array($q);	
        if($row['DEALER_STATUS'] == 'A') {
        mysqli_query($con, "update tbl_dealer set DEALER_STATUS='D' where DEALER_ID='$get_userid'");
		header("location: VIEW_DEALER.php");
	} else {
		 mysqli_query($con, "update tbl_dealer set DEALER_STATUS='A' where DEALER_ID='$get_userid'");
		header("location: VIEW_DEALER.php");
            }
		
	
?>