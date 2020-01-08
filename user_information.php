<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$filter = ['account' => ['$eq' => $_SESSION['account']]];//查詢條件
$options = ['sort' =>['time' => -1],];//排順序先PO的先上
$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
$cursor = $manager->executeQuery('mydb.email', $query);//設定指標變數:查詢變數指向哪個db哪個collection

foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
	$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
	
	echo '<div class="information">';
	
	echo	'<p id="messenger">標題：';print_r($doc['title']);echo'</p>';
	echo	'<p>寄件人：';print_r($doc['from']);echo'</p>';
	echo	'<p>內容：';echo'</p>';echo	'<p>';print_r($doc['message']);echo'</p>';
	echo	'<p>時間：';print_r($doc['time']);echo'</p>';
	echo	'<p>-------------------------------------------</p>';
	//echo	'<p>_ID：';print_r($doc['_id']);echo'</p>';
	echo	'</div>';
}

?>