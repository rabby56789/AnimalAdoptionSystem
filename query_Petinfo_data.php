<?php
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$mongoid=$_GET['_id'];
$filter = ['_id' => ['$eq' => new MongoDB\BSON\ObjectId("$mongoid")]];//查詢條件
//$filter = ['_id' => ['$eq' => $_GET['_id']]];
$query = new MongoDB\Driver\Query($filter);//設定查詢變數
$cursor = $manager->executeQuery('mydb.Opet', $query);//設定指標變數:查詢變數指向哪個db哪個collection
$a=$cursor->isDead();
if($a==true)
{
	$doc['isAdopted']="Error";
	$doc['pet_type']="Error";
	$doc['pet_name']="Error";
	$doc['gender']="Error";
	$doc['pet_old']="Error";
	$doc['area']="Error";
	$doc['case']="Error";
	$doc['chip_no']="Error";
	$doc['condition']="Error";
	$doc['img']="Error";
}
else
{
//顯示資料
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
	$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
	/*if($doc['isAdopted']==True)
	{
		$isAdopted="是";
	}
	else
		$isAdopted="否";
	 //var_dump($document);*/
}
}

?>