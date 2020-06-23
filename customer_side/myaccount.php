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
// Code user RESET PASSWORD
if(isset($_POST['resetp']))
{
    $password=md5($_POST['Password']);
    $npassword=  md5($_POST['NPassword']);
    $rpassword=  md5($_POST['RPassword']);
    $id=  intval($_SESSION['id']);
    $pass=  mysqli_query($con,"select * from customer_reg where CUSTOMER_ID='$id'");
    $c=  mysqli_fetch_array($pass);
    $pa=$c['CUSTOMER_PASSWORD'];
    if($pa==$password){
        if($npassword==$rpassword){
                $query=mysqli_query($con,"update customer_reg set CUSTOMER_PASSWORD='$npassword' WHERE CUSTOMER_ID='$id'");
                if($query){
                    echo "<script>alert('Password Updated..!');</script>";
                }
            }
            else{
                echo "<script>alert('Not match Password..!');</script>";
            }
    }
    else {
        echo "<script>alert('Old Password not match..!');</script>";
    }
}

//CODE FOR UPDATE PROFILE
if(isset($_POST['my']))
{
    $id=  intval($_SESSION['id']);
    $userna=$_POST['Username'];
    $gmail=$_POST['Email'];
    $phone=$_POST['Phone'];
    $pr=  mysqli_query($con, "update customer_reg set CUSTOMER_NAME='$userna',CUSTOMER_GMAIL='$gmail', CUSTOMER_PHONE='$phone' where CUSTOMER_ID='$id'");
    if($pr){
         echo "<script>alert('Profile Updated..!');</script>";
    }
    else{
        echo "<script>alert('Something went wrong..!');</script>";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <?php include_once './include/headeLinks.php'; ?>
    
</head>
	
<body>
    <?php include_once './include/heade2.php';
     ?>
          
    <div class="products-breadcrumb">
		<div class="container">
			<ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index1.php">Home</a><span>|</span></li>
				<li>My Account</li>
			</ul>
		</div>
    </div> 
    <?php  include_once './include/sidebar.php'; ?>
	<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login">
			<h3>My Profile</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
                                      <?php $custid=$_SESSION['id']; $q=  mysqli_query($con,"select * from customer_reg where CUSTOMER_ID='$custid'");
                                      $row=  mysqli_fetch_array($q);
                                      $uname=$row['CUSTOMER_NAME'];
                                      $gmail=$row['CUSTOMER_GMAIL'];
                                      $phone=$row['CUSTOMER_PHONE'];
                                      ?>
					<h2>My Profile </h2>
					<form action="#" method="post">
                                            <input type="text" name="Username" value="<?php echo $uname ?>"  required=" ">
                                            <input type="email" name="Email" value="<?php echo $gmail ?>"  required=" ">
                                          <input type="text" name="Phone" value="<?php echo $phone ?>"  required=" ">
                                          <input type="submit" value="My Profile" name="my">
					</form>
				  </div>
				  <div class="form">
					<h2>Reset Password</h2>
					<form action="#" method="post">
                                            <input type="email" name="Email" value="<?php echo $gmail ?>" readonly="true">
					  <input type="password" name="Password" placeholder="Old Password" required=" ">
					  <input type="password" name="NPassword" placeholder="New Password" required=" ">
                                          <input type="password" name="RPassword" placeholder="Retype Password" required=" ">
					  
                                          <input type="submit" value="Reset Password" name="resetp">
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
