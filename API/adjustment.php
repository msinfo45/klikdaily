 <?php
 
include "../Models/Model_Stocks.php";

$db = new Model_Stocks();
$rows = array();
$post = json_decode(file_get_contents("php://input"), true);


if (isset($post)) {
	
foreach($post as $dataPost) {
	
$location_id = $dataPost['location_id'];	
$product = $dataPost['product'];	
$adjustment = $dataPost['adjustment'];		

$setAdjustment = $db->setAdjustment($product , $adjustment);
			
			
if ($setAdjustment != false) {
	
while ($row = $setAdjustment->fetch_assoc()) {										
						
 $rows[] = $row;
 $location_name =$row['location_name'];
// $product =$row['product'];
 $stock_quantity =$row['stock_quantity'];
	
}
$type = "inbon";
$insertLogs = $db->insertLogs($location_id ,$location_name,$product , $adjustment, $stock_quantity);



$post_data = array("status" => "Success",
					"updated_at" =>  date("Y-m-d H:i:s"),
					"location_id" => $location_id,
					"location_name" => $location_name,
					"product" => $product,
					"adjustment" => $adjustment,
					"stock_quantity" => $stock_quantity					
					);
				
}else{

$post_data = array("status" => "Failed",
					"error_message" => "Invalid Product",
					"updated_at" =>  date("Y-m-d H:i:s"),
					"location_id" => $location_id				
					);	
	
	
}


$result[] = $post_data;	
				
}



	


$return = array(
				"status_code" => 200,
				"request" => COUNT($post),
				"adjusted" => COUNT($post_data),
				"result" => $result
				);		
				
}else{
	
	
$return = array(
				"status_code" => 404,
				"status_message" => "Data yang anda masukan tidak lengkap"		
				);	
	
		
}
 


 echo json_encode($return);
					
					
					
?>