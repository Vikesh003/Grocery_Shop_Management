<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    if(isset($_GET['del']))
    {
            mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Category deleted !!";
            header('location:category.php');
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
                                        <strong>Show Category</strong>
                                    </div>
                                    <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                  <?php   $id=$_SESSION['id']; //$query=  mysqli_query($con,"SELECT order_table.*,order_item_customer.*,customer_reg.*,tbl_dealer.* from order_table,order_item_customer,customer_reg,tbl_dealer WHERE order_table.order_id=order_item_customer.order_id and customer_reg.CUSTOMER_ID=order_item_customer.order_item_customerid and tbl_dealer.DEALER_ID='$id'");
                                           // $query=  mysqli_query($con,"SELECT order_item_customer.*,tbl_dealer.*,customer_reg.*,order_table.* from order_table,customer_reg,order_item_customer,tbl_dealer WHERE customer_reg.CUSTOMER_ID=order_item_customer.order_item_customerid and order_item_customer.order_item_dealerid='$id' and order_table.order_id=order_item_customer.order_id"); 
                                           $query=  mysqli_query($con,"SELECT order_item_customer.*,tbl_dealer.*,order_table.* from order_table,order_item_customer,tbl_dealer where tbl_dealer.DEALER_ID='$id' and order_item_customer.order_item_dealerid='$id'");
                                  $cn=  mysqli_num_rows($query);
                                            if ($cn>0){
                                            $cnt=1; ?>
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th> Name</th>
						<th width="50">Email /Contact no</th>
						<th>Shipping Address</th>
						
						<th>Order Date</th>
                                                <th>Order Item Name</th>
                                                <th>Order Item Quantity</th>
                                                <th>Order Item Price</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                while($row=mysqli_fetch_array($query))
                                                {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($row['customer_name']);?></td>
						<td><?php echo htmlentities($row['email_address']);?></td>
						<td><?php echo htmlentities($row['customer_address'].",".$row['customer_city'].",".$row['customer_state']."-".$row['customer_pin']);?></td>
						<td><?php echo htmlentities($row['order_date']);?></td>
                                                
						<td><?php echo htmlentities($row['order_item_name']);?></td>
						<td><?php echo htmlentities($row['order_item_quantity']);?></td>
						<td> <?php echo htmlentities($row['order_item_price']);?></td>
                                            </tr>
                                            <?php $cnt=$cnt+1; } ?>
                                            <?php }else{
                                                ?> <center><h3>No orders</h3></center><?php 
                                            } ?>
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
<?php } ?>