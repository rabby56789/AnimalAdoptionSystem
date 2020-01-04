<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");
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
}
else
{
	echo '<script>alert("帳號或密碼錯誤");</script>';
	//print_r("帳號或密碼錯誤");
}
header("refresh:0;url=index.php");

