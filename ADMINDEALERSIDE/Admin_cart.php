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
                        
                        $quantity=  mysqli_query($con,"select * from dealer_products where PRODUCT_ID= '".$_GET['id']."'");
                        $quantityR=  mysqli_fetch_array($quantity);
                        $quantityF=$quantityR['PRODUCT_QUANTITY'];
                        
                        $quantityA=  mysqli_query($con,"select * from add_to_cart_admin where PRODUCT_ID= '".$_GET['id']."'");
                        $quantityRA=  mysqli_fetch_array($quantityA);
                        $quantityFA=$quantityRA['PRODUCT_QUANTITY'];
                        
                        $newQuantity=$quantityFA+$quantityF;
		          mysqli_query($con,"delete from add_to_cart_admin where PRODUCT_ID = '".$_GET['id']."'");
                          mysqli_query($con,"update dealer_products set PRODUCT_QUANTITY='$newQuantity' where PRODUCT_ID= '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }
if(isset($_POST['submit']))
    {
            $quantity=$_POST['quantity'];
            
            $id=intval($_GET['id']);
            $sql=mysqli_query($con,"update add_to_cart_admin set PRODUCT_QUANTITY='$quantity' ");
            
            header("location: Admin_cart.php");
    }
    if(isset($_POST['payment']))
    {
         header("location: payment_process.php");
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
                                        <strong>Add to cart</strong>
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
                                                
                                                <th>Comapany Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Subtotal Price</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $query=mysqli_query($con,"select add_to_cart_admin.*,category.CATEGORY_NAME,subcategory.SUBCATEGORY_NAME from add_to_cart_admin join category on category.CATEGORY_ID=add_to_cart_admin.CATEGORY_ID join subcategory on subcategory.SUBCATEGORY_ID=add_to_cart_admin.SUBCATEGORY_ID");
                                                $cnt=1;
                                                $producttotalpricetotal=0;
                                                $cartTotal=0;
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
						
        					<td> <?php echo htmlentities($row['SUBCATEGORY_NAME']);?></td>
        					<td><?php echo htmlentities($row['PRODUCT_COMPANY']);?></td>
                                                
                                                <td>
                                                    
                                                   <?php echo htmlentities($row['PRODUCT_QUANTITY']);?> 
                                                        
                                                </td>
                                     		<?php $producttotalprice = $row["PRODUCT_PRICE"]; ?>
                                     		<td><?php echo htmlentities($row['PRODUCT_PRICE']);?></td>
                                     		<?php 
                                                $producttotalpricetotal = $producttotalprice * $row['PRODUCT_QUANTITY'];
                                                $cartTotal = $producttotalpricetotal + $cartTotal;
                                                ?>
                                                <td><?php echo "$producttotalpricetotal" ?></td>
                                                
						<td>					
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="Admin_cart.php?id=<?php echo $row['PRODUCT_ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                            <i class="zmdi zmdi-delete"></i></a>
                                                    </button></div>
                                                </td>
                                            </tr>
                                            
                                            <?php $cnt=$cnt+1; } ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                
                                                
                                                <td>Total: </td>
                                                <td><?php
                                                $_SESSION['cartTotal']=$cartTotal;
                                                echo "$cartTotal"; ?></td>
                                            </tr>
                                            <tr><td></td>
                                                <td></td><td><form action="" method="post">
                                                     <input type="submit" value="Proceed to Pay" name="payment">
                                                </form></td></tr>
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>
                                
                        </div>
                            
                    </div>
                </div>
                    
        </div>
        <?php include_once './includes/footer.php'; ?>
    </body>
</html>
<?php } ?>