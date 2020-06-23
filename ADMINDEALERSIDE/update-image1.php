
<?php
session_start();
include_once './includes/config.php';
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$productname=$_POST['productName'];
	$productimage1=$_FILES["productimage1"]["name"];
//$dir="productimages";
//unlink($dir.'/'.$pimage);


	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$pid/".$_FILES["productimage1"]["name"]);
	$sql=mysqli_query($con,"update  dealer_products set PRODUCT_IMAGE1='$productimage1' where PRODUCT_ID='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";
header("location: edit_products.php?id=$pid");
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
                                        <strong>Update Image</strong>
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


			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<?php 

$query=mysqli_query($con,"select PRODUCT_NAME,PRODUCT_IMAGE1 from dealer_products where PRODUCT_ID='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class="textarea-input" class="form-control-label">Product Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text"    name="productName"  readonly value="<?php echo htmlentities($row['PRODUCT_NAME']);?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class="form-control-label">Current Product Image1</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['PRODUCT_IMAGE1']);?>" width="200" height="100">
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class="textarea-input" class="form-control-label">New Product Image1</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" name="productimage1" id="productimage1" value="" class="form-control" required>
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
                        </div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>
<?php } ?>