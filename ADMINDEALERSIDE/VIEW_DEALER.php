<?php
session_start();
include_once './includes/config.php';
   
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
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
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Account's Information</strong>
                                    </div>
                                    <div class="card-body card-block">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
                                <th>Email ID</th>
                                <th>Category</th>
                                
				<th>Function</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result=  mysqli_query($con, "select * from tbl_dealer");
				
				while($row = mysqli_fetch_array($result)){	
					echo "<tr>";
					echo "<td>".$row['DEALER_ID']."</td>";
					echo "<td>".$row['DEALER_NAME']."</td>";
                                        echo "<td>".$row['DEALER_EMAIL']."</td>";
                                        echo "<td>".$row['DEALER_CATEGORY']."</td>";
                                        
					if($row['DEALER_STATUS']=='A') {
                                            $ID=$row['DEALER_ID'];
						echo "<td><a href='update_status.php?userid=$ID' class='btn btn-success'>".$row['DEALER_STATUS']."</a></td>";
					}
                                        if($row['DEALER_STATUS']=='D'){
						echo "<td><a href='update_status.php?userid=$row[DEALER_ID]' class='btn btn-warning'>".$row['DEALER_STATUS']."</a></td>";
					}
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
									 <div class="card-footer">
                                            <input type="button" class="btn btn-primary btn-success" name="submit">
                                            <a href="dealer_pdf_download.php">Download<i class="fa fa-download" aria-hidden="true"> </i></a>
                                            </button>
                                    </div>
</div>
                                </div></div></div></div></div></div>
<?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>