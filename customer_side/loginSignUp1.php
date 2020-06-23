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
// Code user Registration
if(isset($_POST['register']))
{
$username=$_POST['Username'];
$email=$_POST['Email'];
$contactno=$_POST['Phone'];
$password=md5($_POST['Password']);
$status='A';
$query=mysqli_query($con,"SELECT * FROM customer_reg WHERE CUSTOMER_GMAIL='$email'");
$num=mysqli_fetch_array($query);
if($num['CUSTOMER_GMAIL']==$email){
    echo "<script>alert('Already registered...!');</script>";
}
else {
$query=mysqli_query($con,"insert into customer_reg(CUSTOMER_NAME,CUSTOMER_GMAIL,CUSTOMER_PHONE,CUSTOMER_PASSWORD,CUSTOMER_STATUS) values('$username','$email','$contactno','$password','$status')");
if($query)
{
	echo "<script>alert('You are successfully register');</script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
}
}}
// Code for User login
if(isset($_POST['login']))
{
    $num=0;
     $email=$_POST['Email'];
     $password=md5($_POST['Password']);
     $query=mysqli_query($con,"SELECT * FROM customer_reg WHERE CUSTOMER_GMAIL='$email' and CUSTOMER_PASSWORD='$password'");
     $num=mysqli_fetch_array($query);
        if($num>0)
        {
            $_SESSION['login']=$_POST['Email'];
            $extra="index1.php";
            $_SESSION['id']=$num['CUSTOMER_ID'];
            $_SESSION['username']=$num['CUSTOMER_NAME'];
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=1;
        //$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
            $host=$_SERVER['HTTP_HOST'];
            $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:http://$host$uri/$extra");
            $uname=$_SESSION['login'];
            echo "<script>alert('$uname')</script>";
            exit();
        }
        else
        {
            $extra="LoginSignUp1.php";
            $email=$_POST['email'];
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=0;
            //$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
            $host  = $_SERVER['HTTP_HOST'];
            $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:http://$host$uri/$extra");
            $_SESSION['errmsg']="Invalid email id or Password";
            exit();
        }
}


?>


<!DOCTYPE html>
<html>
<head>
    <?php include_once './include/headeLinks.php'; ?>
    
</head>
	
<body>
    <?php include_once './include/heade1.php';
     ?>
          
    <div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Sign In & Sign Up</li>
			</ul>
		</div>
    </div> 
    <?php  include_once './include/sidebar.php'; ?>
	<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login">
			<h3>Sign In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form action="#" method="post">
					  <input type="text" name="Email" placeholder="Email Address" required=" ">
					  <input type="password" name="Password" placeholder="Password" required=" ">
                                          <input type="submit" value="Login" name="login">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					<form action="#" method="post">
					  <input type="text" name="Username" placeholder="Username" required=" ">
					  <input type="password" name="Password" placeholder="Password" required=" ">
					  <input type="email" name="Email" placeholder="Email Address" required=" ">
					  <input type="text" name="Phone" placeholder="Phone Number" required=" ">
                                          <input type="submit" value="Register" name="register">
					</form>
				  </div>
                                    <div class="cta"><a href="#">Forgot your password?</a></div>
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
