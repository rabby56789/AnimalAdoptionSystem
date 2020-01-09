<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$filter = ['account' => ['$eq' => $_SESSION['account']]];//查詢條件
$query = new MongoDB\Driver\Query($filter);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Userinfo', $query);//設定指標變數:查詢變數指向哪個db哪個collection
//顯示資料
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;

	$mongoid=$_SESSION['account'];
	$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
	$bulk->update(['account' => ['$eq' => $_SESSION['account']]],
	['$set'=>['user_name' => $_POST['user_name'],//使用者登陸後儲存使用者id之類的常用資料。一旦儲存到SESSION中，其他頁面都可以通過SESSION獲取,SESSION的使用要開啟session
				   'nName' => $_POST['nName'],//寫入資料設定
				   'account' => $_SESSION['account'],
				   'address' => $_POST['address'],
				   'phone' => $_POST['phone'],
				   ]]);//寫入資料設定
	}			   
$manager->executeBulkWrite('mydb.Userinfo', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
echo '<script>alert("修改成功");</script>';
header("refresh:0;url=user_info.php");
?>