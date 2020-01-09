<!DOCTYPE html>
<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人頁面--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/index_content.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
		<script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <link href="css/jquery.bxslider.min.css" rel="stylesheet" />
        <script>
		$(document).ready(function(){
		  slider = $('.bxslider').bxSlider({
			mode: 'fade',
			captions: true,
			slideWidth: 600
		  });
		  slider.startAuto();
		});
	  </script>
	</head>
	<body>
	
	<div class="context_button">
		<button onclick="document.getElementById('choose').style.display='block'" style="width:auto;">我 要 認 養</button>
	</div>
	<?php 
		$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
		$filter = [];//查詢條件
		$option=['limit' => 5,'sort' => ['add_time' => -1]];
		$query = new MongoDB\Driver\Query($filter,$option);//設定查詢變數
		$cursor = $manager->executeQuery('mydb.findpet', $query);
		
	?>
	<div class="context_left">
		<div class="mark">遺失協尋</div>
		<div class="img_slider">
            <ul class="bxslider">
			<?php
			foreach ($cursor as $document) {
			//設定$doc為陣列才能一一顯示值
			$doc = (array)$document;
			//$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
			echo '<li><img class="find" src="';echo print_r($doc['img']);echo '" /></li>';
			}
			?>
            </ul>
        </div>
	</div>
	
	<div id="choose" class="modal">
		<div class="modal-content animate">
		  <header class="imgcontainer"> 
			<span onclick="document.getElementById('choose').style.display='none'" 
			class="close" title="Close Modal">&times;</span>
			<h2>選擇送養類別</h2>
		  </header>
		  <div class="container">
			<button onclick="location.replace('person_adoption.php')">從送養人認養</button>
			<button onclick="location.replace('mechanism_adoption.php')">從送養機構認養</button>
		  </div>
		</div>
    </div>
	<div class="context">
		<?php include'showannouncement.php';?>
	</div>
	<div class="context_chat">
		<iframe src="https://www6.cbox.ws/box/?boxid=836120&boxtag=vXiBrd" width="500" height="330" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>	
	</div>
	<script>
		// Get the modal
		var modal = document.getElementById('choose');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
			modal.style.display = "none";
		  }
		}
	</script>
	</body>
</html>