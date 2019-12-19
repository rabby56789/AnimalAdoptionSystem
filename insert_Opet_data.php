<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");//設定連線
$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
$bulk->insert(['user_name' => $_SESSION['user_name'],//使用者登陸後儲存使用者id之類的常用資料。一旦儲存到SESSION中，其他頁面都可以通過SESSION獲取,SESSION的使用要開啟session
			   'pet_type' => $_POST['pet_type'],//寫入資料設定
			   'pet_name' => $_POST['pet_name'],
			   'gender' => $_POST['gender'],
			   'pet_old' => $_POST['pet_old'],
			   'area' => $_POST['area'],
			   'case' => $_POST['case'],
			   'chip_no' => $_POST['chip_no'],
			   'condition' => $_POST['condition'],
			   'isAdopted' => $_POST['isAdopted']
			   ]);
$manager->executeBulkWrite('mydb.Opet', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);

echo '<script>location.replace("user_foster.php");</script>';

?>