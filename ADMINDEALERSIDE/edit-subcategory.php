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
        $s='';
            $category=$_POST['category'];
            $subcat=$_POST['subcategory'];
            $status=$_POST['status'];
            if($status=='Active')
                $s='A';
            else
                $s='D';
            $id=intval($_GET['id']);
    $sql=mysqli_query($con,"update subcategory set CATEGORY_ID='$category',SUBCATEGORY_NAME='$subcat',SUBCATEGORY_STATUS='$s',UPDATION_DATE='$currentTime' where SUBCATEGORY_ID='$id'");
    $_SESSION['msg']="Sub-Category Updated !!";
    header("Location: show_subcategory.php");
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
                                        <strong>Update SubCategory</strong>
                                    </div>
                                    <?php if(isset($_POST['submit']))
                                    {?>
					<div class="alert alert-success">
                        		<button type="button" class="close" data-dismiss="alert">×</button>
                			<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
					</div>
                                  <?php } ?>
                                    
                                    <div class="card-body card-block">
                                        <form method="post"  class="form-horizontal">
                                            <?php
                                            $id=intval($_GET['id']);
                                            $query=mysqli_query($con,"select category.CATEGORY_ID,category.CATEGORY_NAME,subcategory.SUBCATEGORY_NAME,subcategory.SUBCATEGORY_STATUS from subcategory join category on category.CATEGORY_ID=subcategory.CATEGORY_ID where subcategory.SUBCATEGORY_ID='$id'");
                                            while($row=mysqli_fetch_array($query))
                                            {
                                            ?>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" class="form-control" required>
                                                    <option value="<?php echo htmlentities($row['CATEGORY_ID']);?>"><?php echo htmlentities($catname=$row['CATEGORY_NAME']);?></option>
                                                    <?php $ret=mysqli_query($con,"select * from category");
                                                    while($result=mysqli_fetch_array($ret))
                                                    {
                                                    echo $cat=$result['CATEGORY_NAME'];
                                                    if($catname==$cat)
                                                    {
                                                            continue;
                                                    }
                                                    else{
                                                    ?>
                                                    <option value="<?php echo $result['CATEGORY_ID'];?>" disabled="disabled"><?php echo $result['CATEGORY_NAME']; ?></option>
                                                    <?php } }?>
                                                    </select>
                                                    
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">SubCategory</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" placeholder="Enter Subcategory Name"  name="subcategory" value="<?php echo  htmlentities($row['SUBCATEGORY_NAME']);?>" class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                    <select name="status" class="form-control"  required>
                                                        <option value="<?php echo htmlentities($row['SUBCATEGORY_STATUS']);?>"><?php if(htmlentities($row['SUBCATEGORY_STATUS'])=='A'){echo "Active";}else{echo "Deactive";};?></option> 
                                                        <?php if(htmlentities($row['SUBCATEGORY_STATUS'])=="A"){ echo "<option>Deactive</option>"; }else{ echo "<option>Active</option>"; } ?>
                                                    </select>
                                                </div>
                                        </div>   
                                            <?php } ?>
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