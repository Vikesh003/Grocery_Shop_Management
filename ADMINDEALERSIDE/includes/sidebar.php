
<?php $b=$_SESSION['name']; 
if($b=='ADMIN'){ ?>
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" >
                <a href="index.php">
                    <img src="images/icon/logocut.png" style="height: 70px;" alt="CoolAdmin">
                    
                </a>
                <h4>ADMIN</h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php" style="text-decoration: none;">
                                <i class="fas fa-tachometer-alt"></i>DASHBOARD</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.php" style="text-decoration: none;">Dashboard</a>
                                </li>
                                
                            </ul> 
                        </li>
                        <li>
                            <a href="./category.php" style="text-decoration: none;">
                                <i class="fa fa-plus"></i>ADD CATEGORY</a>
                        </li>
                       
                        <li>
                            <a href="./banner.php"style="text-decoration: none;">
                                <i class="fa fa-plus"></i>ADD BANNER</a>
                        </li>
                        <li>
                            <a href="./city.php" style="text-decoration: none;">
                                <i class="fa fa-plus"></i>ADD AREA</a>
                        </li>
                        <li>
                            <a href="./add_deliveryboy_details.php" style="text-decoration: none;">
                                <i class="fa fa-plus"></i>ADD DELIVERY BOY</a>
                        </li>
                        <li>
                            <a href="./show_category.php" style="text-decoration: none;">
                                <i class="fa fa-eye"></i>View CATEGORY</a>
                        </li>
                        
                        <li>
                            <a href="./show_area.php" style="text-decoration: none;">
                                <i class="fa fa-eye"></i>View AREA</a>
                        </li>
                        <li>
                            <a href="SHOW_ORDERS.php"style="text-decoration: none;">
                                <i class="fa fa-eye"></i>View ORDERS</a>
                        </li>
                        
                        <li>
                            <a href="VIEW_DEALER.php" style="text-decoration: none;">
                                <i class="fa fa-user" aria-hidden="true"></i>VIEW DEALER</a>
                        </li>
                        
                        <li>
                            <a href="view_customer.php" style="text-decoration: none;">
                                <i class="fa fa-user" aria-hidden="true"></i>VIEW CUSTOMER</a>
                        </li>
                         <li>
                            <a href="showMailus.php"style="text-decoration: none;">
                                <i class="fa fa-user" aria-hidden="true"></i>VIEW CUSTOMER Feedback</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        
<?php } else{ ?>
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php" style="text-decoration: none;">
                    <img src="images/icon/logocut.png" style="height: 70px;" alt="CoolAdmin">
                    
                </a>
                <h4>Dealer</h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php" style="text-decoration: none;">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.php" style="text-decoration: none;">Dashboard</a>
                                </li>
                                
                            </ul> 
                        </li>
                        <li>
                            <a href="./add_subcategory.php" style="text-decoration: none;">
                                <i class="fa fa-plus"></i>Add Subcategory</a>
                        </li>
                        <li>
                            <a href="./add_products.php" style="text-decoration: none;">
                                <i class="fa fa-plus"></i>Add Products</a>
                        </li>
                        <li>
                            <a href="./show_subcategory.php" style="text-decoration: none;">
                                <i class="fa fa-eye"></i>Show Subcategory</a>
                        </li>
                        <li>
                            <a href="./show_dealer_product.php" style="text-decoration: none;">
                                <i class="fa fa-eye"></i>Show Product</a>
                        </li>
                        
                        <li>
                            <a href="./order_dealer.php" style="text-decoration: none;">
                                <i class="fa fa-bars"></i>Orders</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
<?php } ?>
