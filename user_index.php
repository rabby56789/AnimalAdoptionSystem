<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/user_index.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div class="header">
		<a href="index.php" style="text-decoration:none;">
		  <div class="header_left">
		  	<h2>動物認養系統</h2>
		  </div>
		</a>
		  <div class="header_right">
		  	<h3>hi, <a href="user_index.php"><?php session_start();print_r($_SESSION['user_name']);?></a></h3>
		  </div>
		</div>

		<div id="navbar" class="navbar">
		  <a class="active" href="index.php">首頁</a>
		  <a href="#" name="person_adoption.php">個人認養</a>
		  <a href="#" name="mechanism_adoption.php">機構認養</a>
		  <a href="#">遺失協尋</a>
		  <a href="#">二手用品</a>
		</div>
		
		<div id="content">
			<iframe src="user_index_content.php"></iframe>
		</div>

		<script>
		$(".navbar a").click(function(){
			$(".navbar a").removeClass("active");
			$(this).addClass("active");
			$("#content iframe").attr('src', $(this).attr("name"));
		});
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("navbar");
		var sticky = navbar.offsetTop;

		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky")
		  } else {
		    navbar.classList.remove("sticky");
		  }
		}
		</script>
	</body>
</html>