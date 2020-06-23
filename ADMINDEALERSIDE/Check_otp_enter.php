<?php
session_start();
include_once './includes/config.php';

if(isset($_POST['btn-insert']))
{
	$email=$_GET["email"];
        $status='A';
	$otp=$_POST["otp"];
        //$otp1=  intval($_GET['otp']);
        $otp1=$_SESSION["otp"];
        echo "<h1>$otp1</h1>";
            if($otp==$otp1)
            {
                $sql=mysqli_query($con,"UPDATE tbl_dealer SET DEALER_STATUS='A' WHERE DEALER_EMAIL='$email'");
                if($sql){
                    $html="";
                    $headers = "From: groceryshoopingsurat@gmail.com";
                    $_SESSION['EMAIL']=$email;
                    mail($email2,"Registration Successfully",$html,$headers);
                    header('location: login.php');
                }
            }
            else{
                echo "<script>alert('Invalid')</script>";
            }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './includes/links.php'; ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge25">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/mymarket.png" style="height: 80px;" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="POST">
                               
                                
                                <div class="form-group">
                                    <label>Enter OTP</label>
                                    <input class="au-input au-input--full" type="text" style="height: 50px;" name="otp" placeholder="Enter OTP">
                                </div>
                                
                        <div class="form-group">
                            <input type="submit" id="btnsendotp" value="Submit Otp" class="btn btn-primary btn-block" name="btn-insert" style="height: 50px;" >
                        </div>
                     </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include_once './includes/footerLinks.php'; ?>
    
</body>

</html>
<!-- end document-->