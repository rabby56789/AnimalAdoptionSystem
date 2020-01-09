<?php
//session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$filter = ['adoption_people' => ['$eq' => $_SESSION['account']],'success' => "True"];//查詢條件
$query = new MongoDB\Driver\Query($filter);//設定查詢變數
$cursor = $manager->executeQuery('mydb.adoption_form', $query);//設定指標變數:查詢變數指向哪個db哪個collection

foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值A 
	$doc = (array)$document;
	$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
	
	echo '<div class="a_animal">';
	echo	'<a href="animal_info.php?_id=';print_r($doc['animal_id']);echo '"><img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
	echo	'<p id="pet_id">類別：';print_r($doc['pet_type']);echo'</p>';
	echo	'<p>品種：';print_r($doc['pet_name']);echo'</p>';
	//echo	'<p>地區：';print_r($doc['area']);echo'</p>';
	//echo	'<p>是否開放認養：';print_r($doc['isAdopted']);echo'</p>';
	//echo	'<p>_ID：';print_r($doc['_id']);echo'</p>';
	echo	'</div>';
}

?>