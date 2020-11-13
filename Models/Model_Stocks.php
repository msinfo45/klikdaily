<?php

class Model_Stocks
{

    private $conn;

 
    function __construct()
    {
        include "../Config/db.php";
		
        $this->conn = $conn;

    }

 
    function __destruct()
    {

    }


public function getStocks()
{

	$query = $this->conn->query("SELECT 
								lc.location_id as id,
								lc.location,
								p.quantity,
								p.product
								FROM
								products AS p 
								LEFT JOIN location AS lc
								ON lc.product_id = p.product_id
								");

if (mysqli_num_rows($query) > 0)
{
	return $query;
}
else
{
	return null;
}

}

public function insertLogs($location_id ,$location_name,$product , $adjustment, $quantity)
{

	$query = $this->conn->query("INSERT INTO logs 
										(location_id,
										location_name,
										product
										) 
									VALUES 
										('" . $location_id . "',
										'" . $location_name . "',
										'" . $product . "'
										) 
								");
if ($query)
{
			$log_id = $this->conn->insert_id;

			if (!preg_match('#[^0-9]#',$adjustment)) {
				
			$type = "Inbound";
			
			}else{
				
			$type = "Outbound";	
				
			}
			$insertDetailLogs = $this->conn->query("INSERT INTO log_details 
										(log_id,
										type,
										adjustment,
										quantity,
										created_at
										) 
									VALUES 
										('" . $log_id . "',
										'" . $type . "',
										'" . $adjustment . "',
										'" . $quantity . "',
										'" . date("Y-m-d H:i:s") . "'
										) 
								");
								
	return true;
}
 else
{
	return false;
}


}


public function setAdjustment($product , $adjustment)
{

	$query = $this->conn->query("UPDATE products 
								SET quantity =  quantity + '" . $adjustment . "' 
								Where product = '" . $product . "'");


  if(mysqli_affected_rows($this->conn) > 0 ) 
        {
          $getProduct = $this->conn->query("SELECT 
								lc.location_id as id,
								lc.location as location_name,
								p.quantity as stock_quantity,
								p.product
								FROM
								products AS p 
								LEFT JOIN location AS lc
								ON lc.product_id = p.product_id
								Where p.product = '" . $product . "' 
								");
 
		   return $getProduct;

        }
        else
        {
            return false;
        }

}









}




?>