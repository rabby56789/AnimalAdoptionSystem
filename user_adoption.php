<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面-認養--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/user_adoption.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="adoption_available">
			<div class="adoption_operation">
				<div class="adoption_operation_left"><h4>認養申請中<span style="font-weight: lighter;"> ( 申請失敗會自動消失 )</span></h4></div>
				<div class="adoption_operation_right">
					
				</div>
			</div>
			<?php include'Adoption_available.php';?>
			<!--<div class="a_animal">
				<a href="animal_info.php"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png" mode='aspectFill'></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">確認認養</button>
				<button type="button">刪除</button>
			</div>
			<div class="a_animal">
				<a href="animal_info.php"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">確認認養</button>
				<button type="button">刪除</button>
			</div>-->
		</div>
		<div class="adoption_finish">
			<div class="adoption_operation">
				<div class="adoption_operation_left"><h4>認養成功</h4></div>
			</div>
			<?php include'Adoption_finish.php';?>
			<!--<div class="a_animal">
				<a href="animal_info.php"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">回復</button>
			</div>-->
		</div>
	</body>
</html>