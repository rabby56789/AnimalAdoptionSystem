<?php
session_start();
if($_POST['sendBtn']){
	if($_POST['content'] != ""){
		$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
		$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
		$bulk->update(['announce' => ['$eq' => $_SESSION['tmpAnnounce']]],
		['$set'=>['announce' => $_POST['content']]]);//寫入資料設定
		$manager->executeBulkWrite('mydb.announcement', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);

		echo '<script>location.replace("index_content.php");</script>';
	}
	else{
		echo '<script>alert("沒有內容");</script>';
		echo '<script>location.replace("new_announcement.php");</script>';
	}
}
?>