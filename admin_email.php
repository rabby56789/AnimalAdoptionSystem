<?php
$account=$_POST['account'];
$time=date("Y-m-d H:i:s");
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線


if(preg_match("/所有人/i", $account))
{
	$filter = [];
	$query = new MongoDB\Driver\Query($filter);
	$cursor = $manager->executeQuery('mydb.Userinfo',$query);
	foreach ($cursor as $document){
		$doc = (array)$document;
		$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
		$bulk->insert(['account' => $doc['account'],//使用者登陸後儲存使用者id之類的常用資料。一旦儲存到SESSION中，其他頁面都可以通過SESSION獲取,SESSION的使用要開啟session
					   'from' => '毛毛管理員',//寫入資料設定
					   'title' => $_POST['title'],
					   'message' => $_POST['message'],
					   'time' => $time
					  
					   ]);
		$manager->executeBulkWrite('mydb.email', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
	}
	echo '寄給所有人';
	
}
else{
//session_start();
	$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
	$bulk->insert(['account' => $_POST['account'],
				   'from' => '毛毛管理員',//寫入資料設定
				   'title' => $_POST['title'],
				   'message' => $_POST['message'],
					'time' => $time
				   ]);
	$manager->executeBulkWrite('mydb.email', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
	echo '新增成功';
}
echo '<script>location.replace("new_message_info.php");</script>';


?>