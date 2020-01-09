<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$animal_id=$_GET['animal_id'];
$adoption_people=$_GET['adoption_people'];
$filter=['animal_id' =>$animal_id,'adoption_people' =>$adoption_people,'success' =>"False"];
$query = new MongoDB\Driver\Query($filter);//設定查詢變數
$cursor = $manager->executeQuery('mydb.adoption_form', $query);
$a=$cursor->isDead();
if($a==true){print_r("錯誤");}
else
{
	foreach ($cursor as $document) 
	{
		$doc = (array)$document;
	//	$ID=$document->{'animal_id'}->__toString();
		$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
		$bulk->update(['animal_id' =>$animal_id],['$set'=>['success' => "True"]]);//寫入資料設定			   
		$manager->executeBulkWrite('mydb.adoption_form', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
		
		$filterO=['_id' => ['$eq' => new MongoDB\BSON\ObjectId("$animal_id")],'adopted' =>"False"];
		$queryO = new MongoDB\Driver\Query($filterO);//設定查詢變數
		$cursorO = $manager->executeQuery('mydb.Opet', $queryO);
		$a=$cursor->isDead();
		if($a==true){print_r("錯誤");}
		foreach ($cursorO as $document) 
		{
			$b = new MongoDB\Driver\BulkWrite; //設定寫入變數
			$b->update(['_id' => ['$eq' => new MongoDB\BSON\ObjectId("$animal_id")]],['$set'=>['adopted' => "True"]]);//寫入資料設定			   
			$manager->executeBulkWrite('mydb.Opet', $b);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
		}
		
	}

}
echo '<script>location.replace("user_foster.php");</script>';
?>