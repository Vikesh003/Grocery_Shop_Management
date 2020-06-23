<?php
session_start();
include('./includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
    header('location:login.php');
}
 else {
    $my=  mysqli_query($con ,"select sum(order_item_price) as total,year,month from order_item_customer group by year,month");
    while($row=  mysqli_fetch_array($my)){
        $ym=  mysqli_query($con,"select * from chart_data where year='".$row['year']."' and month='".$row['month']."'");
        $r=  mysqli_fetch_array($ym);
            if($r['year']==$row['year'] and $r['month']==$row['month'])
                $insert=  mysqli_query($con, "update chart_data set profit='".$row['total']."' where year='".$row['year']."' and month='".$row['month']."'");
            else
                $insert=  mysqli_query ($con,"insert into chart_data(year,month,profit) values('".$row['year']."','".$row['month']."','".$row['total']."')");
    }
      
     
    /*$my=mysqli_query($con,"select sum(order_item_price) as total,year,month from order_item_customer group by year,month");
    while ($row=  mysqli_fetch_array($my)){
        $insert=  mysqli_query ($con,"insert into chart_data(year,month,profit) values('".$row['year']."','".$row['month']."','".$row['total']."')");
    }*/
?>
<?php  

//index.php

include("database_connection.php");

$query = "SELECT year FROM chart_data GROUP BY year DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

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
        <?php include_once './includes/links.php'; ?>

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
<script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    </head>
    <body>
        <?php
        // put your code here
       include_once './includes/header.php';
        //include_once './extra/includes/header_for_add_to_cart.php';
       include_once './includes/sidebar.php';
        ?>
        
        
        <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                      
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php $q="select * from customer_reg where CUSTOMER_STATUS='A'";
                                                        $e=  mysqli_query($con, $q);
                                                        $num_rows = mysqli_num_rows($e); 
                                                        echo "$num_rows";
                                                        ?></h2>
                                                <span>Customer</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php $q="select * from tbl_dealer where DEALER_STATUS='A'";
                                                        $e=  mysqli_query($con, $q);
                                                        $num_rows = mysqli_num_rows($e); 
                                                        echo "$num_rows";
                                                        ?></h2>
                                                <span>Dealer</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php $q="select * from tbl_deliveryboy";
                                                        $e=  mysqli_query($con, $q);
                                                        $num_rows = mysqli_num_rows($e); 
                                                        echo "$num_rows";
                                                        ?></h2>
                                                <span>Delivery Boy</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-rupee"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php $q="select sum(order_item_price) as price from order_item_customer";
                                                        $e=  mysqli_query($con, $q);
                                                        $num_rows = mysqli_fetch_array($e); 
                                                        echo $num_rows['price'];
                                                        ?></h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php include_once './index_chart.php'; ?>
                        </div>
                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 Feni Jariwala. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Jquery JS-->
   <?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>
<?php } ?>