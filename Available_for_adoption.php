<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$filter = ['account' => ['$eq' => $_SESSION['account']],'adopted' => "False"];//查詢條件
$options = ['sort' =>['add_time' => -1],];//排順序先PO的先上
$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Opet', $query);//設定指標變數:查詢變數指向哪個db哪個collection

foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
	$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
	
	echo '<div class="a_animal">';
	echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
	//echo	'<a href="query_Petinfo_data.php?_id=5df8d4b4df3c00008c0063d3"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
	echo	'<p id="pet_id">類別：';print_r($doc['pet_type']);echo'</p>';
	echo	'<p>品種：';print_r($doc['pet_name']);echo'</p>';
	echo	'<p>地區：';print_r($doc['area']);echo'</p>';
	echo	'<p>是否開放認養：';print_r($doc['isAdopted']);echo'</p>';
	//echo	'<p>_ID：';print_r($doc['_id']);echo'</p>';
	echo	'<button type="button" onclick="location.href=';echo '\'';echo 'adoption_check.php?_id=';print_r($ID);echo '\'">已送養</button>
			 <button type="button" onclick="location.href=';echo '\'';echo 'delete_Opet_data.php?_id=';print_r($ID);echo '\'">刪除</button>
		  </div>';
}

?>