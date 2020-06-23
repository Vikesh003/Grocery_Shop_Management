<?php
session_start();

include('./includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
    if(!empty($_POST['category']) and !empty($_POST['subcategory']) and !empty($_POST['productName']) and !empty($_POST['productCompany']) and !empty($_POST['productprice']) and !empty($_POST['volume']) and !empty($_POST['unit'])){
	
        $category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
        $volume=$_POST['volume'];
        $unit=$_POST['unit'];
       $quantity=$_POST['productquantity'];
        
	//$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
        
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
        
        $DEALER_ID=$_SESSION['id'];
        //for getting product id
        
        $query=mysqli_query($con,"select max(PRODUCT_ID) as PRODUCT_ID from dealer_products");
	$result=mysqli_fetch_array($query);
        
	$productid=$result['PRODUCT_ID']+1;
	$dir="productimages/$productid";
        
        if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}
            
	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/$productimage1");
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/$productimage2");
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/$productimage3");
        $sql=mysqli_query($con,"insert into dealer_products(CATEGORY_ID,DEALER_ID,SUBCATEGORY_ID,PRODUCT_NAME,PRODUCT_COMPANY,PRODUCT_VOLUME,PRODUCT_UNIT,PRODUCT_PRICE,PRODUCT_DESCRIPTION,PRODUCT_SHIPPINGCHARGE,PRODUCT_AVAILABILITY,PRODUCT_IMAGE1,PRODUCT_IMAGE2,PRODUCT_IMAGE3,PRODUCT_QUANTITY) values('$category','$DEALER_ID','$subcat','$productname','$productcompany','$volume','$unit','$productprice','$productdescription','$productscharge','$productavailability','$productimage1','$productimage2','$productimage3','$quantity')");
        if($sql){
           $_SESSION['msg']="Product Inserted Successfully !!";
        }
        else{
            echo "eRROR";
        }
        }   
    else
    {
        echo "<script>alert('Please fill all details.')</script>";
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
                                        <strong>Add Subcategory</strong>
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
                                        <form method="post" action="#" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                    <select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
                                                    <option value="">Select Category</option> 
                                                    <?php $q= $_SESSION['alogin'];  $query=mysqli_query($con,"select category.CATEGORY_ID,category.CATEGORY_NAME,tbl_dealer.DEALER_CATEGORY from category,tbl_dealer where category.CATEGORY_NAME=tbl_dealer.DEALER_CATEGORY and tbl_dealer.DEALER_EMAIL='$q'");
                                                    
                                                    while($row=mysqli_fetch_array($query))
                                                    {?>
                                                    
                                                    <option value="<?php echo $row['CATEGORY_ID']; ?>"><?php echo $row['CATEGORY_NAME'] ;?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Subcategory Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select   name="subcategory"  id="subcategory" class="form-control" required></select>
                                                </div>
                                        </div>
                                            
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productName"  class="form-control" required>
                                                </div>
                                        </div><div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product company</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productCompany"  class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Volume</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="volume"  class="form-control"required>
                                                </div>
                                        </div>
                                       
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Unit</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select   name="unit"  id="productAvailability" class="form-control" required>
                                                    <option value="">Select</option>
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
                                                    <input type="text" id="text-input" name="productprice"  class="form-control" required>
                                                </div>
                                        </div>
                                         <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Quantity</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productquantity"  class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea  name="productDescription"  placeholder="Enter Product Description" rows="3" class="form-control" required>
                                                    </textarea>  
                                                </div>
                                        </div>
                                           
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Shipping Charge</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productShippingcharge"   class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Availability</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select   name="productAvailability"  id="productAvailability" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="In Stock">In Stock</option>
                                                    <option value="Out of Stock">Out of Stock</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Image1</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="productimage1" id="productimage1" value="" class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Image2</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="productimage2"  class="form-control">
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Image3</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="productimage3" class="form-control" >
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
                    </div>
                </div>
        </div>
        <?php include_once './includes/footerLinks.php'; ?>
    <script src="js/main.js"></script>
    </body>
</html>
<?php } ?>