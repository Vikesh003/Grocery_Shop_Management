<?php
session_start();
include_once './includes/config.php';
        //$sub="Registration Successfully Completed";
        
    
if(isset($_POST['btn-insert']))
{
	$uname=$_POST['Username'];
	$email2=$_POST['txtemail'];
        $address=$_POST['address'];
        $cnno=$_POST['cnno'];
        $_SESSION['EMAIL']=$email2;
        $area=$_POST['area'];
        $status='D';
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $password = substr( str_shuffle( $chars ), 0, 8 );
        $password1= md5($password); 
        $otp1=rand(11111,99999);
        $_SESSION["otp"]=$otp1;
	//$ch="dealer";
        $result=  mysqli_query($con,"SELECT * FROM tbl_deliveryboy WHERE demail='$email2'");
        if(mysqli_num_rows($result) >= '1')
        {
            echo "<script>alert('Already exists')</script>";
        }
        else{
           
            $sql=mysqli_query($con,"insert into tbl_deliveryboy(dname,demail,area,status,password) VALUES('$uname','$email2','$area','$status','$password1')");
            if($sql){
               
                $html="Your Password is ".$password1;
                $headers = "From: groceryshoopingsurat@gmail.com";
                $_SESSION['EMAIL']=$email2;
                mail($email2,"Password verification ",$html,$headers);
                echo "<script>alert('Mail Successfully..!')</script>";
                //header("location: Check_otp_enter.php?email=".$_POST['txtemail']."");
            }
            else{
                echo "<script>alert('Invalid')</script>";
            }
            
          }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './includes/links.php'; ?>
    <script type="text/javascript">
			/*code: 48-57 Numbers
			  8  - Backspace,
			  35 - home key, 36 - End key
			  37-40: Arrow keys, 46 - Delete key*/
			function restrictAlphabets(e){
				var x=e.which||e.keycode;
				if((x>=48 && x<=57) || x==8 ||
					(x>=35 && x<=40)|| x==46)
					return true;
				else
					return false;
			}
		</script>
</head>

<body class="animsition">
    <?php include_once './includes/header.php';
    include_once './includes/sidebar.php'; ?>
    <div class="page-wrapper">
        <div class="page-content--bge25">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-form">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Deliveryboy Name</label>
                                    <input class="au-input au-input--full" type="text"  style="height: 50px;" name="Username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Deliveryboy Email Address</label>
                                    <input class="au-input au-input--full" type="email" style="height: 50px;" id="txtemail" name="txtemail" placeholder="Email">
                                </div>
                                <?php if (isset($email_error)): ?>
                                <span><?php echo $email_error; ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <select name="area" class="form-control" required>
                                        <option value="" disabled="true" selected="true">Select Area</option> 
                                    <?php $query=mysqli_query($con,"select * from area");
                                    while($row=mysqli_fetch_array($query))
                                    {?>
                                        <option value="<?php echo $row['area_name'];?>"><?php echo $row['area_name'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deliveryboy Address</label>
                                    <textarea  name="address"  placeholder="Enter Address" rows="3" class="form-control" required>
                                    </textarea>  
                                </div>
                                <div class="form-group">
                                    <label>Deliveryboy contact no</label>
                                    <input class="au-input au-input--full" type="text" onkeypress='return restrictAlphabets(event)' style="height: 50px;" id="txtemail" name="cnno" placeholder="Contact no">
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