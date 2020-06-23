<?php
	session_start();
        include_once './includes/config.php';
	if(strlen($_SESSION['alogin'])==0)
	{	
            header('location:login.php');
        }
    
	$get_userid = intval($_GET['userid']);
	$q=  mysqli_query($con,"select * from customer_reg where CUSTOMER_ID='$get_userid'");
	
	$row = mysqli_fetch_array($q);	
        if($row['CUSTOMER_STATUS'] == 'A') {
        mysqli_query($con, "update customer_reg set CUSTOMER_STATUS='D' where CUSTOMER_ID='$get_userid'");
		header("location: view_customer.php");
	} else {
		 mysqli_query($con, "update customer_reg set CUSTOMER_STATUS='A' where CUSTOMER_ID='$get_userid'");
		header("location: view_customer.php");
            }
		
	
?>