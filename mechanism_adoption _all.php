<?php
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$filter = [];//顯示全部動物
$options = ['sort' =>['animal_opendate' => 1],'limit' => 30,'skip' => $_SESSION['count']];
$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
$cursor = $manager->executeQuery('test.animals', $query);//設定指標變數:查詢變數指向哪個db哪個collection
$a=$cursor->isDead();//判斷查詢結果是否為空

if($a==true)
{
	echo '<p>查無結果</p>';
}
//顯示全部資料
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
	$ID=$document->{'_id'}->__toString();
	echo '<div class="a_animal">';
	echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['album_file']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
	echo	'<p id="pet_id">類別：';print_r($doc['animal_kind']);echo'</p>';
	echo	'<p>品種：';print_r($doc['animal_colour']);echo'</p>';
	echo	'<p>地區：';print_r($doc['shelter_name']);echo'</p>';
	echo	'<p>性別：';print_r($doc['animal_sex']);echo'</p>';
	echo    '<button type="button">申請認養</button>';
	echo	'</div>';
		  
}
//header("refresh:0;url=person_adoption.php");

?>