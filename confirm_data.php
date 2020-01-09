<!DOCTYPE html>
<?php
 session_start();
	if(!empty($_POST['number']) && !empty($_COOKIE['confirmNum']) ){
		if($_POST['number'] == $_COOKIE["confirmNum"]){			

			echo '<script>alert("驗證碼正確");</script>';
			header("refresh:0;url=user_register.php");
		}
		else{
			echo '<script>alert("驗證碼錯誤");</script>';
		}
	}
	//been registered
	if(!empty($_POST['account'])){
		$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
		$filter = ['account' => ['$eq' => $_POST['account']]];//查詢條件
		$query = new MongoDB\Driver\Query($filter);//設定查詢變數
		$cursor = $manager->executeQuery('mydb.Userinfo', $query);//設定指標變數:查詢變數指向哪個db哪個collection
		//顯示資料
		foreach ($cursor as $document) {
			//設定$doc為陣列才能一一顯示值
			$doc = (array)$document;
			if(!empty($doc)){
				echo '<script>alert("帳號已註冊");</script>';
				header("refresh:0;url=create_account.php");
			}
		}
	}
?>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>申請認養頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/confirm_data.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<button class="back" onclick="javascript:history.back()">返回</button>
		<div class="context">
		<form  action="confirm_data.php" enctype="multipart/form-data" method="post">
			<br>驗證碼: <input style="width: 500px;"  type="text" name="number" required>
			<input class="submit" type="submit" name="sendBtn" value="確認"/><br><br><br>
		</form>
		</div>
		
<?php //$recive=$_POST['account'];

		if(!empty($_POST['account'])){
			$confirmNum = rand();
			setcookie("confirmNum",$confirmNum ,time()+600);
			$_SESSION['confirm_account']= $_POST['account'];
			$account=$_POST['account'];
			$url='https://formspree.io/'.$account;
			echo '<div class="context">
				<form target="_blank" action="';echo $url;echo '" method="post">
				<input type="hidden" name="驗證碼" value=';echo$confirmNum;echo' />
				<input class="submit_sure" type="submit" value="送出驗證碼">
				</form>
			</div>';
		}
?>
	</body>
</html>