<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
error_reporting(0);
include_once './include/database.php';
if(strlen($_SESSION['login'])==0){	
header('location:loginSignUp1.php');
}
// Code user Registration

// Code for TRACK YOUR ORDER
if(isset($_POST['login']))
{
    $num=0;
     $l=$_SESSION['id'];
     $orderid=$_POST['orderid'];
     $query=mysqli_query($con,"SELECT order_item_customer.*,order_table.* FROM order_item_customer,order_table WHERE order_item_customer.order_item_customerid='$l' and order_item_customer.order_id=order_table.order_id and order_item_customer.order_id='$orderid'");
     $num=  mysqli_num_rows($query);
        if($num>0)
        {
           header("location: track_orders.php?oid=".$orderid."");
        }
        else
        {
            $error="Order ID is Incorrect";
        }
}


?>


<!DOCTYPE html>
<html>
<head>
    <?php include_once './include/headeLinks.php'; ?>
    
</head>
	
<body>
    <?php if(isset($_SESSION['login']))
        {	
            include_once './include/heade2.php';
        }
       
     ?>
            <nav class="navbar navbar-default" role="navigation"  style="background-color: black;">
    <div class="container-fluid">
     <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only" >Menu</span>
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
     
     </div>
     <div id="navbar-cart" class="navbar-collapse collapse">
         <ul class="nav navbar-right">
       <li>
        <a id="cart-popover" class="btn" data-placement="bottom"  title="Shopping Cart">
            <span class="glyphicon glyphicon-shopping-cart" style="color: white;"></span>
            <span class="badge" ></span>
         <span class="total_price" style="color: white;">$ 0.00</span>
        </a>
       </li>
      </ul>
     </div>
    </div>
   </nav>
  
   <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">
     <a href="order_process.php" class="btn btn-primary" id="check_out_cart">
      <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
      <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
    </div>
   </div>

   <div id="display_item" class="row">

   </div>
    <div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index1.php">Home</a><span>|</span></li>
				<li>Track Order</li>
			</ul>
		</div>
    </div> 
    <?php  include_once './include/sidebar.php'; ?>
	<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login">
			<h3>Track order</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
                                      <h5 style="color:red"><?php if($error!=""){ echo "$error"; } ?></h5>
					<h2>Track Order</h2>
                                        <?php $l=$_SESSION['login']; ?>
					<form action="#" method="post">
                                            <input type="text" name="Email" value="<?php echo $l; ?>" readonly="true" placeholder="Email Address" required=" ">
					  <input type="text" name="orderid" placeholder="Order id" required=" ">
                                          <input type="submit" value="Track Order" name="login">
					</form>
				  </div>
				  
                                    
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
        <?php include_once './include/footer.php'; ?>
<?php include_once './include/footerLinks.php'; ?>
</body>
</html>
