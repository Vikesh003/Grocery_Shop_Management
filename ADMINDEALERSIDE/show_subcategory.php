<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    if(isset($_GET['del']))
    {
        mysqli_query($con,"delete from subcategory where SUBCATEGORY_ID = '".$_GET['id']."'");
        $_SESSION['delmsg']="SubCategory deleted !!";
        header("location: show_subcategory.php");
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
        <meta charset="UTF-8">
        <title></title>
        <!-- Required meta tags-->
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Show Subcategory</strong>
                                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
						<th>Category</th>
        					<th>Subcategory</th>
						<th>Creation date</th>
						<th>Last Updated</th>
                                                <th>Status</th>
						<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id=$_SESSION['id'];
                                            $query=mysqli_query($con,"SELECT category.*,subcategory.* FROM subcategory,category WHERE subcategory.DEALER_ID='$id' and subcategory.CATEGORY_ID=category.CATEGORY_ID");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($query))
                                            {
                                            ?>									
                                            <tr>
						<td><?php echo htmlentities($cnt);?></td>
                        			<td><?php echo htmlentities($row['CATEGORY_NAME']);?></td>
						<td><?php echo htmlentities($row['SUBCATEGORY_NAME']);?></td>
						<td> <?php echo htmlentities($row['CREATION_DATE']);?></td>
                        			<td><?php echo htmlentities($row['UPDATION_DATE']);?></td>
                                                <td><?php echo htmlentities($row['SUBCATEGORY_STATUS']);?></td>
                                                
						<td>
                                                    <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a href="edit-subcategory.php?id=<?php echo $row['SUBCATEGORY_ID']?>" >
                                                            <i class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="show_subcategory.php?id=<?php echo $row['SUBCATEGORY_ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                            <i class="zmdi zmdi-delete"></i></a>
                                                    </button></div>
                                                </td>        
					</tr>
					<?php $cnt=$cnt+1; } ?>
									
		</div><!--/.container-->
	</div><!--/.wrapper-->
                    </div>
		</div></div></div></div>
    <?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>
<?php } ?>