<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>註冊頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/user_register.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<button class="back" onclick="javascript:history.back()">返回</button>
		<div class="context">
			<form action="insert_Userinfo_data.php" method="post">	
			<div class="title">個人基本資料</div>
			<p>姓名: <input type="text" name="user_name" required></p><br>
			<p>匿名: <input type="text" name="nName" required></p><br>
			<p>性別：<input class="radio" type="radio" value="男" name="gender">男<input class="radio" type="radio" value="女" name="gender" checked>女
			<p>身分證字號: <input type="text" name="IDNumber" required></p><br>
			<p>帳號(Email): <input type="email" name="account" required></p><br>
			<p>密碼: <input type="password" name="psd" required></p><br>
			<p>住址: <input type="text" name="address" required></p><br>
			<p>電話: <input type="text" name="phone" required></p><br>
			<button  class="submit">送出</button>
			</form>
		</div>

	</body>
</html>