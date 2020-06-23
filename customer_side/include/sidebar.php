<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
                                                <?php $sql=mysqli_query($con,"select CATEGORY_ID,CATEGORY_NAME  from category limit 6");
                                                
                                                while($row=mysqli_fetch_array($sql))
                                                {
                                                    ?>

                                               <li class="dropdown mega-dropdown active">
                                                    <a href="category.php?cid=<?php echo $row['CATEGORY_ID'];?>"> <?php echo $row['CATEGORY_NAME'];?><span class="caret"></span></a>
							<?php $cid=$row['CATEGORY_ID']; $sub=mysqli_query($con,"select * from subcategory where CATEGORY_ID='$cid' AND SUBCATEGORY_STATUS='A'"); ?>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
                                                                            <?php $name=''; while($r=mysqli_fetch_array($sub))
                                                                            { 
                                                                                if($name==$r['SUBCATEGORY_NAME']){
                                                                                ?>
										
                                                                                <?php }
                                                                                else{ ?>
                                                                                    <li><a href="subcategory.php?scid=<?php echo $r['SUBCATEGORY_ID'];?>"> <?php echo $r['SUBCATEGORY_NAME'];?></a></li>
                                                                                <?php }
                                                                                $name=$r['SUBCATEGORY_NAME'];
                                                                                     } ?>
									</ul>
								</div>                  
							</div>	
						</li>
                                                    
                                               
			<?php } ?>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
<!-- banner -->


