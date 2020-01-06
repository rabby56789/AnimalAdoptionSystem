<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>管理會員--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="content" id="main">
			<?php
				$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
				$filter = [];
				$query = new MongoDB\Driver\Query($filter);//設定查詢變數
				$cursor = $manager->executeQuery('mydb.Userinfo', $query);//設定指標變數:查詢變數指向哪個db哪個collection
																				
				$a=$cursor->isDead();//判斷查詢結果是否為空
				
				if($a==true)
				{echo '<div class="a_animal"><p>查詢結果為空</p></div>';}
								
				//顯示查詢資料
				foreach ($cursor as $document)
				{	//設定$doc為陣列才能一一顯示值
					$doc = (array)$document;
					$ID=$document->{'_id'}->__toString();
					echo '<div class="a_animal">';
					//echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
					echo	'<p>姓名：';print_r($doc['user_name']);echo'</p>';
					echo	'<p>匿名：';print_r($doc['nName']);echo'</p>';
					echo	'<p>性別：';print_r($doc['gender']);echo'</p>';
					echo	'<p>身分證：';print_r($doc['IDNumber']);echo'</p>';
					echo	'<p>帳號：';print_r($doc['account']);echo'</p>';
					echo	'<p>密碼：';print_r($doc['psd']);echo'</p>';
					echo	'<p>地址：';print_r($doc['address']);echo'</p>';
					echo	'<p>電話：';print_r($doc['phone']);echo'</p>';
					echo	'<p>是否為管理員：';print_r($doc['admin']);echo'</p>';
					echo	'<button type="button" onclick="location.href=';echo '\'';echo 'admin_updata_User.php?_id=';print_r($ID);echo '\'">修改</button>';
					echo	'<button type="button" onclick="location.href=';echo '\'';echo 'admin_delete_User.php?_id=';print_r($ID);echo '\'">刪除</button>';
					echo	'</div>';	
				};	
			?>
			
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
		

		var navbar = document.getElementById("navbar");
		var filter = document.getElementById("mySidenav");
		
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