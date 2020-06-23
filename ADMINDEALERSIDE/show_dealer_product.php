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
$did=$_SESSION['id'];
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from dealer_products where PRODUCT_ID = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Show Products</strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive table--no-card m-b-30">
                                                <?php if(isset($_GET['del']))
                                                {?>
						<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
						</div>
                                                <?php } ?>
                                                <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Comapany Name</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $query=mysqli_query($con,"select dealer_products.*,category.CATEGORY_NAME,subcategory.SUBCATEGORY_NAME from dealer_products join category on category.CATEGORY_ID=dealer_products.CATEGORY_ID join subcategory on subcategory.SUBCATEGORY_ID=dealer_products.SUBCATEGORY_ID where dealer_products.DEALER_ID=$did");
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
						<td><?php echo htmlentities($row['PRODUCT_NAME']);?></td>
						<td><?php echo htmlentities($row['CATEGORY_NAME']);?></td>
        					<td> <?php echo htmlentities($row['SUBCATEGORY_NAME']);?></td>
        					<td><?php echo htmlentities($row['PRODUCT_COMPANY']);?></td>
                                     		
						
						<td>					
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a href="edit_products.php?id=<?php echo $row['PRODUCT_ID']?>" >
                                                            <i class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="manage-product.php?id=<?php echo $row['PRODUCT_ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                            <i class="zmdi zmdi-delete"></i></a>
                                                    </button></div>
                                                </td>
                                            </tr>
                                            <?php $cnt=$cnt+1; } ?>
                                            </div>
                                        </div>
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