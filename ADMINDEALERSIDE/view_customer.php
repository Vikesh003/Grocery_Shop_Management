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
                                <th>Contact No</th>
                                
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result=  mysqli_query($con, "select * from customer_reg");
				
				while($row = mysqli_fetch_array($result)){	
					echo "<tr>";
					echo "<td>".$row['CUSTOMER_ID']."</td>";
					echo "<td>".$row['CUSTOMER_NAME']."</td>";
                                        echo "<td>".$row['CUSTOMER_GMAIL']."</td>";
                                        echo "<td>".$row['CUSTOMER_PHONE']."</td>";
                                        $ID=$row['CUSTOMER_ID'];
					if($row['CUSTOMER_STATUS']=='A') {
                                            
						echo "<td><a href='update_status_customer.php?userid=$ID' class='btn btn-success'>".$row['CUSTOMER_STATUS']."</a></td>";
					}
                                        if($row['CUSTOMER_STATUS']=='D'){
						echo "<td><a href='update_status_customer.php?userid=$ID' class='btn btn-warning'>".$row['CUSTOMER_STATUS']."</a></td>";
					}
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
	<div class="card-footer">
        <input type="button" class="btn btn-primary btn-success" name="submit">
        <a href="customer_pdf_download.php">Download<i class="fa fa-download" aria-hidden="true"> </i></a>
        </button>
        </div>
</div>
                                </div></div></div></div></div></div>
<?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>