<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");//設定連線
$mongoid=$_GET['_id'];
$filter = ['_id' => ['$eq' => new MongoDB\BSON\ObjectId("$mongoid")]];//查詢條件
//$filter = ['_id' => ['$eq' => $_GET['_id']]];
$query = new MongoDB\Driver\Query($filter);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Opet', $query);//設定指標變數:查詢變數指向哪個db哪個collection
//顯示資料
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
	/*if($doc['isAdopted']==True)
	{
		$isAdopted="是";
	}
	else
		$isAdopted="否";
	 //var_dump($document);*/
}


?>