<?php
    session_start();
    include('./includes/config.php');
    if(strlen($_SESSION['alogin'])==0)
    {           
        header('location:index.php');
    }
    else{
        date_default_timezone_set('Asia/Kolkata');// change according timezone
        $currentTime = date( 'd-m-Y h:i:s A', time () );
    if(isset($_POST['submit']))
    {
            $category=$_POST['category'];
            $description=$_POST['description'];
            $id=intval($_GET['id']);
            $sql=mysqli_query($con,"update category set CATEGORY_NAME='$category',CATEGORY_DESCRIPTION='$description',UPDATION_DATE='$currentTime' where CATEGORY_ID='$id'");
            $_SESSION['msg']="Category Updated !!";
            header("location: show_category.php");
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
        <meta charset="UTF-8">
        <title></title>
        <!-- Required meta tags-->
    <?php include_once './includes/links.php'; ?>
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
                                        <strong>Update Category</strong>
                                    </div>
                                    <?php if(isset($_POST['submit']))
                                    {?><div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Well done!</strong><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                    </div><?php } ?>
                                    <div class="card-body card-block">
                                        <form method="post"  class="form-horizontal">
                                            <?php
                                                $id=intval($_GET['id']);
                                                $query=mysqli_query($con,"select * from category where CATEGORY_ID='$id'");
                                                while($row=mysqli_fetch_array($query))
                                                {
                                            ?>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="category" value="<?php echo  htmlentities($row['CATEGORY_NAME']);?>"  class="form-control">
                                                    
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Category Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="description" id="" rows="3"  class="form-control"><?php echo  htmlentities($row['CATEGORY_DESCRIPTION']);?></textarea>
                                                </div>
                                        </div><?php } ?>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                            <button type="reset" class="btn btn-danger btn-sm" name="reset">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                        </div></form>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    <?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>
<?php } ?>