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
		<form  action="finish_edit_userInfo.php" enctype="multipart/form-data" method="post">
		
		
			<div class="title">個人基本資料</div>
			<p>姓名: <input type="text" name="user_name" required value='<?php echo $doc['user_name'];?>'></p><br>
			<p>匿名: <input type="text" name="nName"     required value='<?php echo $doc['nName'];?>'></p><br>
			<p>住址: <input type="text" name="address"   required value='<?php echo $doc['address'];?>'></p><br>
			<p>電話: <input type="text" name="phone"     required value='<?php echo $doc['phone'];?>'></p><br>
			<button class="submit">送出</button>
			</form>
		</div>
	</body>
</html>