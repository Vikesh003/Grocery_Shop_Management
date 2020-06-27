
<?php
session_start();
// error_reporting(0);
include("./includes/config.php");
ob_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <title>Grocery Shop</title>
    <link rel = "icon" href="./images/icon/logo.jpg" type = "image/x-icon" style="height: 40px;"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
   
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/loginlogo.png" style="height: 80px;" alt="CoolAdmin">
                                
                            </a>
                            <h4>GROCERY SHOP</h4>
                        </div>
                        <div class="login-form">
                            <?PHP //4IF($_SESSION['errmsg']!=""){ echo "<h6 style='color:red'>".$_SESSION['errmsg']."</h6>"; } ?>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" style="height: 50px;" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" style="height: 50px;" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgot Password?</a>
                                    </label>
                                </div>
                                <input  class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">
                            </form>
                            <div class="register-link">
                                <p>
                                    Not Registered<br>
                                    <a href="customer_reg.php">Customer Registration</a><br>
                                    <a href="dealer_reg.php">Dealer Registration</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->


<?php

if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
    // print_r($_REQUEST);

    $q = "SELECT * FROM `tbl_login` WHERE `login_email`='$username' AND `login_password`='$password'";
    //echo "<script>alert('$username')</script>";
    $ret=mysqli_query($con,$q);
    // print_r($_REQUEST);
    $num=mysqli_fetch_assoc($ret);
    print_r($num);
    $row=mysqli_num_rows($ret);
         
        if($row>0)
        {
            $status=$num['login_status'];
            $_SESSION['id']=$num;
            if($status=='AD')
            {
                echo "<script>alert('this')</script>";    
                header('location: index1.php');
            }
            elseif($status=='D')
            {
                header('location:');
            }
        
        }
         
        // else
        // {
        //     $ret=mysqli_query($con,"SELECT * FROM TBL_DEALER WHERE DEALER_EMAIL='$username' and DEALER_PASSWORD='$password' or DEALER_PASSWORD='$password1' and DEALER_STATUS='A'");
        //     $num=mysqli_fetch_array($ret);
        // if($num>0)
        // {
        //     if(!empty($_POST["remember"])) {
        //         setcookie ("username",$_POST["username"],time()+ 3600);
        //         setcookie ("password",$_POST["password"],time()+ 3600);
        //     }
            
        //     $extra="index.php";//
        //     $_SESSION['alogin']=$_POST['username'];
        //     $_SESSION['name']=$num['DEALER_NAME'];
        //     $_SESSION['id']=$num['DEALER_ID'];
        //     $_SESSION['category']=$num['DEALER_CATEGORY'];
        //     $host=$_SERVER['HTTP_HOST'];
        //     $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        //     header("location:http://$host$uri/$extra");
            
        // }
        // else{
        //     $_SESSION['errmsg']="Invalid username or password/Deactive User";
        //     $extra="login.php";
        //     $host  = $_SERVER['HTTP_HOST'];
        //     $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        //     header("location:http://$host$uri/$extra");
        //     exit();
        // }}
}

?>