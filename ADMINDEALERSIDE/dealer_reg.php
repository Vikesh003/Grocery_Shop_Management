<?php
session_start();
include_once './includes/config.php';
        //$sub="Registration Successfully Completed";
        
    
if(isset($_POST['btn-insert']))
{
	$uname=$_POST['Username'];
        $pass=$_POST['Password'];
        $reset=$_POST['reset'];
	$email2=$_POST['txtemail'];
        $_SESSION['EMAIL']=$email2;
        $category=$_POST['category'];
        $status='D';
        $otp1=rand(11111,99999);
        $_SESSION["otp"]=$otp1;
	//$ch="dealer";
        $result=  mysqli_query($con,"SELECT * FROM tbl_dealer WHERE DEALER_EMAIL='$email2'");
        if(mysqli_num_rows($result) >= '1')
        {
            echo "<script>alert('Already exists')</script>";
        }
        else{
            if($pass==$reset){
            $sql=mysqli_query($con,"insert into tbl_dealer(DEALER_NAME,DEALER_EMAIL,DEALER_PASSWORD,DEALER_CATEGORY,DEALER_OTP) VALUES('$uname','$email2','$pass','$category','$otp1')");
            if($sql){
                $html="Your otp verification code is ".$otp1;
                $headers = "From: groceryshoopingsurat@gmail.com";
                $_SESSION['EMAIL']=$email;
                mail($email2,"OTP Verification",$html,$headers);
                header("location: Check_otp_enter.php?email=".$_POST['txtemail']."");
            }
            else{
                echo "<script>alert('Invalid')</script>";
            }}
            else{
                echo "<script>alert('Password not match')</script>";
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
                                <img src="images/icon/mymarket.png" style="height: 80px;" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Dealer Name</label>
                                    <input class="au-input au-input--full" type="text"  style="height: 50px;" name="Username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" style="height: 50px;" id="txtemail" name="txtemail" placeholder="Email">
                                </div>
                                <?php if (isset($email_error)): ?>
                                <span><?php echo $email_error; ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" style="height: 50px;" name="Password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" style="height: 50px;" name="reset" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                </div>
                                <div class="form-group">
                                    <select name="category" class="form-control" required>
                                    <option value="">Select Category</option> 
                                    <?php $query=mysqli_query($con,"select * from category");
                                    while($row=mysqli_fetch_array($query))
                                    {?>
                                        <option value="<?php echo $row['CATEGORY_NAME'];?>"><?php echo $row['CATEGORY_NAME'];?></option>
                                    <?php } ?>
                                    </select>
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