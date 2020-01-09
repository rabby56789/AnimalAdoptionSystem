<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>信件</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/new_message_info.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="context">
			<form
  action="sendToAdmin.php" enctype="multipart/form-data" method="post"
>
    <div class="title">給管理員:</div><br>
  <p>
    標題:
    <input type="text" name="title" required>
  </p><br>
  <p>
    信件內容:<br>
    <textarea name="message" cols="50" rows="10" required></textarea>
  </p><br>
  <input class="submit" type="submit" value="Send">
</form>
		</div>

	</body>
</html>