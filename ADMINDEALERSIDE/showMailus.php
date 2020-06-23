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
                                        <strong>Mail Information</strong>
                                    </div>
                                    <div class="card-body card-block">
	<table class="table">
            
		<thead>
			<tr>
				<th>ID</th>
				<th>Name of Customer</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result=  mysqli_query($con, "select * from mailus");
				
				while($row = mysqli_fetch_array($result)){	
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['phone']."</td>";
                                        echo "<td>".$row['email']."</td>";
                                        echo "<td>".$row['subject']."</td>";
                                        echo "<td>".$row['message']."</td>";
                                        
                                    	echo "</tr>";
				}
			?>
		</tbody>
	</table>
</div>
                                </div></div></div></div></div></div>
<?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>