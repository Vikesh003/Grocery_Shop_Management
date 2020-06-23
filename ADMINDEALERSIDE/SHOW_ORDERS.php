<?php 
    session_start();
	include './includes/config.php';
        include_once './includes/config.php';
if(strlen($_SESSION['alogin'])==0){	
header('location:login.php');
}
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
        $result=$con->query("SELECT order_table.*,order_item_customer.*,customer_reg.* from order_table,order_item_customer,customer_reg WHERE order_item_customer.status=' ' and order_table.order_id=order_item_customer.order_id");
	//$result = $con->query("SELECT order_table.*,order_item_customer.*,customer_reg.* from order_table,order_item_customer,customer_reg WHERE order_item_customer.status='' and order_table.order_id=order_item_customer.order_id and customer_reg.CUSTOMER_ID=order_item_customer.order_item_customerid  LIMIT $start, $limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);
        $c=  mysqli_num_rows($result);
	$result1 = $con->query("SELECT count(order_item_id) AS id FROM order_item_customer");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

 ?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css"/>
	<script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
        <?php include_once './includes/links.php'; ?>
</head>
<body>
    <?php include_once './includes/header.php';
     include_once './includes/sidebar.php'; ?>
	<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                
				<nav aria-label="Page navigation">
					<ul class="pagination">
				    <li>
                                        <a href="SHOW_ORDERS.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; Previous</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li><a href="SHOW_ORDERS.php?page=<?= $i; ?>"><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li>
				      <a href="SHOW_ORDERS.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true">Next &raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
                                
			<div class="text-center" style="margin-top: 20px; " class="col-md-2">
				<form method="post" action="#">
						<select name="limit-records" id="limit-records">
							<option disabled="disabled" selected="selected">---Limit Records---</option>
							<?php foreach([10,100,500,1000,5000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		<div class="card">
                                    <div class="card-header">
                                        <strong>orders  </strong>
                                    </div>
                    <?php if($c!=0){ ?>
		<div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                      <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
	                    <th> Name</th>
                            <th width="50">Email /Contact no</th>
                            <th>Shipping Address</th>
                            <th>Order Date</th>
                            <th>Delivery Boy </th>
                            <th>Action</th>
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php $name=0; foreach($customers as $customer) :  
                                {
                                    if($name==$customer['order_id']){
                                        
                                    }
                                    else{
                                    ?>
		        		<tr>
		        			
                <td><?php echo htmlentities($customer['customer_name']);?></td>
		<td><?php echo htmlentities($customer['email_address']);?></td>
        	<td><?php echo htmlentities($customer['customer_address'].",".$customer['customer_city'].",".$customer['customer_state']."-".$customer['customer_pin']);?></td>
		<td><?php echo htmlentities($customer['order_date']);?></td>
                <td>   
                    <?php if($customer['deliveryBoyId']=="0"){ ?>
                    <a href="updateorderAdmin.php?oid=<?php echo htmlentities($customer['order_id']);?>" title="Update order" target="_blank"><i class="zmdi zmdi-edit"></i></a>
                    <?php }else{ ?>
                        <?php $q=  mysqli_query($con,"select * from tbl_deliveryboy where deliveryboy_id='".$customer['deliveryBoyId']."'");
                        $row=  mysqli_fetch_array($q);
                        $dname=$row['dname'];
                        echo $dname;?>
                    <?php } ?>
                </td>
                
               <td><?php if($customer['status']==''){
                   
                   ?><a href="update_status_product.php?userid=<?php echo htmlentities($customer['order_id']);?>&did=<?php echo htmlentities($customer['deliveryboy_id']);?>" class='btn btn-warning'>Confirm</a>
		<?php			}?></td>
                </tr>
                                    <?php }
                                    $name=$customer['order_id'];
                                }
                                    endforeach; ?>
	        	</tbody>
      		</table>

               </div>
                            </div>
                        </div>
                    <?php }else{
                        ?> <center><h2>All Orders are confirm</h2></center><?php
                    } ?>
		</div><!--/.container-->
	</div><!--/.wrapper-->
                    </div>
		</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	})
</script>
<?php include_once './includes/footerLinks.php'; ?>
</body>
</html>