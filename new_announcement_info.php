<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>公告</title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="css/new_announcement_info.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="context">
		<div class="textArea">
			<form  action="insert_announcement_data.php" enctype="multipart/form-data" method="post">
				<h1>目前內容</h1>
				<!--<p>title: <input type="text" name="title"></p><br>
				-->
				<textarea name="content" cols="60" rows="10"  required><?php
				session_start();
								$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
								$filter = [];//查詢條件
						$query = new MongoDB\Driver\Query($filter);//設定查詢變數
						$cursor = $manager->executeQuery('mydb.announcement', $query);//設定指標變數:查詢變數指向哪個db哪個collection
						foreach ($cursor as $document) {
							//設定$doc為陣列才能一一顯示值
							$doc = (array)$document;
							print_r($doc['announce']);
							 $_SESSION['tmpAnnounce'] = $doc['announce'];
							}
							?></textarea>
				<input class="submit" type="submit" name="sendBtn" value="送出"/>
			</form>
			</div>
		</div>

	</body>
</html>