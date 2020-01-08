<!DOCTYPE html>
<?php include 'query_Petinfo_data.php';?>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>申請認養頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/adoption_form.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<button class="back" onclick="javascript:history.back()">返回</button>
		<?php 
		$recive=$doc['account'];//送養者(收信人)
		$url='https://formspree.io/'.$recive;
		echo '<div class="context_left">
			<form action="insert_adoption_form.php" method="post">	
				<div class="title">個人基本申請資料</div>
				<input type="hidden" name="animal_owner" value="';print_r($doc['account']);echo '">
				<input type="hidden" name="animal_id" value="';print_r($ID);echo '">
				<input type="hidden" name="pet_type" value="';print_r($doc['pet_type']);echo '">
				<input type="hidden" name="pet_name" value="';print_r($doc['pet_name']);echo '">
				<input type="hidden" name="img" value="';print_r($doc['img']);echo '">
				<p>姓名: <input type="text" name="user_name" required></p><br>
				<p>出生日期: <input type="date" name="age" required></p><br>
				<p>性別：<input class="radio" type="radio" value="男" name="gender">男<input  class="radio" type="radio" value="女" name="gender" checked>女
				<p>身分證字號: <input type="text" name="IDNumber" required></p><br>
				<p>信箱(Email): <input type="email" name="account" required></p><br>
				<p>住址: <input type="text" name="address" required></p><br>
				<p>電話: <input type="text" name="phone" required></p><br>
				<input type="submit" value="Send">
			</form>
		</div>';
		?>
		<div class="context">
			<div class="title">動物基本資料</div>
			<p>是否開放認養:<?php print_r($doc['isAdopted'])?></p><br>
			<p>動物類別:<?php print_r($doc['pet_type'])?></p><br>
			<p>動物品種:<?php print_r($doc['pet_name'])?></p><br>
			<p>動物性別:<?php print_r($doc['gender'])?></p><br>
			<p>動物年齡:<?php print_r($doc['pet_old'])?></p><br>
			<p>地區:<?php print_r($doc['area'])?></p><br>
			<p>病例:<?php print_r($doc['case'])?></p><br>
			<p>晶片號碼:<?php print_r($doc['chip_no'])?></p><br>
			<p>認養條件:<?php print_r($doc['condition'])?></p><br>
		</div>
		<?php echo 
			'<div class="img">
				<img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png">
					</div>';
		?>
	</body>
</html>