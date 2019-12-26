<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$mongoid=$_GET['_id'];
$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
$bulk->delete(['_id' => ['$eq' => new MongoDB\BSON\ObjectId("$mongoid")]]);//寫入資料設定
			   
$manager->executeBulkWrite('mydb.Opet', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);

echo '<script>location.replace("user_foster.php");</script>';
?>