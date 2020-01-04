<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/user_index_content.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="content">
			<ul id="tabs" class="tabs">
			    <li><div class="active" name="user_foster.php">送養</div></li>
			    <li><div name="user_adoption.php">認養</div></li>
			    <li><div name="user_receive.php">收信夾</div></li>
			    <li><div name="user_second_hand.php">二手用品</div></li>
			    <span><li><div name="user_info.php">個人資料</div></li></span>
			</ul>
			<div id="content">
				<iframe src="user_foster.php"></iframe>
			</div>
		</div>

		<script>
		$(".tabs li div").click(function(){
			$(".tabs li div").removeClass("active");
			$(this).addClass("active");
			$("#content iframe").attr('src', $(this).attr("name"));
		});
		</script>
	</body>
</html>