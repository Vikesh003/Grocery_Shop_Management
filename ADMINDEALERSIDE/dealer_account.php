<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
    $msg = "";
    $msg_class = "";
    if (isset($_POST['update'])) {
        
            $pid=$_SESSION['id'];
            $dir_name =$pid;
            $profileImageName=$_FILES["profileImageName"]["name"];
           if (!is_dir($dir_name)) {
            //Create our directory if it does not exist
            mkdir("profileimagesDEALER/" .$dir_name);
            
            }

            
           move_uploaded_file($_FILES["profileImageName"]["tmp_name"],"profileimagesDEALER/$pid/".$_FILES["profileImageName"]["name"]);

                $name = $_POST['name'];
                $gmail = $_POST['gmail'];
                $password = $_POST['password'];
                $query = mysqli_query($con, "update tbl_dealer set DEALER_NAME='$name',DEALER_EMAIL='$gmail',DEALER_PROFILE='$profileImageName' where DEALER_EMAIL='" . $_SESSION['alogin'] . "'");
                if ($query) {
                    //echo "<script>alert($profileImageName);</script>";
                    header('location:index.php');
                }
                else{
                     echo "<script>alert('Error');</script>";
                }
            
        
    }


    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
    ?>

    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <?php include_once './includes/links.php';?>
            <link rel="stylesheet" href="main.css">
            <script type="text/javascript">
                function valid()
                {
                    if (document.chngpwd.cpass.value == "")
                    {
                        alert("Current Password Filed is Empty !!");
                        document.chngpwd.cpass.focus();
                        return false;
                    }
                    else if (document.chngpwd.newpass.value == "")
                    {
                        alert("New Password Filed is Empty !!");
                        document.chngpwd.newpass.focus();
                        return false;
                    }
                    else if (document.chngpwd.cnfpass.value == "")
                    {
                        alert("Confirm Password Filed is Empty !!");
                        document.chngpwd.cnfpass.focus();
                        return false;
                    }
                    else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value)
                    {
                        alert("Password and Confirm Password Field do not match  !!");
                        document.chngpwd.cnfpass.focus();
                        return false;
                    }
                    return true;
                }
            </script>
        </head>
        <body><?php
            // put your code here
            include_once './includes/header.php';
            include_once './includes/sidebar.php';
            ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Update Profile</strong>
                                    </div>
                                    <?php if (!empty($msg)): ?>
                                        <div class="alert <?php echo $msg_class ?>" role="alert">
                                            <?php echo $msg; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body card-block">
                                        <form method="post"  class="form-horizontal" enctype="multipart/form-data">
                                            <?php
                                            $query = mysqli_query($con, "select * from tbl_dealer where DEALER_EMAIL='" . $_SESSION['alogin'] . "'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                <div class="row form-group">

                                                    <div class="col-12 col-md-3">
                                                        <img src="profileimagesDEALER/<?php echo htmlentities($row['DEALER_ID']);?>/<?php echo htmlentities($row['DEALER_PROFILE']);?>" width="200" height="100">
                                                        <input type="file" name="profileImageName" id="profileImageName" value="<?php echo htmlentities($row['DEALER_PROFILE']);?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">

                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;"></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Email Id</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($row['DEALER_EMAIL']); ?>" id="exampleInputEmail1" name="gmail" required="">

                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label">Username</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($row['DEALER_NAME']); ?>" id="name" name="name" required="">
                                                    </div>
                                                </div> <?php } ?>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="update">
                                                    <i class="fa fa-dot-circle-o"></i> Update
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div></form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div><!--/.container-->
                </div><!--/.wrapper-->
            </div>
        </div>
        <?php include_once './includes/footerLinks.php'; ?>
        <script src="scripts.js"></script>
    </body>
    </html>
<?php } ?>