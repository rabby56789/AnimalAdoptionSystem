<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>首頁--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/index.css">
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
		  	echo '<h3>hi, <a class="dropdown" href="user_index.php">';print_r($_SESSION['user_name']);echo '</a></h3>';
			echo '<div class="dropdown_content">';
			echo '<a href="logout.php"><h3>登出</h3></a>';
			echo '</div>';
			echo '</div>';
		  }
		  ?>
		  </div>
		  
		  <div id="login" class="modal">
		  <form class="modal-content animate" action="login_decide.php" method="post">
		    <div class="imgcontainer">
		      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
		    </div>
		    <div class="container">
		      <label for="account"><b>帳號</b></label>
		      <input type="text" placeholder="輸入電子信箱" name="account" required>
		      <label for="psd"><b>密碼:</b></label>
		      <input type="password" placeholder="輸入密碼" name="psd" required>
		      <button type="submit" >登入</button>
			  <p>沒有帳戶嗎？點<a href="user_register.php">這裡</a>註冊新帳戶</p>
		    </div>
		  </form>
		</div>
		
		<div id="navbar" class="navbar">
		  <a class="active" href="#" name="index_content.php">首頁</a>
		  <a href="#" name="person_adoption.php">個人認養</a>
		  <a href="#" name="mechanism_adoption.php">機構認養</a>
		  <a href="#">遺失協尋</a>
		  <a href="#">二手用品</a>
		</div>

		<div id="content">
			<iframe src="index_content.php"></iframe>
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
			$("#content iframe").attr('src', $(this).attr("name"));
		});
		
		
		
		</script>
		
	</body>
</html>