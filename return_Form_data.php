<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$animal_id=$_GET['animal_id'];
$filter = ['animal_id' => $animal_id];//查詢條件
$query = new MongoDB\Driver\Query($filter);
$cursor = $manager->executeQuery('mydb.adoption_form', $query);//設定查詢變數
$a=$cursor->isDead();
		if($a==true)
		{echo "錯誤";}
		else
		{
			//顯示資料
			foreach ($cursor as $document) 
			{
				//設定$doc為陣列才能一一顯示值
				$doc = (array)$document;
				$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
				$bulk->update(['animal_id' =>$animal_id],['$set'=>['success' => "False"]]);//寫入資料設定			   
				$manager->executeBulkWrite('mydb.adoption_form', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
				
				$filterO=['_id' => ['$eq' => new MongoDB\BSON\ObjectId("$animal_id")],'adopted' =>"True"];
				$queryO = new MongoDB\Driver\Query($filterO);//設定查詢變數
				$cursorO = $manager->executeQuery('mydb.Opet', $queryO);
				$a=$cursor->isDead();
				if($a==true){print_r("錯誤");}
				foreach ($cursorO as $document) 
				{
					$b = new MongoDB\Driver\BulkWrite; //設定寫入變數
					$b->update(['_id' => ['$eq' => new MongoDB\BSON\ObjectId("$animal_id")]],['$set'=>['adopted' => "False"]]);//寫入資料設定			   
					$manager->executeBulkWrite('mydb.Opet', $b);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
				}
			}
		}
echo '<script>location.replace("user_foster.php");</script>';
?>