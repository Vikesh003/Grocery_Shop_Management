


<?php

//action.php
include_once './includes/config.php';

session_start();

if(isset($_POST["action"]))
{
 if($_POST["action"] == 'add')
 {
  if(isset($_SESSION["shopping_cart"]))
  {
   $is_available = 0;
   foreach($_SESSION['shopping_cart'] as $keys => $values)
   {
    if($_SESSION['shopping_cart'][$keys]['product_id'] == $_POST['product_id'])
    {
     $is_available++;
     
     $_SESSION['shopping_cart'][$keys]['product_quantity'] = $_SESSION['shopping_cart'][$keys]['product_quantity'] + $_POST['product_quantity'];
    }
   }

   if($is_available == 0)
   {
    $item_array = array(
     'product_id' => $_POST['product_id'],
     'product_name' => $_POST['product_name'],
     'product_price' => $_POST['product_price'],
     'product_quantity' => $_POST['product_quantity'],
        'product_quantity1' => $_POST['product_quantity1'],
        'product_company' => $_POST['product_company'],
        'product_description' => $_POST['product_description'],
        'product_volume' => $_POST['product_volume'],
        'product_unit' => $_POST['product_unit'],
        'product_subcategory' => $_POST['product_subcategory'],
        'product_category' => $_POST['product_category']
        
    );
    $newQuantity=$_POST['product_quantity1']-$_POST['product_quantity'];
    mysqli_query($con,"update dealer_products set PRODUCT_QUANTITY='$newQuantity' where PRODUCT_ID= '".$_POST['product_id']."'");
    $_SESSION['shopping_cart'][] = $item_array;
   }
  }
  else
  {
   $item_array = array(
    'product_id'  => $_POST['product_id'],
    'product_name'  => $_POST['product_name'],
    'product_price'  => $_POST['product_price'],
    'product_quantity' => $_POST['product_quantity'],
    'product_quantity1' => $_POST['product_quantity1'],
       'product_company' => $_POST['product_company'],
        'product_description' => $_POST['product_description'],
        'product_volume' => $_POST['product_volume'],
        'product_unit' => $_POST['product_unit'],
        'product_subcategory' => $_POST['product_subcategory'],
        'product_category' => $_POST['product_category']
            
   );
    $newQuantity=$_POST['product_quantity1']-$_POST['product_quantity'];
        mysqli_query($con,"update dealer_products set PRODUCT_QUANTITY='$newQuantity' where PRODUCT_ID= '".$_POST['product_id']."'");
   $_SESSION['shopping_cart'][] = $item_array;
  }
 }

 if($_POST['action'] == 'remove')
 {
  foreach($_SESSION['shopping_cart'] as $keys => $values)
  {
   if($values['product_id'] == $_POST['product_id'])
   {
        $newQuantity=$_POST['product_quantity1']+$values['product_quantity1'];
        mysqli_query($con,"update dealer_products set PRODUCT_QUANTITY='$newQuantity' where PRODUCT_ID= '".$values['product_id']."'");
        unset($_SESSION['shopping_cart'][$keys]);
   }
  }
 }
 if($_POST['action'] == 'empty')
 {
     foreach($_SESSION['shopping_cart'] as $keys => $values)
    {
        //if($values['product_id'] == $_POST['product_id'])
        //{
            $newQuantity=$_POST['product_quantity1']+$values['product_quantity1'];
            mysqli_query($con,"update dealer_products set PRODUCT_QUANTITY='$newQuantity' where PRODUCT_ID= '".$values['product_id']."'");
           // unset($_SESSION['shopping_cart'][$keys]);
    //}
    }
     //$newQuantity=$_POST['product_quantity']+$_POST['product_quantity1'];
     //mysqli_query($con,"update dealer_products set PRODUCT_QUANTITY='$newQuantity' where PRODUCT_ID= '".$values['product_id']."'");
     unset($_SESSION['shopping_cart']);
 }
}

?>

