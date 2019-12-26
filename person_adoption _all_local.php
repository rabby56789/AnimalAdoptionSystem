<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");//設定連線
$filter = [];//顯示全部動物
$options = ['sort' =>['add_time' => 1],];
$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Opet', $query);//設定指標變數:查詢變數指向哪個db哪個collection
$a=$cursor->isDead();//判斷查詢結果是否為空

if($a==true)
{
	echo '<p>查無結果</p>';
}
//顯示全部資料
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
	$man = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");
	$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
	$bulk->insert(['account' => $_SESSION['account'],//使用者登陸後儲存使用者id之類的常用資料。一旦儲存到SESSION中，其他頁面都可以通過SESSION獲取,SESSION的使用要開啟session
			   'pet_type' => $doc['pet_type'],//寫入資料設定
			   'pet_name' => $doc['pet_name'],
			   'gender' => $doc['gender'],
			   'pet_old' => $doc['pet_old'],
			   'area' => $doc['area'],
			   'case' => $doc['case'],
			   'chip_no' => $doc['chip_no'],
			   'condition' => $doc['condition'],
			   'isAdopted' => $doc['isAdopted'],
			   'adopted' => $doc['adopted'],
			   'add_time' => $doc['add_time'],
			   'img' => $doc['img']
			   ]);
	$man->executeBulkWrite('mydb.Opet', $bulk);//設定連線
	
	$ID=$document->{'_id'}->__toString();
	echo '<div class="a_animal">';
	echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
	echo	'<p id="pet_id">類別：';print_r($doc['pet_type']);echo'</p>';
	echo	'<p>品種：';print_r($doc['pet_name']);echo'</p>';
	echo	'<p>地區：';print_r($doc['area']);echo'</p>';
	echo	'<p>性別：';print_r($doc['gender']);echo'</p>';
	echo    '<button type="button">申請認養</button>';
	echo	'</div>';
		  
}
//header("refresh:0;url=person_adoption.php");

?>