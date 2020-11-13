 <?php
 
include "../Models/Model_Stocks.php";

$db = new Model_Stocks();
$rows = array();
$post = json_decode(file_get_contents("php://input"), true);
	

$getDataStocks = $db->getStocks();
						
if ($getDataStocks != null ) {
							
while ($row = $getDataStocks->fetch_assoc()) {										
						
 $rows[] = $row;				
	
}

$return = array(
				"status_code" => 200,
				"status_message" => "Success",
				"stocks" => $rows
				);		
				
} else {
							
$return = array(
				"status_code" => 404,
				"status_message" => "Belum ada Data",
				"stocks" => []
				);
}
                  

 echo json_encode($return);
					
					
					
?>