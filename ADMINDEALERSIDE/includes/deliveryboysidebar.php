<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h4>Deliveryboy</h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>DASHBOARD</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="./deliveryboy_index.php">Dashboard</a>
                                </li>
                                
                            </ul> 
                        </li>
                        <li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="fa fa-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Order Management
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="todays-orders.php">
											<i class="zmdi zmdi-format-align-right"></i>
											Today's Orders
  <?php
  $status='Delivered';	
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$did=$_SESSION['did'];
 $result = mysqli_query($con,"SELECT * FROM order_table where deliveryBoyId='$did' and orderStatus!='$status' and order_date Between '$from' and '$to'");
$num_rows1 = mysqli_num_rows($result);
{
?>
											<b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="pending-orders.php">
											<i class="zmdi zmdi-format-align-right"></i>
											Pending Orders
										<?php	
									 
$ret = mysqli_query($con,"SELECT * FROM order_table where deliveryBoyId='$did' and orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="delivered-orders.php">
											<i class="fa fa-car"></i>
											Delivered Orders
								<?php	
	$status='Delivered';									 
$rt = mysqli_query($con,"SELECT * FROM order_table where deliveryBoyId='$did' and orderStatus='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        
