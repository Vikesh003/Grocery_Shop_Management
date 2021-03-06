<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include_once './include/database.php'; 
 session_start();
 
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once './include/headeLinks.php'; ?>
   
  <style>
  .popover
  {
      width: 100%;
      max-width: 800px;
  }
  </style>

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
   // include_once './include/heade1.php';
    
          
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
   <?php include_once './include/sidebar.php';
include_once './include/banner.php'; 
          include_once './include/banner2.php'; ?>
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
<?php include_once './include/footer.php'; ?>
	

<?php include_once './include/footerLinks.php'; ?>
</body>
</html>
<script>  
$(document).ready(function(){

	load_product();

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
                var dealer_id=$('#dealerid'+product_id).val();
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
				data:{product_id:product_id,dealer_id:dealer_id, product_name:product_name, product_price:product_price,product_quantity1:product_quantity1,product_dealerid:product_dealerid ,product_quantity:product_quantity,product_company:product_company,product_description:product_description,product_volume:product_volume,product_unit:product_unit,product_subcategory:product_subcategory,product_category:product_category ,action:action},
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