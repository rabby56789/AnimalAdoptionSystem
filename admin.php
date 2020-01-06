<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>管理頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="context">
			<div class="title">管理系統</div>
			<p>hi,<?php session_start();echo $_SESSION['user_name']?>管理員</p>
			<button type="button" onclick="location.href='index.php'">首頁</button>
			<button type="button" onclick="location.href='new_announcement_info.php'">新增公告</button>			
			<button type="button" onclick="location.href='admin_user.php'">會員管理</button>
			<button type="button" onclick="location.href='admin_pet.php'">動物管理</button>
			<button type="button"></button>
		</div>
	</body>
</html>