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
			<form action="insert_Opet_data.php" enctype="multipart/form-data" method="post">
				
			<div class="title">動物基本資料</div>
			<p>動物類別: <select name="pet_type">
						 <option value="狗">狗</option>
						 <option value="貓">貓</option>
						 <option value="倉鼠">倉鼠</option>
						 <option value="鳥類">鳥類</option>
						 <option value="其他">其他</option>
						 </select></p><br>
			<p>動物品種: <input type="text" name="pet_name" required></p><br>
			<p>動物性別:<input type="radio" value="男" name="gender" checked>男
						<input type="radio" value="女" name="gender">女
						<input type="radio" value="無法告知" name="gender">無法告知
						</p><br>
			<p>動物年齡: <input type="text" name="pet_old"></p><br>
			<p>地區:<select name="area">
					<option value="基隆市">基隆市</option>
					<option value="台北市">台北市</option>
					<option value="新北市">新北市</option>
					<option value="桃園市">桃園市</option>
					<option value="新竹市">新竹市</option>
					<option value="新竹縣">新竹縣</option>
					<option value="苗栗縣">苗栗縣</option>
					<option value="台中市">台中市</option>
					<option value="彰化縣">彰化縣</option>
					<option value="南投縣">南投縣</option>
					<option value="雲林縣">雲林縣</option>
					<option value="嘉義市">嘉義市</option>
					<option value="嘉義縣">嘉義縣</option>
					<option value="台南市">台南市</option>
					<option value="高雄市">高雄市</option>
					<option value="屏東縣">屏東縣</option>
					<option value="台東縣">台東縣</option>
					<option value="花蓮縣">花蓮縣</option>
					<option value="宜蘭縣">宜蘭縣</option>
					<option value="澎湖縣">澎湖縣</option>
					<option value="金門縣">金門縣</option>
					<option value="連江縣">連江縣</option>
					</select></p><br>
			<p>病例: <input type="text" name="case"></p><br>
			<p>晶片號碼: <input type="text" name="chip_no"></p><br>
			<p>認養條件: <input type="text" name="condition"></p><br>
			<p>是否開放送養：<input type="radio" value="是" name="isAdopted" required>是<input type="radio" value="否" name="isAdopted">否<br>
			<input name="img" size="35" type="file" required><br/>
			<button class="submit">送出</button>
			</form>
		</div>

	</body>
</html>