<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面-送養--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/user_foster.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--<script src="js/user_foster.js"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="foster_available" id="pet_list">
			<div class="foster_operation">
				<div class="foster_operation_left"><h4>可供送養</h4></div>
				<div class="foster_operation_right">
					<button class="new" type="button" onclick="location.href='new_animal_info.php'">新增</button>
				</div>
			</div>
			<?php include 'Available_for_adoption.php'?>
			<!--<div class="a_animal">
				<a href="animal_info.html"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">修改</button>
				<button type="button">刪除</button>
			</div>
			<div class="a_animal">
				<a href="animal_info.html"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">修改</button>
				<button type="button">刪除</button>
			</div>
			<div class="a_animal">
				<a href="animal_info.html"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">修改</button>
				<button type="button">刪除</button>
			</div>
			<div class="a_animal">
				<a href="animal_info.html"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">修改</button>
				<button type="button">刪除</button>
			</div>
			<div class="a_animal">
				<a href="animal_info.html"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">修改</button>
				<button type="button">刪除</button>
			</div>-->
		</div>
		<div class="foster_finish">
			<div class="foster_operation">
				<div class="foster_operation_left"><h4>送養成功</h4></div>
			</div>
			<?php include 'Successful_adoption.php'?>
			<!--<div class="a_animal">
				<a href="animal_info.html"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">回復</button>
			</div>
			<div class="a_animal">
				<a href="animal_info.html"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">回復</button>
			</div>
			<div class="a_animal">
				<a href="animal_info.html"><img src="" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>品種：</p>
				<button type="button">回復</button>
			</div>-->
		</div>
		
	</body>

</html>