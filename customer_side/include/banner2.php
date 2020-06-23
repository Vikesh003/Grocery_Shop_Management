<div class="banner_bottom">
			<div class="wthree_banner_bottom_left_grid_sub">
			</div>
			<div class="wthree_banner_bottom_left_grid_sub1">
                            <?php $query=mysqli_query($con,"select BANNER_ID,BANNER_NAME from tbl_banner");
                            $cnt=1;
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
                                            
                                            <img src="../../groceryShopAdminDealer/Banner/<?php echo htmlentities($row['BANNER_NAME']);?>" alt=" " class="img-responsive">
						
					</div>
				</div>
                            <?php } ?>
				
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
	</div>
<!-- top-brands -->