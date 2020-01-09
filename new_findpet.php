<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/new_animal_info.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<button class="back_foranother" onclick="javascript:history.back()">返回</button>
		<div class="context">
			<form action="insert_findpet_data.php" enctype="multipart/form-data" method="post">
				
			<div class="title">動物基本資料</div>
			<p>動物姓名: <input type="text" name="pet_name" required></p><br>
			<p>動物品種:<input type="text" name="pet_breed" required></p><br>
			<p>動物特徵:<br><textarea type="text" cols="40" rows="5" name="pet_feature"></textarea></p><br>
			<p>遺失地區:<input type="text"  name="lost_area" ></p><br>
			<p>聯絡方式:<input type="text" name="connection"></p><br>
			<input name="img" size="35" type="file" required><br/>
			<button class="submit">送出</button>
			</form>
		</div>

	</body>
</html>