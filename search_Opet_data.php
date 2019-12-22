<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");//設定連線
//不拘和全選之處理
if($_POST['gender']=="*")
{
	$_POST['gender']=['$ne' => $_POST['gender']];
}
if($_POST['pet_type']=="*")
{
	$_POST['pet_type']=['$ne' => $_POST['pet_type']];
}
if($_POST['pet_name']=="")
{
	$_POST['pet_name']=['$ne' => $_POST['pet_name']];
}
if($_POST['area']=="*")
{
	$_POST['area']=['$ne' => $_POST['area']];
}
//查詢條件
$filter = ['gender' => $_POST['gender'],
		   'pet_type' =>$_POST['pet_type'],
		   'pet_name' =>$_POST['pet_name'],
		   'area' =>$_POST['area']
		   ];
$options = [
			'sort' =>['add_time' => 1],//排順序先PO的先上
			];
$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Opet', $query);//設定指標變數:查詢變數指向哪個db哪個collection
$a=$cursor->isDead();//判斷查詢結果是否為空

if($a==true)
{
	print_r("查詢結果為空");
}
//顯示查詢資料
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
	$ID=$document->{'_id'}->__toString();
	echo '<div class="a_animal">';
	echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
	//echo	'<a href="query_Petinfo_data.php?_id=5df8d4b4df3c00008c0063d3"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
	echo	'<p id="pet_id">類別：';print_r($doc['pet_type']);echo'</p>';
	echo	'<p>品種：';print_r($doc['pet_name']);echo'</p>';
	echo	'<p>地區：';print_r($doc['area']);echo'</p>';
	echo	'<p>性別：';print_r($doc['gender']);echo'</p>';
	echo	'</div>';
		  
}


?>