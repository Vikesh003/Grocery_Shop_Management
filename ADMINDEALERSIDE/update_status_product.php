<?php
	session_start();
        include_once './includes/config.php';
	if(strlen($_SESSION['alogin'])==0)
	{	
            header('location:login.php');
        }
    
	$get_userid = intval($_GET['userid']);
	$q=  mysqli_query($con,"select * from order_item_customer where order_id='$get_userid'");
	
	$row = mysqli_fetch_array($q);	
	 mysqli_query($con, "update order_item_customer set status='A' where order_id='$get_userid'");
		header("location: SHOW_ORDERS.php");
         
		
	
?>