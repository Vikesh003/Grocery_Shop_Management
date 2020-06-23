<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
    if(isset($_POST['submit'])){
        
       
       
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
                                       
                                        <strong></strong>
                                    </div>
                                    <div class="card-body card-block">
                                        
                                        <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

                                        <?php 

                                        $query=mysqli_query($con,"select * from order_item");
                                        $cnt=1;
                                        while($row=mysqli_fetch_array($query))
                                        {
                                        ?>
                                        
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                <h5> <input type="text" name="oname" value="<?php echo htmlentities($row['order_item_name']);?>" readonly="TRUE"></h5>
                                            </div>
                                        </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                   <nobr> <label for="textarea-input" class=" form-control-label">Quantity:</label>
                                                       <input type="text" name="quantity" value="<?php echo htmlentities($row['order_item_quantity']);?>" readonly="TRUE"></nobr>
                                                </div>
                                            
                                        </div>
                                       
                                     
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                Rs. <input type="text" name='price'  value="<?php echo htmlentities($row['order_item_price']); ?>"  readonly="TRUE">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                <?php echo '-------------'; ?>
                                            </div>
                                        </div>


<?php } ?>
                                       </form>
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