<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面-二手用品--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/user_second_hand.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="foster_available" id="pet_list">
			<div class="foster_operation">
				<div class="foster_operation_left"><h4>可提供用品</h4></div>
				<div class="foster_operation_right">
					<button class="new" type="button" onclick="location.href='new_second.php'">新增</button>
				</div>
			</div>
			<?php 
			session_start();
			$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
			$filter = ['account' => ['$eq' => $_SESSION['account']]];//查詢條件
			//$filter=[];
			$options = ['sort' =>['add_time' => -1],];//排順序先PO的先上
			$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
			$cursor = $manager->executeQuery('mydb.second', $query);//設定指標變數:查詢變數指向哪個db哪個collection
			foreach ($cursor as $document) {
				//設定$doc為陣列才能一一顯示值
				$doc = (array)$document;
				$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
	
				echo '<div class="a_animal">';
				echo	'<img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
				echo	'<p id="pet_id">品項：';print_r($doc['item']);echo'</p>';
				echo	'<p>介紹：';print_r($doc['information']);echo'</p>';
				echo	'<p>地區：';print_r($doc['area']);echo'</p>';
				echo	'<p>聯絡方式：';print_r($doc['connection']);echo'</p>';
				echo	'<button type="button" onclick="location.href=';echo '\'';echo 'delete_second_data.php?_id=';print_r($ID);echo '\'">刪除</button>
						</div>';
						
				}?>
			
		</div>

		
		
		

		
	</body>
</html>