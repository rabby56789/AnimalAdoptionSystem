<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>申請認養頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/create_account.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<button class="back" onclick="javascript:history.back()">返回</button>
		<div class="context">
		<form  action="confirm_data.php" enctype="multipart/form-data" method="post">
		
			<div class="title">註冊信箱</div>
			<p>信箱(Email): <input type="email" name="account" required></p><br>
			<input class="submit" type="submit" name="sendBtn" value="確認送出"/>
			
		</form>
</div>
	</body>
</html>