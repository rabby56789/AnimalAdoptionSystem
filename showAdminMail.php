<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面-收信夾--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/showAdminMail.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="admin_receive" style="overflow-x:hidden;overflow-y:auto;;height:423px;">
			
			<?php
				session_start();
				$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
						
						$filter = ['account' => "rabby56789@gmail.com"];//查詢條件
						$options = ['sort' =>['time' => -1],];//排順序先PO的先上
						$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
						$cursor = $manager->executeQuery('mydb.email', $query);//設定指標變數:查詢變數指向哪個db哪個collection
						foreach ($cursor as $document) {
							//設定$doc為陣列才能一一顯示值
							$doc = (array)$document;
							//$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
							
							echo '<div class="information"><details>';
							
							echo	'<p id="messenger"><summary>標題：';print_r($doc['title']);echo'</summary></p>';
							echo	'<p>寄件人：';print_r($doc['from']);echo'</p>';
							echo	'<p>內容：';echo'</p>';echo	'<p>';print_r($doc['message']);echo'</p>';
							echo	'<p>時間：';print_r($doc['time']);echo'</p>';
							//echo	'<p>_ID：';print_r($doc['_id']);echo'</p>';
							echo	'</div></details>';
				}
			?>
			
		</div>
	</body>
</html>