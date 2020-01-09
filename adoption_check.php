<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>管理會員--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/person_adoption.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<?php
		$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
		$mongoid=$_GET['_id'];
		$filter = ['animal_id' => $mongoid];//查詢條件
		//$filter = ['_id' => ['$eq' => $_GET['_id']]];
		$query = new MongoDB\Driver\Query($filter);//設定查詢變數
		$cursor = $manager->executeQuery('mydb.adoption_form', $query);//設定指標變數:查詢變數指向哪個db哪個collection
		$a=$cursor->isDead();
		if($a==true)
		{
			echo "目前無人申請此動物";
		}
		else
		{
			//顯示資料
			foreach ($cursor as $document) {
			//設定$doc為陣列才能一一顯示值
			$doc = (array)$document;
			$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
			echo '<div class="a_animal">';
			//echo	'<a href="animal_info.php?_id=';print_r($ID);echo '"><img src="';print_r($doc['img']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
			echo	'<p>申請帳號：';print_r($doc['adoption_people']);echo'</p>';
			echo	'<p>申請人：';print_r($doc['user_name']);echo'</p>';
			echo	'<p>生日：';print_r($doc['age']);echo'</p>';
			echo	'<p>性別：';print_r($doc['gender']);echo'</p>';
			echo	'<p>身分證：';print_r($doc['IDNumber']);echo'</p>';
			echo	'<p>填表帳號：<br>';print_r($doc['account']);echo'</p>';
			echo	'<p>地址：';print_r($doc['address']);echo'</p>';
			echo	'<p>電話：';print_r($doc['phone']);echo'</p>';
			echo	'<button type="button" onclick="location.href=';echo '\'';echo 'updata_Form_data.php?animal_id=';print_r($doc['animal_id']);echo '&adoption_people=';print_r($doc['adoption_people']);echo '\'">確認此人</button>';
			echo	'</div>';
			}
		}

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
		
		/* Every time the window is scrolled ... */
		(function scrollFooter() {        
			var timer;
			$(window).bind('scroll',function () {
				clearTimeout(timer);
				timer = setTimeout( refresh , 1300 );
				document.getElementById('footer').style.display = "block";
			});
			var refresh = function () { 
				// do stuff
				document.getElementById('footer').style.display = "none";
				console.log('Stopped Scrolling'); 
			};
		})();
		</script>
		
	</body>
</html>