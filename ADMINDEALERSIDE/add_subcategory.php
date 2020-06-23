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
        $s='';
            $category=$_POST['category'];
            $CATID=  mysqli_query($con,"select CATEGORY_ID from category where CATEGORY_NAME='$category'");
            while($row=mysqli_fetch_array($CATID))
            {
                $c=$row['CATEGORY_ID'];
            }
            
            $subcat=$_POST['subcategory'];
            $status=$_POST['status'];
            $DEALER_ID=$_SESSION['id'];
            if($status=='Active')
                $s='A';
            else
                $s='D';
            if($subcat!="" or $status!=""){
            $sql=mysqli_query($con,"insert into subcategory(CATEGORY_ID,SUBCATEGORY_NAME,DEALER_ID,SUBCATEGORY_STATUS) values('$c','$subcat','$DEALER_ID','$s')");
            $_SESSION['msg']="SubCategory Created !!";
            }
            else{
                $_SESSION['msg']="Fill all Details !!";
            }

    }
   /* if(isset($_GET['del']))
    {
        mysqli_query($con,"delete from subcategory where id = '".$_GET['id']."'");
        $_SESSION['delmsg']="SubCategory deleted !!";
        header("location: subcategory.php");
    }
*/
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
                                        <strong>Add Subcategory</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <?php if(isset($_POST['submit']))
                                        {?>
                                            <div class="alert alert-success">
                                		<button type="button" class="close" data-dismiss="alert">×</button>
						<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                            </div>
                                        <?php } ?>
        				<?php if(isset($_GET['del']))
                                        {?>
                                            <div class="alert alert-error">
                                        	<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                            </div>
                                        <?php } ?>
                                        <form method="post"  class="form-horizontal">
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php $u=$_SESSION['alogin']; $query=mysqli_query($con,"select * from tbl_dealer where DEALER_EMAIL='$u'");
                                                    while($row=mysqli_fetch_array($query))
                                                    {?>
                                                        <input type="text" value="<?php echo htmlentities($row['DEALER_CATEGORY']);?>" name="category" class="form-control" readonly="true">
                                                    <?php } ?>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Subcategory Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="subcategory"  class="form-control">
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                    <select name="status" class="form-control"  required>
                                                    <option value="">Select status</option> 
                                                    <option>Active</option>
                                                    <option>Deactive</option>
                                                    </select>
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