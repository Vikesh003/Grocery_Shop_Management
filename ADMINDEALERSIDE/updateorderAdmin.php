<?php
session_start();

include_once './includes/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:login.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$did=$_POST['did'];

$sql=mysqli_query($con,"update order_table set deliveryBoyId='$did' where order_id='$oid'");
echo "<script>alert('$did');</script>";
//}
}

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Compliant</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Order !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink"><?php $oid=intval($_GET['oid']); echo $oid;?></td>
    </tr>
    
   
       <tr height="20">
      <td class="fontkink1"><?php echo "========"; ?></td>  
      <td  class="fontkink"><?php echo "=====================================";?></td>
        </tr>
   <?php $r=  mysqli_query($con,"select * from order_item_customer where order_id='$oid'");
        while($r1=  mysqli_fetch_array($r)){
          ?>
       
        <tr height="20">
      <td class="fontkink1" ><b>Item Name:</b></td>
      <td  class="fontkink"><?php echo $r1['order_item_name'];?></td>
        </tr>
     <tr height="20">
      <td class="fontkink1" ><b>Quantity:</b></td>
      <td  class="fontkink"><?php echo $r1['order_item_quantity'];?></td>
    </tr>
     <tr height="20">
      <td class="fontkink1" ><b>Price:</b></td>
      <td  class="fontkink"><?php $price=$r1['order_item_quantity']*$r1['order_item_price']; echo $price;?></td>
    </tr>
    <tr height="20">
      <td class="fontkink1"><?php echo "------------"; ?></td>  
      <td  class="fontkink"><?php echo "-------------------------------------"; ?><td>
        </tr>

    
    <tr height="50">
      <td class="fontkink1">Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="did"><option value="Select" selected="true" disabled="disabled">Select</option><?php
        $q=  mysqli_query($con,"select * from order_table where order_id='$oid'");
        $customer=  mysqli_fetch_array($q);
        $area=$customer['customer_area']; 
                $q=  mysqli_query($con,"select * from tbl_deliveryboy where area='$area'"); 
                $co=  mysqli_num_rows($q);
                if($co>0){
                 while ($row=  mysqli_fetch_array($q)){
                ?>
                        <option  value="<?php echo htmlentities($row['deliveryboy_id'])?>"> <?php echo htmlentities($row['dname']);?></option>
                <?php }} ?>
               </select>
        </span></td>
    </tr>

     
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="update"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>

     