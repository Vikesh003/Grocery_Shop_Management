<?php 
    session_start();
	include './includes/config.php';
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $con->query("select dealer_products.*,category.CATEGORY_NAME,subcategory.SUBCATEGORY_NAME from dealer_products join category on category.CATEGORY_ID=dealer_products.CATEGORY_ID join subcategory on subcategory.SUBCATEGORY_ID=dealer_products.SUBCATEGORY_ID where dealer_products.DEALER_ID='58'  LIMIT $start, $limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);
        $did='58';
	$result1 = $con->query("SELECT count(PRODUCT_ID) AS id FROM dealer_products where DEALER_ID='$did'");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Learn Web Coding > Pagination in PHP and MySQL </title>
	<link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css"/>
	<script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
        <?php include_once './includes/links.php'; ?>
</head>
<body>
    <?php include_once './includes/header.php';
     include_once './includes/sidebar.php'; ?>
	<div class="container well">
		<h1 class="text-center">Bootstrap Pagination in PHP and MySQL</h1>
		<div class="row">
			<div class="col-md-10">
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
			</div><br>
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
		</div>
		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
	                    <th>#</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Comapany Name</th>
                                                
                                                <th>Action</th>
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php           $cnt=1;
                                                 foreach($customers as $customer) :  ?>
		        		<tr>
                                            <TD><?php echo $cnt; ?></TD>
                <td><?php echo htmlentities($customer['PRODUCT_NAME']);?></td>
		<td><?php echo htmlentities($customer['CATEGORY_NAME']);?></td>
        	<td><?php echo htmlentities($customer['SUBCATEGORY_NAME']);?></td>
		<td><?php echo htmlentities($customer['PRODUCT_COMPANY']);?></td>
		
		<td>					
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a href="edit_products.php?id=<?php echo $row['PRODUCT_ID']?>" >
                                                            <i class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="manage-product.php?id=<?php echo $row['PRODUCT_ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                            <i class="zmdi zmdi-delete"></i></a>
                                                    </button></div>
                                                </td>
                                            </tr>
                                            <?php $cnt=$cnt+1;  endforeach; ?>
	        	</tbody>
      		</table>

      		
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