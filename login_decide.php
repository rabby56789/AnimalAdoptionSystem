<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$filter = ['account' => ['$eq' => $_POST['account']],'psd' => ['$eq' => $_POST['psd']]];
$query = new MongoDB\Driver\Query($filter);
$cursor = $manager->executeQuery('mydb.Userinfo', $query);
$a=$cursor->isDead();//判斷是否有搜尋結果
foreach ($cursor as $document) {
	//設定$doc為陣列才能一一顯示值
	$doc = (array)$document;
}
//$iterator = new IteratorIterator($cursor);
//$iterator->valid();

if($a==false)
{
	//var_dump($a);
	$_SESSION['account']=$_POST['account'];
	$_SESSION['user_name']=$doc['user_name'];
	
	print_r($_SESSION['user_name']);
	header("refresh:0;url=index.php");
}
else
{
	print_r("帳號或密碼錯誤");
}


