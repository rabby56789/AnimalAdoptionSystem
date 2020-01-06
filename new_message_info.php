
<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>公告</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/adminView.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<!--<button class="back" onclick="javascript:history.back()">返回</button>
		-->
		<div id="navbar" class="navbar">
		<a href="new_announcement_info.php">公告</a>
		<a href="#">用戶管理</a>
		<a href="#">發送訊息</a>
		</div>
		<div class="context">
			<form  action="insert_message_data.php" enctype="multipart/form-data" method="post">
			
			<div class="textArea">
				<h1>信件</h1>
				<!--<p>title: <input type="text" name="title"></p><br>
				-->
				<!--<p>用戶: <input type="text" name="account" required></p><br>
				-->
				
				<p>標題: <input style="width: 500px;"  type="text" name="title" required></p><br>
				<textarea name="content" cols="80" rows="10"  required>
				</textarea>
				<input type="submit" name="sendBtn" value="送出"/>
			</div>
			</form>
		</div>

	</body>
</html>