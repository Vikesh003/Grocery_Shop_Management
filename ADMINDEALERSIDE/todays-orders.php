<?php session_start();
include_once './includes/config.php';
if(strlen($_SESSION['dlogin'])==0){	
header('location:loginDeliveryboy.php');
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
    <body>
   
    <?php
        // put your code here
        include_once './includes/deliveryboyheader.php';
        include_once './includes/deliveryboysidebar.php';
        
        ?>
        <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Today's order</strong>
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
<?php $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$did=$_SESSION['did'];
//$query=mysqli_query($con,"select customer_reg.CUSTOMER_NAME as username,customer_reg.CUSTOMER_GMAIL as useremail,customer_reg.CUSTOMER_PHONE as usercontact,order_table.customer_address as shippingaddress,order_table.customer_city as shippingcity,order_table.orderStatus as shippingstate,order_table.customer_pin as shippingpincode,order_item_customer.order_item_name as productname,order_item_customer.order_item_quantity as quantity,order_table.order_date as orderdate,order_item_customer.order_item_price as productprice,order_table.order_id as id from order_table,customer_reg,order_item_customer,dealer_products where order_item_customer.order_item_customerid=customer_reg.CUSTOMER_ID and order_table.order_date  Between '$from' and '$to'");
$query=  mysqli_query($con,"SELECT order_table.*,order_item_customer.*,customer_reg.* from order_table,order_item_customer,customer_reg WHERE order_item_customer.status='A' and order_table.order_id=order_item_customer.order_id  and order_table.deliveryBoyId='$did' and order_table.orderStatus!='Delivered' and  order_table.order_date Between '$from' and '$to'");
$cnt=1;
$c=  mysqli_num_rows($query);
if($c>0){ ?>

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Name</th>
						<th width="50">Email /Contact no</th>
						<th>Shipping Address</th>
						
						<th>Order Date</th>
						<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php   $name=0;
while($row=mysqli_fetch_array($query))
{
    if($name==$row['order_item_customerid']){
      ?>
   <?php }
   else{ ?>								
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['customer_name']);?></td>
											<td><?php echo htmlentities($row['CUSTOMER_GMAIL']);?>/<?php echo htmlentities($row['CUSTOMER_PHONE']);?></td>
										
											<td><?php echo htmlentities($row['customer_address'].",".$row['customer_city'].",".$row['customer_state']."-".$row['customer_pin']);?></td>
											
											<td><?php echo htmlentities($row['order_date']);?></td>
											<td>    <a href="updateorder.php?oid=<?php echo htmlentities($row['order_id']);?>" title="Update order" target="_blank"><i class="zmdi zmdi-edit"></i></a>
											</td>
											</tr>

<?php $cnt=$cnt+1; }
$name=$row['order_item_customerid'];
   }

 } 
else
{
    ?>
                                                                                        <tr></tr><tr> <h3 style="text-align: center">No Orders</h3></tr>
        <?php
}
?>
	
                                        </tbody>
                                    </table>
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
