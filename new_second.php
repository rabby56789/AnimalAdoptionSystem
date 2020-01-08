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
		<button class="back" onclick="javascript:history.back()">返回</button>
		<div class="context">
			<form action="insert_second_data.php" enctype="multipart/form-data" method="post">
				
			<div class="title">二手用品</div>
			<p>品項: <input type="text" name="item" required></p><br>
			<p>介紹:<textarea type="text" cols="80" rows="20" name="information"></textarea></p><br>
			<p>地區:<input type="text"  name="area" ></p><br>
			<p>聯絡方式:<input type="text" name="connection"></p><br>
			<input name="img" size="35" type="file" required><br/>
			<button class="submit">送出</button>
			</form>
		</div>

	</body>
</html>