<?php session_start();
error_reporting(0);
include_once './include/database.php';
if(strlen($_SESSION['login'])==0){	
header('location:loginSignUp1.php');
} 
else{
    if(isset($_POST['submit'])){
        $name=$_POST['Name'];
        $tel=$_POST['Telephone'];
        $mail=$_POST['Email'];
        $subject=$_POST['Subject'];
        $messz=$_POST['Message'];
        mysqli_query($con,"insert into mailus(name,phone,email,subject,message) values('$name','$tel','$mail','$subject','$messz')");
        $error="Your Message is delivered";
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
        <?php include_once './include/headeLinks.php'; ?>
    </head>
    <body>
        <?php
        if(isset($_SESSION['login']))
        {	
            include_once './include/heade2.php';
        }
        else
        {
            include_once './include/heade1.php';
        }
        ?>
        <nav class="navbar navbar-default" role="navigation"  style="background-color: black;">
    <div class="container-fluid">
     <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only" >Menu</span>
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
     
     </div>
     <div id="navbar-cart" class="navbar-collapse collapse">
         <ul class="nav navbar-right">
       <li>
        <a id="cart-popover" class="btn" data-placement="bottom"  title="Shopping Cart">
            <span class="glyphicon glyphicon-shopping-cart" style="color: white;"></span>
            <span class="badge" ></span>
         <span class="total_price" style="color: white;">$ 0.00</span>
        </a>
       </li>
      </ul>
     </div>
    </div>
   </nav>
   <?php ?>
   <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">
     <a href="order_process.php" class="btn btn-primary" id="check_out_cart">
      <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
      <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
    </div>
   </div>

   <div id="display_item" class="row">

   </div>
        <!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index1.php">Home</a><span>|</span></li>
				<li>Mail Us</li>
			</ul>
		</div>
	</div>
         <?php include_once './include/sidebar.php'; ?>
        <div class="w3l_banner_nav_right">
        <!-- mail -->
		<div class="mail">
			<h3>Mail Us</h3>
                        <h6 style="color:red"><?php if($error!=""){ echo "$error"; } ?></h6>
			<div class="agileinfo_mail_grids">
				<div class="col-md-4 agileinfo_mail_grid_left">
					<ul>
						<li><i class="fa fa-home" aria-hidden="true"></i></li>
						<li>address<span>Sagrampura,Surat.</span></li>
					</ul>
					<ul>
						<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
						<li>email<span><a href="mailto:info@example.com">grocery@gmail.com</a></span></li>
					</ul>
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i></li>
						<li>call to us<span>+91 7990422916</span></li>
					</ul>
				</div>
				<div class="col-md-8 agileinfo_mail_grid_right">
					<form action="#" method="post">
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
							<input type="email" name="Email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}" required="">
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Telephone" value="Telephone*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="">
							<input type="text" name="Subject" value="Subject*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject*';}" required="">
						</div>
						<div class="clearfix"> </div>
						<textarea  name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                                                <input type="submit" value="Submit" name="submit">
						<input type="reset" value="Clear">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
		</div>
        
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- map -->
	<div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.218813188824!2d72.82518311487168!3d21.183464885914745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e69e78662e5%3A0x31721cc05246883c!2sMulshanker%20St%2C%20Chhowala%20Sheri%2C%20Sagrampura%2C%20Surat%2C%20Gujarat%20395008!5e0!3m2!1sen!2sin!4v1588322158179!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

	</div>
<!-- //map -->

   <?php ?>
   <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">
     <a href="order_process.php" class="btn btn-primary" id="check_out_cart">
      <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
      <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
    </div>
   </div>

   <div id="display_item" class="row">

   </div>

    
    <br />
    <br />
   </div>
  </div>
<?php ?>
	
<?php include_once './include/footer.php'; ?>

<?php include_once './include/footerLinks.php'; ?>
</body>
</html>
<script>  
$(document).ready(function(){

	//load_product();

	load_cart_data();

	function load_product()
	{
		$.ajax({
			url:"fetch_item.php",
			method:"POST",
			success:function(data)
			{
				$('#display_item').html(data);
			}
		})
	}

	function load_cart_data()
	{
		$.ajax({
			url:"fetch_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		})
	}

	$('#cart-popover').popover({
		html : true,
		container : 'body',
		content:function(){
			return $('#popover_content_wrapper').html();
		}
	});

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr('id');
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
                var product_quantity1 = $('#quantity1'+product_id).val();
                var product_dealerid = $('#dealerid'+product_id).val();
                var product_company = $('#company'+product_id).val();
                var product_description = $('#description'+product_id).val();
                var product_volume = $('#volume'+product_id).val();
                var product_unit = $('#unit'+product_id).val();
                var product_subcategory = $('#subcategory'+product_id).val();
                var product_category = $('#category'+product_id).val();
                
		var action = 'add';
		if(product_quantity > 0)
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price,product_quantity1:product_quantity1,product_dealerid:product_dealerid ,product_quantity:product_quantity,product_company:product_company,product_description:product_description,product_volume:product_volume,product_unit:product_unit,product_subcategory:product_subcategory,product_category:product_category ,action:action},
				success:function(data)
				{
					load_cart_data();
					alert("Item has been Added into Cart");
                                                location.reload(true); 

				}
			})
		}
		else
		{
			alert("Please Enter Number of Quantity");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr('id');
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function(data)
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
					alert("Item has been removed from Cart");
                                        location.reload(true); 

				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Your Cart has been clear");
                                location.reload(true); 

			}
		})
	});
    
});

</script> 
       
        <?php include_once './include/footerLinks.php'; ?>
    </body>
</html>
<?php } ?>