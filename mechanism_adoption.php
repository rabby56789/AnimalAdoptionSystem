<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>機構認養--動物認養系統</title>
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
		  <a href="person_adoption.php">個人認養</a>
		  <a class="active" href="#">機構認養</a>
		  <a href="#">遺失協尋</a>
		  <a href="#">二手用品</a>
		</div>
		
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
		  <div>
			<form action="mechanism_adoption.php" method="post">	
			
			<p>性別：<input type="radio" value="*" name="gender" checked>不拘
					 <input type="radio" value="M" name="gender" checked>男
					 <input type="radio" value="F" name="gender">女
					 <input type="radio" value="無法告知" name="gender">無法告知</p><br>
			<p>動物類別: <select name="pet_type">
						 <option value="*">全選</option>
						 <option value="狗">狗</option>
						 <option value="貓">貓</option>
						 </select></p><br>
			<p>動物顏色: <input type="text" name="pet_name"></p><br>
			<p>地區:<select name="area">
					<option value="*">全選</option>
					<option value="新北市板橋區公立動物之家">新北市板橋區公立動物之家</option>
					<option value="新北市新店區公立動物之家">新北市新店區公立動物之家</option>
					<option value="新北市中和區公立動物之家">新北市中和區公立動物之家</option>
					<option value="新北市淡水區公立動物之家">新北市淡水區公立動物之家</option>
					<option value="新北市瑞芳區公立動物之家">新北市瑞芳區公立動物之家</option>
					<option value="新北市五股區公立動物之家">新北市五股區公立動物之家</option>
					<option value="新北市八里區公立動物之家">新北市八里區公立動物之家</option>
					<option value="新北市三芝區公立動物之家">新北市三芝區公立動物之家</option>
					<option value="臺北市動物之家">臺北市動物之家</option>
					<option value="臺中市動物之家南屯園區">臺中市動物之家南屯園區</option>
					<option value="臺南市動物之家灣裡站">臺南市動物之家灣裡站</option>
					<option value="臺南市動物之家善化站">臺南市動物之家善化站</option>
					<option value="高雄市壽山動物保護教育園區">高雄市壽山動物保護教育園區</option>
					<option value="高雄市燕巢動物保護關愛園區">高雄市燕巢動物保護關愛園區</option>
					<option value="桃園市動物保護教育園區">桃園市動物保護教育園區</option>
					<option value="新竹縣公立動物收容所	">新竹縣公立動物收容所	</option>
					<option value="新竹市動物保護教育園區">新竹市動物保護教育園區</option>
					<option value="苗栗縣生態保育教育中心(動物收容所)">苗栗縣生態保育教育中心(動物收容所)</option>
					<option value="彰化縣流浪狗中途之家">彰化縣流浪狗中途之家</option>
					<option value="南投縣公立動物收容所">南投縣公立動物收容所</option>
					<option value="雲林縣流浪動物收容所">雲林縣流浪動物收容所</option>
					<option value="嘉義縣流浪犬中途之家">嘉義縣流浪犬中途之家</option>
					<option value="嘉義市動物保護教育園區">嘉義市動物保護教育園區</option>
					<option value="屏東縣公立犬貓中途之家">屏東縣公立犬貓中途之家</option>
					<option value="宜蘭縣流浪動物中途之家">宜蘭縣流浪動物中途之家</option>
					<option value="花蓮縣流浪犬中途之家">花蓮縣流浪犬中途之家</option>
					<option value="臺東縣動物收容中心">臺東縣動物收容中心</option>
					<option value="基隆市寵物銀行">基隆市寵物銀行</option>
					<option value="澎湖縣流浪動物收容中心">澎湖縣流浪動物收容中心</option>
					<option value="金門縣動物收容中心">金門縣動物收容中心</option>
					<option value="連江縣流浪犬收容中心">連江縣流浪犬收容中心</option>
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
					include 'mechanism_adoption _all.php';
				}
				else
				{
					$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
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
					$filter = ['animal_sex' => $_POST['gender'],
							   'animal_kind' =>$_POST['pet_type'],
							   'animal_colour' =>$_POST['pet_name'],
							   'shelter_name' =>$_POST['area']
							   ];
					$options = ['sort' =>['animal_opendate' => -1],'limit' => 30,'skip' => $_SESSION['count']];//排順序先PO的先上
					$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
					$cursor = $manager->executeQuery('test.animals', $query);//設定指標變數:查詢變數指向哪個db哪個collection
					$a=$cursor->isDead();//判斷查詢結果是否為空

					if($a==true)
					{print_r("查詢結果為空");}
					//顯示查詢資料
					foreach ($cursor as $document) {
						//設定$doc為陣列才能一一顯示值
						$doc = (array)$document;
					$ID=$document->{'_id'}->__toString();
					echo '<div class="a_animal">';
					echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['album_file']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
					echo	'<p id="pet_id">類別：';print_r($doc['animal_kind']);echo'</p>';
					echo	'<p>品種：';print_r($doc['animal_colour']);echo'</p>';
					echo	'<p>地區：';print_r($doc['shelter_name']);echo'</p>';
					echo	'<p>性別：';print_r($doc['animal_sex']);echo'</p>';
					echo    '<button type="button">申請認養</button>';
					echo	'</div>';
		  
					};
				}?>
			
			
		</div>
		<a href="last-m.php?count=30">上一頁</a>
		<a href="next-m.php?count=30">下一頁</a>
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