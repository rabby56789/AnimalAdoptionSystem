<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人認養--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/person_adoption.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="header">
		  <div class="header_left">
		  	<h2>動物認養系統</h2>
		  </div>
		  <?php 
		  session_start();
		  if(empty($_SESSION['account']))//未登入顯示登入鈕
		  {
			echo '<div class="header_right">';
		  	echo '<button onclick="document.getElementById(\'login\').style.display=\'block\'" style="width:auto;">登入</button>';
			echo '</div>';
		  }
		  else//已登入顯示帳號
		  {
			echo '<div class="header_right">';
		  	echo '<h3>hi, <a href="user_index.php">';print_r($_SESSION['user_name']);echo '</a></h3>';
			echo '</div>';
		  }
		  ?>
		  <div id="login" class="modal">
		  <form class="modal-content animate" action="login_decide.php" method="post">
		    <div class="imgcontainer">
		      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
		    </div>
		    <div class="container">
		      <label for="account"><b>帳號(Email):</b></label>
		      <input type="text" placeholder="Enter Account" name="account" required>
		      <label for="psd"><b>密碼:</b></label>
		      <input type="password" placeholder="Enter Password" name="psd" required>
		      <button type="submit" >Login</button>
		    </div>
		  </form>
		  </div>
		</div>
		
		<div id="navbar" class="navbar">
		  <a href="index.php">首頁</a>
		  <a class="active" href="person_adoption.php">個人認養</a>
		  <a href="#">機構認養</a>
		  <a href="#">遺失協尋</a>
		  <a href="#">二手用品</a>
		</div>
		
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
		  <div>
			<form action="person_adoption.php" method="post">	
			
			<p>性別：<input type="radio" value="*" name="gender" checked>不拘
					 <input type="radio" value="男" name="gender" checked>男
					 <input type="radio" value="女" name="gender">女
					 <input type="radio" value="無法告知" name="gender">無法告知</p><br>
			<p>動物類別: <select name="pet_type">
						 <option value="*">全選</option>
						 <option value="狗">狗</option>
						 <option value="貓">貓</option>
						 <option value="倉鼠">倉鼠</option>
						 <option value="鳥類">鳥類</option>
						 <option value="其他">其他</option>
						 </select></p><br>
			<p>動物品種: <input type="text" name="pet_name"></p><br>
			<p>地區:<select name="area">
					<option value="*">全選</option>
					<option value="基隆市">基隆市</option>
					<option value="台北市">台北市</option>
					<option value="新北市">新北市</option>
					<option value="桃園市">桃園市</option>
					<option value="新竹市">新竹市</option>
					<option value="新竹縣">新竹縣</option>
					<option value="苗栗縣">苗栗縣</option>
					<option value="台中市">台中市</option>
					<option value="彰化縣">彰化縣</option>
					<option value="南投縣">南投縣</option>
					<option value="雲林縣">雲林縣</option>
					<option value="嘉義市">嘉義市</option>
					<option value="嘉義縣">嘉義縣</option>
					<option value="台南市">台南市</option>
					<option value="高雄市">高雄市</option>
					<option value="屏東縣">屏東縣</option>
					<option value="台東縣">台東縣</option>
					<option value="花蓮縣">花蓮縣</option>
					<option value="宜蘭縣">宜蘭縣</option>
					<option value="澎湖縣">澎湖縣</option>
					<option value="金門縣">金門縣</option>
					<option value="連江縣">連江縣</option>
					</select></p><br>
			<button>搜尋</button>
			</form>
		  </div>
		</div>
		
		<div class="content" id="main">
			<button class="filter_button" onclick="openNav()">篩選器</button>
			<iframe id="animal_info_content" src="animal_info.php" ></iframe>
			<?php
				if(empty($_POST))
				{
					include 'person_adoption _all.php';
				}
				else
				{
					$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");//設定連線
					//不拘和全選之處理
					if($_POST['gender']=="*")
					{$_POST['gender']=['$ne' => $_POST['gender']];}
					if($_POST['pet_type']=="*")
					{$_POST['pet_type']=['$ne' => $_POST['pet_type']];}
					if($_POST['pet_name']=="")
					{$_POST['pet_name']=['$ne' => $_POST['pet_name']];}
					if($_POST['area']=="*")
					{$_POST['area']=['$ne' => $_POST['area']];}
					//查詢條件
					$filter = ['gender' => $_POST['gender'],
							   'pet_type' =>$_POST['pet_type'],
							   'pet_name' =>$_POST['pet_name'],
							   'area' =>$_POST['area']
							   ];
					$options = ['sort' =>['add_time' => 1],];//排順序先PO的先上
					$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
					$cursor = $manager->executeQuery('mydb.Opet', $query);//設定指標變數:查詢變數指向哪個db哪個collection
					$a=$cursor->isDead();//判斷查詢結果是否為空

					if($a==true)
					{print_r("查詢結果為空");}
					//顯示查詢資料
					foreach ($cursor as $document) {
						//設定$doc為陣列才能一一顯示值
						$doc = (array)$document;
						$ID=$document->{'_id'}->__toString();
						echo '<div class="a_animal">';
						echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
						echo	'<p id="pet_id">類別：';print_r($doc['pet_type']);echo'</p>';
						echo	'<p>品種：';print_r($doc['pet_name']);echo'</p>';
						echo	'<p>地區：';print_r($doc['area']);echo'</p>';
						echo	'<p>性別：';print_r($doc['gender']);echo'</p>';
						echo    '<button type="button">申請認養</button>';
						echo	'</div>';
		  
					};
				}?>
			
			<div class="a_animal">
				<a href="javascript: handler();"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">申請認養</button>
			</div>
			<div class="a_animal">
				<a href="javascript: handler();"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">申請認養</button>
			</div>
			<div class="a_animal">
				<a href="javascript: handler();"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">申請認養</button>
			</div>
			<div class="a_animal">
				<a href="javascript: handler();"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">申請認養</button>
			</div>
			<div class="a_animal">
				<a href="javascript: handler();"><img src="https://asms.coa.gov.tw/Amlapp/Upload/pic/79866ec4-0259-4c05-83fd-ec4ff90893ca.jpg" alt="no image" onerror=this.src="ui_img/no_image.png"></a>
				<p>種類：</p>
				<p>品種：</p>
				<p>地區：</p>
				<p>是否提供認養：</p>
				<button type="button">申請認養</button>
			</div>
		</div>

		<script>
		// Get the modal
		var modal = document.getElementById('login');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}

		$(".navbar a").click(function(){
			$(".navbar a").removeClass("active");
			$(this).addClass("active");
		});
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("navbar");
		var filter = document.getElementById("mySidenav");
		var sticky = navbar.offsetTop;

		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky");
			filter.classList.remove("sidenav");
			filter.classList.add("sticky_filter");
		  } else {
		    navbar.classList.remove("sticky");
			filter.classList.remove("sticky_filter");
			filter.classList.add("sidenav");
		  }
		}
		
		function handler() {
		   document.getElementById('animal_info_content').style.display="block";
		}
		
		function openNav() {
		  document.getElementById("mySidenav").style.width = "250px";
		  document.getElementById("main").style.marginLeft = "250px";
		}

		function closeNav() {
		  document.getElementById("mySidenav").style.width = "0";
		  document.getElementById("main").style.marginLeft= "0";
		}
		</script>
		
	</body>
</html>