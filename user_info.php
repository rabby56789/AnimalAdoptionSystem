<!DOCTYPE html>
<?php include 'query_Userinfo_data.php'?>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/user_info.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="context">
		<!--edit user info-->
		<form action="edit_userInfo.php" method="post">
			<div class="title">個人基本資料<input type="submit" name="editUserInfo" value="EDIT"/></div>
			<p>姓名:<?php print_r($doc['user_name'])?></p><br>
			<p>電子郵件:<?php print_r($doc['account'])?></p><br>
			<p>地址:<?php print_r($doc['address'])?></p><br>
			<p>電話:<?php print_r($doc['phone'])?></p><br>
			<p>性別:<?php print_r($doc['gender'])?></p><br>
			<p>身分證字號:<?php print_r($doc['IDNumber'])?></p><br>
		</form>
		</div>
	</body>
</html>