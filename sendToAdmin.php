<?php
session_start();
$time=date("Y-m-d H:i:s");
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線

$filter = ['admin' => "True"];//查詢條件
$query = new MongoDB\Driver\Query($filter);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Userinfo', $query);//設定指標變數:查詢變數指向哪個db哪個collection
//顯示資料
	//設定$doc為陣列才能一一顯示值
	foreach ($cursor as $document){
		$doc = (array)$document;
		$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
		$bulk->insert(['account' => $doc['account'],//使用者登陸後儲存使用者id之類的常用資料。一旦儲存到SESSION中，其他頁面都可以通過SESSION獲取,SESSION的使用要開啟session
					   'from' => $_SESSION['account'],//寫入資料設定
					   'title' => $_POST['title'],
					   'message' => $_POST['message'],
					   'time' => $time 
					   ]);
		$manager->executeBulkWrite('mydb.email', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
		echo '送出成功，待管理員回復';
	}
echo '<script>location.replace("sendToAdminView.php");</script>';
?>