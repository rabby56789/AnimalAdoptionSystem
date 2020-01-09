<?php
session_start();
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
if(empty($_SESSION['account']))
{
	echo '<script>alert("請先登入");</script>';
	header("refresh:0;url=index.php");
}
else
{
	if(empty($_POST))
	{header("refresh:0;url=user_index.php");}
	else
	{
	$bulk->insert(['animal_owner' => $_POST['animal_owner'],//送養動物的人(account)
			       'animal_id' => $_POST['animal_id'],
				   'pet_type' => $_POST['pet_type'],
				   'pet_name' => $_POST['pet_name'],
				   'img' => $_POST['img'],
				   'adoption_people' => $_SESSION['account'],//表單申請人(登入者帳號)
				   'user_name' => $_POST['user_name'],
				   'age' => $_POST['age'],
				   'gender' => $_POST['gender'],
				   'IDNumber' => $_POST['IDNumber'],
				   'account' => $_POST['account'],
				   'address' => $_POST['address'],
				   'phone' => $_POST['phone'],
				   'success' =>"False",
				   ]);
	$manager->executeBulkWrite('mydb.adoption_form', $bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);

	$recive=$_POST['animal_owner'];//送養者(收信人)
	$url='https://formspree.io/'.$recive;
		echo '
			<form name="auto" action="';echo $url;echo '" method="post">	
				<input type="hidden" name="此信件來自-動物流浪領養系統" value="一則動物領養申請通知">
				<input type="hidden" name="被申請動物id" value="';print_r($_POST['animal_id']);echo '">
				<input type="hidden" name="類別" value="';print_r($_POST['pet_type']);echo '">
				<input type="hidden" name="品種" value="';print_r($_POST['pet_name']);echo '">
				<input type="hidden" name="申請人帳號" value="';print_r($_SESSION['account']);echo '">
				<input type="hidden" name="申請人姓名" value="';print_r($_POST['user_name']);echo '">
				<input type="hidden" name="申請人年齡" value="';print_r($_POST['age']);echo '">
				<input type="hidden" name="申請人性別" value="';print_r($_POST['gender']);echo '">
				<input type="hidden" name="身分證ID" value="';print_r($_POST['IDNumber']);echo '">
				<input type="hidden" name="地址" value="';print_r($_POST['address']);echo '">
				<input type="hidden" name="連絡電話" value="';print_r($_POST['phone']);echo '">
				
			</form>';
		echo '<script>auto.submit();</script>';
	}
}
//echo '<script>alert("註冊成功");</script>';
//header("refresh:0;url=index.php");
?>