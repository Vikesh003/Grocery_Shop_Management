<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
   if(isset($_POST['update']))
{
    $password=  md5($_POST['Password']);
    $npassword=  md5($_POST['NPassword']);
    $rpassword=  md5($_POST['RPassword']);
    $id=  intval($_SESSION['id']);
    $pass=  mysqli_query($con,"select * from tbl_admin where ADMIN_ID='$id'");
    $c=  mysqli_fetch_array($pass);
    $pa=$c['ADMIN_PASSWORD'];
    if($pa==$password){
        if($npassword==$rpassword){
                $query=mysqli_query($con,"update tbl_admin set ADMIN_PASSWORD='$npassword' WHERE ADMIN_ID='$id'");
                if($query){
                    $msg="Password Updated..!";
                    //echo "<script>alert('Password Updated..!');</script>";
                }
            }
            else{
                $msg="Not match Password..!";
                //echo "<script>alert('Not match Password..!');</script>";
            }
    }
    else {
        $msg="Old Password not match..!";
        //echo "<script>alert('Old Password not match..!');</script>";
    }
}

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
                                        <strong>Reset Password</strong>
                                    </div>
                                    <?php if (!empty($msg)): ?>
                                    <div class="alert <?php echo $msg_class ?>" style="color:red" role="alert">
                                        <b><?php echo $msg; ?></b>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body card-block">
                                        <form method="post"  class="form-horizontal" enctype="multipart/form-data">
                                            <?php
                                            $query = mysqli_query($con, "select * from tbl_admin where ADMIN_EMAIL='" . $_SESSION['alogin'] . "'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Email Id</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" class="form-control" readonly="true" value="<?php echo htmlentities($row['ADMIN_EMAIL']); ?>" id="exampleInputEmail1" name="gmail" required="">

                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Old Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" class="form-control"  id="Password" name="Password" required="">
                                                    </div>
                                                </div> 
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">New Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" class="form-control"  id="NPassword" name="NPassword" required="">
                                                    </div>
                                                </div> 
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Retype Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" class="form-control"  id="RPassword" name="RPassword" required="">
                                                    </div>
                                                </div> 
                                                    <?php } ?>
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