<?php
include('./includes/config.php');
session_start();
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
 $did=$_SESSION['id'];
$query=mysqli_query($con,"SELECT * FROM subcategory WHERE CATEGORY_ID=$id and DEALER_ID=$did");
?>
<option value="">Select Subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['SUBCATEGORY_ID']); ?>"><?php echo htmlentities($row['SUBCATEGORY_NAME']); ?></option>
  <?php
 }
}
?>