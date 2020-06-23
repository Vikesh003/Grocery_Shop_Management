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
                                        <strong>Pending's order</strong>
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
<?php 
$status='Delivered';
$a='A';
$did=$_SESSION['did'];
$query=mysqli_query($con,"SELECT order_table.*,order_item_customer.*,customer_reg.* from order_table,order_item_customer,customer_reg WHERE order_item_customer.status='A' and order_table.order_id=order_item_customer.order_id  and order_table.deliveryBoyId='$did' and order_table.orderStatus!='$status' or order_table.orderStatus is null");
//$query=  mysqli_query($con,"SELECT order_table.*,order_item_customer.*,customer_reg.* from order_table,order_item_customer,customer_reg WHERE order_item_customer.status='A' and order_table.order_id=order_item_customer.order_id and customer_reg.CUSTOMER_ID=order_item_customer.order_item_customerid and order_table.deliveryBoyId='$did' and order_table.orderStatus!='$status' or order_table.orderStatus is null");
$cnt=1;
$c=  mysqli_num_rows($query);
if($c>0){ ?>

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Name</th>
						<th width="50">Email </th>
						<th>Shipping Address</th>
						
						<th>Order Date</th>
						<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php   $name=0;
while($row=mysqli_fetch_array($query))
{
    if($name==$row['order_id']){
      ?>
   <?php }
   else{ ?>						
         	<tr>
		<td><?php echo htmlentities($cnt);?></td>
		<td><?php echo htmlentities($row['customer_name']);?></td>
		<td><?php echo htmlentities($row['email_address']);?></td>
        	<td><?php echo htmlentities($row['customer_address'].",".$row['customer_city'].",".$row['customer_state']."-".$row['customer_pin']);?></td>
		<td><?php echo htmlentities($row['order_date']);?></td>
		<td>    <a href="updateorder.php?oid=<?php echo htmlentities($row['order_id']);?>" title="Update order" target="_blank"><i class="zmdi zmdi-edit"></i></a>
		</td>
		</tr>

<?php $cnt=$cnt+1; }
$name=$row['order_id'];
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
