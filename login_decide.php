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
	$admin=$doc['admin'];
}
if($a==false)
{	$_SESSION['account']=$_POST['account'];
	$_SESSION['user_name']=$doc['user_name'];
	$_SESSION['admin']=$admin;
	if($admin=="True")//判斷是否為管理員
	{header("refresh:0;url=admin.php");}
	else
	{header("refresh:0;url=index.php");}	
}
else
{
	echo '<script>alert("帳號或密碼錯誤");</script>';
	header("refresh:0;url=index.php");
}


