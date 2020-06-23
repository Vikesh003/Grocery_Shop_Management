
<?php
session_start();
include('./includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$volume=$_POST['volume'];
        $unit=$_POST['unit'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$quantity=$_POST['productquantity'];
$sql=mysqli_query($con,"update dealer_products set CATEGORY_ID='$category',SUBCATEGORY_ID='$subcat',PRODUCT_NAME='$productname',PRODUCT_COMPANY='$productcompany',PRODUCT_PRICE='$productprice',PRODUCT_DESCRIPTION='$productdescription',PRODUCT_SHIPPINGCHARGE='$productscharge',PRODUCT_AVAILABILITY='$productavailability',PRODUCT_VOLUME='$volume',PRODUCT_UNIT='$unit',PRODUCT_QUANTITY='$quantity' where PRODUCT_ID='$pid' ");
$_SESSION['msg']="Product Updated Successfully !!";
header("location: show_dealer_product.php");

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
        <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
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
                                        <strong>Update Subcategory</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <?php if(isset($_POST['submit']))
                                        {?>
                                            <div class="alert alert-success">
                                		<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                            </div>
                                        <?php } ?>
        				<?php if(isset($_GET['del']))
                                        {?>
                                            <div class="alert alert-error">
                                        	<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                            </div>
                                        <?php } ?>
                                        <form method="post" action="#" enctype="multipart/form-data" class="form-horizontal" name="insertproduct">
                                        <?php 
                                            $query=mysqli_query($con,"select dealer_products.*,category.CATEGORY_NAME as catname,category.CATEGORY_ID as cid,subcategory.SUBCATEGORY_NAME as subcatname,subcategory.SUBCATEGORY_ID as subcatid from dealer_products join category on category.CATEGORY_ID=dealer_products.CATEGORY_ID join subcategory on subcategory.SUBCATEGORY_ID=dealer_products.SUBCATEGORY_ID where dealer_products.PRODUCT_ID='$pid'");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($query))
                                            {
                                                
                                        ?>
                                        <div class="row form-group">
                                            
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                    <select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
                                                    <option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option> 
                                                        <?php $query=mysqli_query($con,"select * from category");
                                                        while($rw=mysqli_fetch_array($query))
                                                        {
                                                                if($row['catname']==$rw['CATEGORY_NAME'])
                                                                {
                                                                        continue;
                                                                }
                                                                else{
                                                                ?>

                                                        <option value="<?php echo $rw['id'];?>"><?php echo $rw['CATEGORY_NAME'];?></option>
                                                        <?php }} ?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Subcategory Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select   name="subcategory"  id="subcategory" class="form-control" required>
                                                    <option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcatname']);?></option>
                                                    <?php $query=mysqli_query($con,"select * from subcategory");
                                                        while($rw=mysqli_fetch_array($query))
                                                        {
                                                                if($row['subcatname']==$rw['SUBCATEGORY_NAME'])
                                                                {
                                                                        continue;
                                                                }
                                                                else{
                                                                ?>

                                                        <option value="<?php echo $rw['id'];?>"><?php echo $rw['SUBCATEGORY_NAME'];?></option>
                                                        <?php }} ?>
                                                    </select>
                                                    
                                                </div>
                                        </div>
                                            
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productName" value="<?php echo htmlentities($row['PRODUCT_NAME']);?>"  class="form-control" required>
                                                </div>
                                        </div><div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product company</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productCompany"  class="form-control" value="<?php echo htmlentities($row['PRODUCT_COMPANY']);?>" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Volume</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="volume"  class="form-control" value="<?php echo htmlentities($row['PRODUCT_VOLUME']);?>" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Unit</label>
                                                </div>
                                                <div class="col-12 col-md-9">   
                                                    <select name="unit"  id="unit" class="form-control" required>
                                                    <option  value="<?php echo htmlentities($row['PRODUCT_UNIT']);?>"><?php echo htmlentities($row['PRODUCT_UNIT']);?></option>
                                                    <option value="kg">Kg</option>
                                                    <option value="gram">gram</option>
                                                    <option value="liter">Liter</option>
                                                    <option value="ml">ml</option>
                                                    <option value="pcs">pcs</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productprice"  class="form-control" value="<?php echo htmlentities($row['PRODUCT_PRICE']);?>" required>
                                                </div>
                                        </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Quantity</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productquantity"  class="form-control" value="<?php echo htmlentities($row['PRODUCT_QUANTITY']);?>" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="productDescription" id="text-input" rows="3" class="form-control" required>
                                                   <?php echo nl2br(htmlentities($row['PRODUCT_DESCRIPTION']));?> </textarea>  
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Shipping Charge</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productShippingcharge"   class="form-control" value="<?php echo htmlentities($row['PRODUCT_SHIPPINGCHARGE']);?>" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Availability</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select   name="productAvailability"  id="productAvailability" class="form-control" value="<?php echo htmlentities($row['PRODUCT_AVAILABILITY']);?>"><?php echo htmlentities($row['productAvailability']);?> required>
                                                    
                                                    <option value="In Stock">In Stock</option>
                                                    <option value="Out of Stock">Out of Stock</option>
                                                    </select>
                                                </div>
                                        </div>
                                            <?php $pid=intval($_GET['id']); ?>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Image1</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['PRODUCT_IMAGE1']);?>" width="200" height="100"> <a href="update-image1.php?id=<?php echo $row['PRODUCT_ID'];?>">Change Image</a>

                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Image2</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['PRODUCT_IMAGE2']);?>" width="200" height="100"> <a href="update-image2.php?id=<?php echo $row['PRODUCT_ID'];?>">Change Image</a>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Image3</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['PRODUCT_IMAGE3']);?>" width="200" height="100"> <a href="update-image3.php?id=<?php echo $row['PRODUCT_ID'];?>">Change Image</a>

                                                </div>
                                        </div><?php } ?>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                            <button type="reset" class="btn btn-danger btn-sm" name="reset">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                        </div>
                                        </form>
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
