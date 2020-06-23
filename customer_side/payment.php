<?php
session_start();

include('./include/database.php');

if(strlen($_SESSION['login'])==0)
	{	
header('location:loginSignUp1.php');
}
$cid=$_SESSION['id'];
?>

<?php

//payment.php

include('database_connection.php');
include_once './includes/config.php';
session_start();

if(isset($_POST["token"]))
{
	require_once 'vendor/autoload.php';

	\Stripe\Stripe::setApiKey('sk_test_hkxqcb4UokBwdOfEtD1FnspG00b60jX2cU');

	$customer = \Stripe\Customer::create(array(
		'email'			=>	$_POST["email_address"],
		'source'		=>	$_POST["token"],
		'name'			=>	$_POST["customer_name"],
		'address'		=>	array(
			'line1'			=>	$_POST["customer_address"],
			'postal_code'	=>	$_POST["customer_pin"],
			'city'			=>	$_POST["customer_city"],
			'state'			=>	$_POST["customer_state"],
			'country'		=>	'US'
		)
	));

	$order_number = rand(100000,999999);

	$charge = \Stripe\Charge::create(array(
		'customer'		=>	$customer->id,
		'amount'		=>	$_POST["total_amount"] * 100,
		'currency'		=>	$_POST["currency_code"],
		'description'	=>	$_POST["item_details"],
		'metadata'		=> array(
			'order_id'		=>	$order_number
		)
	));

	$response = $charge->jsonSerialize();

	if($response["amount_refunded"] == 0 && empty($response["failure_code"]) && $response['paid'] == 1 && $response["captured"] == 1 && $response['status'] == 'succeeded')
	{
		$amount = $response["amount"]/100;

		$order_data = array(
			':order_number'			=>	$order_number,
			':order_total_amount'	=>	$amount,
			':transaction_id'		=>	$response["balance_transaction"],
			':card_cvc'				=>	$_POST["card_cvc"],
			':card_expiry_month'	=>	$_POST["card_expiry_month"],
			':card_expiry_year'		=>	$_POST["card_expiry_year"],
			':order_status'			=>	$response["status"],
			':card_holder_number'	=>	$_POST["card_holder_number"],
			':email_address'		=>	$_POST['email_address'],
			':customer_name'		=>	$_POST["customer_name"],
			':customer_address'		=>	$_POST['customer_address'],
			':customer_city'		=>	$_POST['customer_city'],
			':customer_pin'			=>	$_POST['customer_pin'],
			':customer_state'		=>	$_POST['customer_state'],
			':customer_country'		=>	$_POST['customer_country'],
                        ':customer_area'                =>      $_POST['customer_area']
		);
                
		$query = "
		INSERT INTO order_table 
    	(order_number, order_total_amount, transaction_id, card_cvc, card_expiry_month, card_expiry_year, order_status, card_holder_number, email_address, customer_name, customer_address, customer_city, customer_pin, customer_state, customer_country,customer_area) 
    	VALUES (:order_number, :order_total_amount, :transaction_id, :card_cvc, :card_expiry_month, :card_expiry_year, :order_status, :card_holder_number, :email_address, :customer_name, :customer_address, :customer_city, :customer_pin, :customer_state, :customer_country,:customer_area)
		";

		$statement = $connect->prepare($query);

		$statement->execute($order_data);

		$order_id = $connect->lastInsertId();

		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			$order_item_data = array(
				':order_id'		=>	$order_id,
				':order_item_name'	=>	$values["product_name"],
				':order_item_quantity' => $values["product_quantity"],
				':order_item_price'	=>	$values["product_price"],
                                ':order_item_dealerid'	=>	$values["product_dealerid"],
                                ':order_item_company'  => $values["product_company"],
                                ':order_item_description'  => $values['product_description'],
                                ':order_item_volume'  => $values['product_volume'],
                                ':order_item_unit' => $values['product_unit'],
                                ':order_item_subcategory' => $values['product_subcategory'],
                                ':order_item_category'  => $values['product_category']
			);
                        $uid=$_SESSION['id'];
                        $year = date("Y");
                        $month=date("F");
                        
			$query = "
			INSERT INTO order_item_customer
			(order_id, order_item_name, order_item_quantity, order_item_price,order_item_dealerid,order_item_company,order_item_description,order_item_volume,order_item_unit,order_item_subcategory,order_item_category,order_item_customerid,year,month) 
			VALUES (:order_id, :order_item_name, :order_item_quantity, :order_item_price, :order_item_dealerid ,:order_item_company, :order_item_description, :order_item_volume, :order_item_unit, :order_item_subcategory, :order_item_category,'$uid','$year','$month')
			";

			$statement = $connect->prepare($query);

			$statement->execute($order_item_data);
                        
		}
                
                mysqli_query($con,"delete from cart where cid='$cid'");
		unset($_SESSION["shopping_cart"]);

		$_SESSION["success_message"] = "Payment is completed successfully. The TXN ID is " . $response["balance_transaction"] . "";
		header('location:index1.php');
	}

}

?>