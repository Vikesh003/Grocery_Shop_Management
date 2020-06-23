<?php $b=$_SESSION['name']; 
if($b=='ADMIN'){ ?>
<div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" style="height: 50px;" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            
                            <div class="header-button">   
                                 
                             <!--   <a href="Admin_cart.php"><i class="zmdi zmdi-shopping-cart "  style="font-size: 3em;color: black;padding-right: 30px;"></i></a> -->
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php  $query = mysqli_query($con, "select * from tbl_admin where ADMIN_EMAIL='" . $_SESSION['alogin'] . "'");
                                                $row=  mysqli_fetch_array($query);
                                            ?>
                                            <img src="profileimagesADMIN/<?php echo htmlentities($row['ADMIN_ID']);?>/<?php echo htmlentities($row['ADMIN_PROFILE']);?>" alt="<?php $u=$_SESSION['name']; echo '"$u"'; ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#" style="text-decoration: none;"><?php $u=$_SESSION['name']; echo "$u"; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#" style="text-decoration: none;">
                                                        
                                                        <img src="profileimagesADMIN/<?php echo htmlentities($row['ADMIN_ID']);?>/<?php echo htmlentities($row['ADMIN_PROFILE']);?>" alt="<?php $u=$_SESSION['alogin']; echo '".$u."'; ?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#" style="text-decoration: none;"><?php $u=$_SESSION['alogin']; if($u=="groceryshoppingsurat@gmail.com"){echo "Admin";}else{ echo "Dealer";}?></a>
                                                    </h5>
                                                    <span class="email"><?php $u=$_SESSION['alogin']; echo "$u"; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="admin_account.php"style="text-decoration: none;">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                                <div class="account-dropdown__item">
                                                    <a href="reset_password_admin.php" style="text-decoration: none;">
                                                        
                                                        <i class="zmdi zmdi-key"></i>
                                                        <?php echo "   "; ?>Reset Password</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php" style="text-decoration: none;">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->
            <?php } else{ ?>
            <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" style="height: 50px;" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            
                            <div class="header-button">   
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php  $query = mysqli_query($con, "select * from tbl_dealer where DEALER_EMAIL='" . $_SESSION['alogin'] . "'");
                                                $row=  mysqli_fetch_array($query);
                                            ?>
                                            <img src="profileimagesDEALER/<?php echo htmlentities($row['DEALER_ID']);?>/<?php echo htmlentities($row['DEALER_PROFILE']);?>" alt="<?php $u=$_SESSION['name']; echo '"$u"'; ?>" />
                                       
                                           
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php $u=$_SESSION['name']; echo "$u"; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                           <img src="profileimagesDEALER/<?php echo htmlentities($row['DEALER_ID']);?>/<?php echo htmlentities($row['DEALER_PROFILE']);?>" alt="<?php $u=$_SESSION['alogin']; echo '".$u."'; ?>" />
                                                    
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php $u=$_SESSION['alogin']; if($u=="groceryshoppingsurat@gmail.com"){echo "Admin";}else{ echo "Dealer";}?></a>
                                                    </h5>
                                                    <span class="email"><?php $u=$_SESSION['alogin']; echo "$u"; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="dealer_account.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                                <div class="account-dropdown__item">
                                                    <a href="reset_password_dealer.php">
                                                        
                                                        <i class="zmdi zmdi-key"></i>
                                                        <?php echo "   "; ?>Reset Password</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->
            <?php } ?>