<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");//設定連線
$filter = ['account' => ['$eq' => $_SESSION['account']]];//查詢條件
$query = new MongoDB\Driver\Query($filter);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Userinfo', $query);//設定指標變數:查詢變數指向哪個db哪個collection
//顯示資料
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
}
?>