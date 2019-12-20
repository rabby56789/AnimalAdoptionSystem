<?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");//設定連線
$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
if($_POST['user_name']=='A')
{
	print_r('Error');
}
$bulk->insert(['user_name' => $_POST['user_name'],//使用者登陸後儲存使用者id之類的常用資料。一旦儲存到SESSION中，其他頁面都可以通過SESSION獲取,SESSION的使用要開啟session
			   'nName' => $_POST['nName'],//寫入資料設定
			   'gender' => $_POST['gender'],
			   'IDNumber' => $_POST['IDNumber'],
			   'account' => $_POST['account'],
			   'psd' => $_POST['psd'],
			   'address' => $_POST['address'],
			   'phone' => $_POST['phone']
			   ]);
$manager->executeBulkWrite('mydb.Userinfo', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);

echo '<script>alert("註冊成功");</script>';
header("refresh:0;url=index.php");
?>