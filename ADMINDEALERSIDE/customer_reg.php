<?php
session_start();
include_once './includes/config.php';
        //$sub="Registration Successfully Completed";
        
    
if(isset($_POST['btn-insert']))
{
	$uname=$_POST['customername'];
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $area=$_POST['area'];
    $pincode=$_POST['pincode'];
    $pass=$_POST['password'];
    $gender=$_POST['gen'];
    $dob=$_POST['dob'];
    //$category=$_POST['category'];
    $cpassword=$_POST['cpassword'];

    // print_r($_REQUEST);
	
        $_SESSION['EMAIL']=$email;
        //$category=$_POST['category'];
        $status='A';
        $otp1=rand(11111,99999);
        
	//$ch="dealer";
        $result=  mysqli_query($con,"SELECT * FROM tbl_dealer_reg WHERE dealer_email='$email'");
        if(mysqli_num_rows($result) >= '1')
        {
            echo "<script>alert('User Already exists as Dealer')</script>";
        }
        else
        {
            $check1=mysqli_query($con,"SELECT * FROM tbl_customer_reg WHERE customer_email='$email'");
            if(mysqli_num_rows($check1) >= '1')
            {
                echo "<script>alert('User Already exists')</script>";
            }
            else
            {
                if($pass==$cpassword){
                $sql=mysqli_query($con,"INSERT INTO `tbl_customer_reg`(`customer_name`, `customer_contactno`, `customer_email`, `customer_address`, `customer_area`, `customer_pincode`, `customer_gender`, `customer_dob`, `customer_password`, `customer_status`) VALUES ('$uname','$contactno','$email','$address','$area','$pincode','$gender','$dob','$pass','$status')");
                // if($sql){
                //     $html="Your otp verification code is ".$otp1;
                //     $headers = "From: groceryshoopingsurat@gmail.com";
                //     $_SESSION['EMAIL']=$email;
                //     mail($email2,"OTP Verification",$html,$headers);
                //     header("location: Check_otp_enter.php?email=".$_POST['txtemail']."");
                // }
                // else{
                //     echo "<script>alert('Invalid')</script>";
                // }
                }
                else{
                    echo "<script>alert('Password not match')</script>";
                }

                if($sql){
                    echo "<script>alert('inserted')</script>";

                }
                else{
                    echo "not intersted";
                }
            }
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
                                <img src="./images/icon/logo.jpg" style="height: 80px;" alt="CoolAdmin">
                                
                            </a>
                            <p>Customer Registration</p>
                        </div>
                        <div class="login-form">
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input class="au-input au-input--full" type="text"  style="height: 50px;" name="customername" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input class="au-input au-input--full" type="tel"  style="height: 50px;" name="contactno" placeholder="Enter Contact Number">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" style="height: 50px;" id="email" name="email" placeholder="Enter Your Email Address ">
                                </div>
                                <?php if (isset($email_error)): ?>
                                <span><?php echo $email_error; ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text"  style="height: 50px;" name="address" placeholder="Enter your Address">
                                </div>
                                <div class="form-group">
                                    <label>Area</label>
                                    <input class="au-input au-input--full" type="text" style="height: 50px;" id="area" name="area" placeholder="Enter Your Area ">
                                </div>
                                <div class="form-group">
                                    <label>Pincode Number</label>
                                    <input class="au-input au-input--full" type="number"  style="height: 50px;" name="pincode" placeholder="Enter pincode">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="radio"  value="Male" name="gen" class="mt-0 ">
                                                        <label for="inline-radio1" class="form-check-label ">
                                                            Male
                                                        </label>
                                                        <input type="radio"  value="Female" name="gen" class="ml-5">
                                                        <label for="inline-radio2" class="form-check-label ">
                                                            Female 
                                                        </label>
                                                        
                                    
                                </div>
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input class="au-input au-input--full" type="date" style="height: 50px;" name="dob" placeholder="Enter Date Of Birth">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" style="height: 50px;" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" style="height: 50px;" name="cpassword" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                        <div class="form-group">
                            <input type="submit" id="btnsendotp" value="Register" class="btn btn-primary btn-block" name="btn-insert" style="height: 50px;" >
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
    <script>
function send_otp(){
	var email=$('#txtemail').val();
  if(email=='')
  {
    $('#email_error').html('Please enter email');
  }
  else if(IsEmail(email)==false)
  {
    $('#email_error').html('Please enter valid email');
    return false;
  }
  else
  {
		$.ajax({
		url:'send_otp.php',
		type:'post',
		data:'email='+email,
                beforeSend:function(){  
                $('#btnsendotp').val('Sending');
                $('#btnsendotp').attr('disabled',true);
                $('#email_error').html(''); 
                $('#txtemail').attr('readonly',true); 
                },
                success:function(result){
                    if(result=='yes'){
                        $('.second_box').show();
                        $('#btnsendotp').hide();
                    }
                }
        });
    }
}

  function IsEmail(email)
  {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
    return false;
    }else{
        
        return true;
      }
  }

function submit_otp(){
	var otp=$('#txtotp').val();
		$.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
                        alert("Email Successfully Verified");
                        $('.second_box').hide();
                        $('#id-insert').show();
        
			}
			if(result=='not_exist'){
				$('#otp_error').html('Please enter valid otp');
			}
		}
	});
}
</script>
    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->