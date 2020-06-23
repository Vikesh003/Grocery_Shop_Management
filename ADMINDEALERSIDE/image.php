<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
    if(isset($_POST['submit'])){
        
        $pid=  intval($_GET['id']);
        $pname=$_POST['pname'];
            $desc=$_POST['productDescription'];
            $quantity=$_POST['productquantity'];
            $quantity1=$_POST['quantity'];
            $volume=$_POST['volume'];
            $price=$_POST['price'];
            $company=$_POST['company'];
            $unit=$_POST['unit'];
            //$quantity=$_POST['quantity'];
            $category=$_POST['category'];
            $CAT=  mysqli_query($con,"SELECT * FROM category WHERE CATEGORY_NAME='$category'");
            $CATR=  mysqli_fetch_array($CAT);
            $CATEGORYf=$CATR['CATEGORY_ID'];
            
            $subcategory=$_POST['subcategory'];
            $SCAT=  mysqli_query($con,"SELECT * FROM subcategory WHERE SUBCATEGORY_NAME='$subcategory'");
            $SCATR=  mysqli_fetch_array($SCAT);
            $SCATEGORYf=$SCATR['SUBCATEGORY_ID'];
            
            $PRODUCT=  mysqli_query($con,"SELECT * FROM dealer_products WHERE PRODUCT_ID='$pid'");
            $PRODUCTR=  mysqli_fetch_array($PRODUCT);
            $PRODUCTf=$SCATR['DEALER_ID'];
            
            
            
            //echo "<script>alert('$pname');</script>";
            $sql=mysqli_query($con,"insert into add_to_cart_admin(DEALER_ID,CATEGORY_ID,SUBCATEGORY_ID,PRODUCT_NAME,PRODUCT_COMPANY,PRODUCT_PRICE,PRODUCT_VOLUME,PRODUCT_UNIT,PRODUCT_DESCRIPTION,PRODUCT_QUANTITY,PRODUCT_ID) values('$PRODUCTf','$CATEGORYf','$SCATEGORYf','$pname','$company','$price','$volume','$unit','$desc','$quantity1','$pid')");
            if($sql==1){
                $newQuantity=$quantity-1;
                $updateQuantity=mysqli_query($con,"update dealer_products set PRODUCT_QUANTITY=$newQuantity where PRODUCT_ID='$pid'");
                echo "<script>alert('Added to cart');</script>";
            }
            else{
                echo "<script>alert('not Added to cart');</script>";
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
 <script>    function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
var number = document.getElementById('number');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
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
                                        <?php $id=  intval($_GET['id']) ?>
                                        <strong></strong>
                                    </div>
                                    <div class="card-body card-block">
                                        
                                        <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

                                        <?php 

                                        $query=mysqli_query($con,"select * from dealer_products where PRODUCT_ID='$id'");
                                        $cnt=1;
                                        while($row=mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                <img src="productimages/<?php echo htmlentities($id);?>/<?php echo htmlentities($row['PRODUCT_IMAGE1']);?>" style="height: 200px;width: 200px;">
                                              </div>
                                              <div class="carousel-item">
                                                <img src="productimages/<?php echo htmlentities($id);?>/<?php echo htmlentities($row['PRODUCT_IMAGE2']);?>" style="height: 200px;width: 200px;">
                                              </div>
                                              <div class="carousel-item">
                                                <img src="productimages/<?php echo htmlentities($id);?>/<?php echo htmlentities($row['PRODUCT_IMAGE3']);?>" style="height: 200px;width: 200px;">
                                              </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </div>
                                        
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                <?php 
                                                $category=$row['CATEGORY_ID'];
                                                $cat=mysqli_query($con,"select * from category where CATEGORY_ID='$category'");
                                                $cnt=1;
                                                while($r=mysqli_fetch_array($cat)){
                                                ?>
                                                <input type="text" name='category' value="<?php echo htmlentities($r['CATEGORY_NAME']); ?>" readonly="TRUE">
                                                <?php } ?>
                                            </div>
                                        </div>
                                            <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                <?php 
                                                $subcategory=$row['SUBCATEGORY_ID'];
                                                $cat=mysqli_query($con,"select * from subcategory where SUBCATEGORY_ID='$subcategory'");
                                                $cnt=1;
                                                while($r=mysqli_fetch_array($cat)){
                                                ?>
                                                <input type="text" name='subcategory' value="<?php echo htmlentities($r['SUBCATEGORY_NAME']); ?>" readonly="TRUE">
                                                <?php } ?>
                                            </div>
                                        </div>
                                            
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="pname" value="<?php echo htmlentities($row['PRODUCT_NAME']);?>" readonly="TRUE">
                                            </div>
                                        </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Company:</label>
                                                </div>
                                            <div class="col-5 col-md-9">
                                                <input type="text" name="company" value="<?php echo htmlentities($row['PRODUCT_COMPANY']);?>" readonly="TRUE">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                <textarea name="productDescription" id="text-input" rows="3"  required readonly="TRUE">
                                                   <?php echo nl2br(htmlentities($row['PRODUCT_DESCRIPTION']));?> </textarea>  
               
                                            </div>
                                            
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <input type="text" name='volume' value="<?php echo htmlentities($row['PRODUCT_VOLUME']); ?>" readonly="TRUE">
                                            </div>
                                            <div class="col-8 col-md-2">
                                                <input type="text" name='unit' value="<?php echo htmlentities($row['PRODUCT_UNIT']); ?>" readonly="TRUE">
                                            </div>
                                        </div>
                                            
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Available Quantiy:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="productquantity" readonly="TRUE"  value="<?php echo htmlentities($row['PRODUCT_QUANTITY']);?>" required>
                                                </div>
                                        </div>
                                     <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Quantiy:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number"  oninput="this.value = Math.abs(this.value)" name="quantity" min="0" value="1" required>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                Rs. <input type="text" name='price'  value="<?php echo htmlentities($row['PRODUCT_PRICE']); ?>"  readonly="TRUE">
                                            </div>
                                        </div>
                                        


<?php } ?>
                                        <div class="card-footer">
                                            <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Add to cart">
                                            
                                        
                                            
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