<?php
    
        include_once './includes/config.php';
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
    <body><?php
        // put your code here
        include_once './includes/header.php';
        include_once './includes/sidebar.php';
        ?>
        <div class="main-content">
            <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-30">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>PRODUCTS</strong>
                                    </div>
                                    <div class="row form-group">
                                        
                                            <?php
                                            // ...
                                            $query = "SELECT * FROM dealer_products";
                                            $result = mysqli_query($con,$query);
                                            while($row=  mysqli_fetch_array($result)){
                                               ?> 
                                        <div class="col col-md-3">
                                        <a href="image.php?id=<?php echo $row['PRODUCT_ID']?>"><img src="productimages/<?php echo htmlentities($row['PRODUCT_ID']);?>/<?php echo htmlentities($row['PRODUCT_IMAGE2']);?>"  style="padding-right: 50px;width:300px;height:200px;"></a>
                                        
                                            <h6><?php echo $row['PRODUCT_NAME']; ?></h6></div>
                                                <?php 
                                                
                                                } ?>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    <?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>
<?php  ?>