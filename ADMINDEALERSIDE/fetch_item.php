<?php

//fetch_item.php

/*include('database_connection.php');

$query = "
SELECT * FROM dealer_products where PRODUCT_QUANTITY>0
";

$statement = $connect->prepare($query);

if($statement->execute())
{
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '
  <div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:430px;" align="center">
                 <img src="productimages/'.$row['PRODUCT_ID'].'/'.$row['PRODUCT_IMAGE1'].'" style="height:60px;width:70px;" />
                                                
             <br />
             <h4 class="text-info">'.$row["PRODUCT_NAME"].'</h4>
             <h4 class="text-danger">$ '.$row["PRODUCT_PRICE"].'</h4>
             <input type="text" name="quantity" id="quantity'.$row["PRODUCT_ID"].'" class="form-control" value="1" />
             Available Quantity:  '.$row['PRODUCT_QUANTITY'].'
             <input type="hidden" name="hidden_quantity" id="quantity1'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_QUANTITY"].'" />
             <input type="hidden" name="hidden_name" id="name'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_NAME"].'" />
             <input type="hidden" name="hidden_price" id="price'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_PRICE"].'" />
             <input type="button" name="add_to_cart" id="'.$row["PRODUCT_ID"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
  ';
 }
 echo $output;
}
*/
?>
<?php

//fetch_item.php

include('database_connection.php');

$query = "
SELECT * FROM dealer_products where PRODUCT_QUANTITY>0
";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
		<div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:430px;" align="center">
                 <img src="productimages/'.$row['PRODUCT_ID'].'/'.$row['PRODUCT_IMAGE1'].'" style="height:60px;width:70px;" />
                                                
             <br />
            	<h4 class="text-info">'.$row["PRODUCT_NAME"].'</h4>
            	<h4 class="text-danger">$ '.$row["PRODUCT_PRICE"].'</h4>
            	<input type="text" name="quantity" id="quantity'.$row["PRODUCT_ID"].'" class="form-control" value="1" />
            	Available Quantity:  '.$row['PRODUCT_QUANTITY'].'
                <input type="hidden" name="hidden_comapany" id="company'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_COMPANY"].'" />
                <input type="hidden" name="hidden_description" id="description'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_DESCRIPTION"].'" />
                <input type="hidden" name="hidden_volume" id="volume'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_VOLUME"].'" />
                <input type="hidden" name="hidden_unit" id="unit'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_UNIT"].'" />
                <input type="hidden" name="hidden_price" id="price'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_PRICE"].'" />
                <input type="hidden" name="hidden_subcategory" id="subcategory'.$row["PRODUCT_ID"].'" value="'.$row["SUBCATEGORY_ID"].'" />
                <input type="hidden" name="hidden_category" id="category'.$row["PRODUCT_ID"].'" value="'.$row["CATEGORY_ID"].'" />
                <input type="hidden" name="hidden_quantity" id="quantity1'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_QUANTITY"].'" />
            	<input type="hidden" name="hidden_name" id="name'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_NAME"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["PRODUCT_ID"].'" value="'.$row["PRODUCT_PRICE"].'" />
            	<input type="button" name="add_to_cart" id="'.$row["PRODUCT_ID"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
		';
	}
	echo $output;
}

?>
