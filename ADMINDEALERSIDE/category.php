<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );


    if(isset($_POST['submit']))
    {
        
            $category=$_POST['category'];
            $description=$_POST['description'];
            if($category!="" or $description!=""){
                $sql=mysqli_query($con,"insert into category(CATEGORY_NAME,CATEGORY_DESCRIPTION) values('$category','$description')");
                $_SESSION['msg']="Category Created !!";
            }
            else{
                $_SESSION['msg']="Fill All Details";
            }

    }
    /*if(isset($_GET['del']))
    {
            mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Category deleted !!";
            header('location:category.php');
    } */

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
                                        <strong>Add Category</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <?php if(isset($_POST['submit']))
                                        {?>
                                            <div class="alert alert-success">
                                		<button type="button" class="close" data-dismiss="alert">×</button>
                                                
							<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                            </div>
                                        <?php } ?>
                                       
                                        <form method="post"  class="form-horizontal">
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input"  name="category"  class="form-control">
                                                    
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Category Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="description" id="" rows="3"  class="form-control"></textarea>
                                                </div>
                                        </div>
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
                        
		</div><!--/.container-->
	</div><!--/.wrapper-->
                    </div>
		</div>
    <?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>
<?php } ?>