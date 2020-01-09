<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>機構認養--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/mechanism_adoption.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>  
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<form action="mechanism_adoption.php" method="get">	
			<p>性別：<br><input class="radio" type="radio" value="*" name="gender" checked>不拘
					 <input class="radio" type="radio" value="M" name="gender">男
					 <input class="radio" type="radio" value="F" name="gender">女
					 <input class="radio" type="radio" value="N" name="gender">無法告知</p><br>
			<p>動物類別:<br> <select name="pet_type">
						 <option value="*">全選</option>
						 <option value="狗">狗</option>
						 <option value="貓">貓</option>
						 </select></p><br>
			<p>動物顏色: <input type="text" name="pet_name"></p><br>
			<p>地區:<br><select name="area">
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
			<button class="filter_search">搜尋</button>
			</form>
		</div>
		
		<div class="content" id="main">
			<button class="filter_button" onclick="openNav()">篩選器</button>
			<iframe id="animal_info_content" src="animal_info.php" ></iframe>
			<?php
				$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
				if(empty($_GET) || (empty($_GET['gender'])&&empty($_GET['pet_type'])&&empty($_GET['pet_name'])&&empty($_GET['area'])))
				{	$filter = ['animal_status' => 'OPEN'];
					$gender=0;//初始劃分頁數值
					$pet_type=0;
					$pet_name=0;
					$area=0;
				}
				else
				{	//不拘和全選之處理
					if($_GET['gender']=="*")
					{$gender="*";$_GET['gender']=['$ne' => $_GET['gender']];}
					else{$gender=$_GET['gender'];}
					if($_GET['pet_type']=="*")
					{$pet_type="*";$_GET['pet_type']=['$ne' => $_GET['pet_type']];}
					else{$pet_type=$_GET['pet_type'];}
					if($_GET['pet_name']=="")
					{$pet_name="";$_GET['pet_name']=['$ne' => $_GET['pet_name']];}
					else{$pet_name=$_GET['pet_name'];}
					if($_GET['area']=="*")
					{$area="*";$_GET['area']=['$ne' => $_GET['area']];}
					else{$area=$_GET['area'];}
					//查詢條件
					$filter = ['animal_sex' => $_GET['gender'],
							   'animal_kind' =>$_GET['pet_type'],
							   'animal_colour' =>$_GET['pet_name'],
							   'shelter_name' =>$_GET['area'],
							   'animal_status' => 'OPEN'
							   ];
				}
				$q = new MongoDB\Driver\Query($filter);//筆數用				
				$cur = $manager->executeQuery('test.animals', $q);//筆數用
				$a=$cur->isDead();//判斷查詢結果是否為空
				$num=0;
				if($a==true)
				{echo '<div class="a_animal"><p>查詢結果為空</p></div>';}
				//計算查詢(全部)資料筆數
				foreach($cur as $d)
				{
					$num=$num+1;//計算筆數
				}
				$data_nums=$num;//全筆數SESSION好廢XD只會用全域嗚嗚嗚
				
				$per=30;//每頁顯示項目數量
				$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
				if (!isset($_GET["page"]))//假如$_GET["page"]未設置
				{$page=1;/*則在此設定起始頁數*/}
				else 
				{$page = intval($_GET["page"]); /*確認頁數只能夠是數值資料*/}
				$options = ['sort' =>['animal_opendate' => -1],'limit'=>$per,'skip'=>($per*$page)-30,];//排順序先PO的先上
				$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
				$cursor = $manager->executeQuery('test.animals', $query);//設定指標變數:查詢變數指向哪個db哪個collection
							
				//顯示查詢資料function
				foreach ($cursor as $document)
				{	//設定$doc為陣列才能一一顯示值
					$doc = (array)$document;
					//資料顯示優化?
					if($doc['shelter_name']=="苗栗縣生態保育教育中心(動物收容所)")
					{$doc['shelter_name']="苗栗縣生態保育教育中心";}
					if($doc['animal_sex']=="M")
					{$doc['animal_sex']="男";}
					if($doc['animal_sex']=="F")
					{$doc['animal_sex']="女";}
					if($doc['animal_sex']=="N")
					{$doc['animal_sex']="無法告知";}
					/*-------------連結網址設定----------------*/
					$acceptNum=$doc['animal_subid'];
					$amimal_id=$document->{'animal_id'};
					$ID=$document->{'_id'}->__toString();
					$url='https://asms.coa.gov.tw/AmlApp/App/AnnounceList.aspx?Id='.$amimal_id.'&AcceptNum='.$acceptNum.'&PageType=Adopt';
					/*-----------開始顯示------------*/
					echo '<div class="a_animal">';
					echo	'<a href="';echo $url;echo '" target="_blank()"><img src="';print_r($doc['album_file']);echo '" alt="no image" onerror=this.src="ui_img/no_image.png"></a>';
					echo	'<p id="pet_id">類別：';print_r($doc['animal_kind']);echo'</p>';
					echo	'<p>品種：';print_r($doc['animal_colour']);echo'</p>';
					echo	'<p>地區：<br>';print_r($doc['shelter_name']);echo'</p>';
					echo	'<p>性別：';print_r($doc['animal_sex']);echo'</p>';
					echo    '<button type="button" onclick="top.location.href=\'';echo $url;echo '\'">申請認養</button>';
					echo	'</div>';
				};
			?>				
		</div>
		<!--求助UI，新增id="footer"之css-->
		<div id="footer">
		<?php
		if(empty($_GET))//無搜尋結果之分頁顯示
		{
			echo '共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁<br/>';
			echo "第 ";
			for( $i=1 ; $i<=$pages ; $i++ )
			{
				if ( $page-3 < $i && $i < $page+3 )
				{echo "<a href=?page=".$i.">".$i."</a> ";}
			}
		}
		else//有搜尋結果之分頁顯示
		{
			echo '共 '.$data_nums.' 筆-在第 '.$page.' 頁-共 '.$pages.' 頁<br/>';
			echo "第 ";
			for( $i=1 ; $i<=$pages ; $i++ )
			{
				if ( $page-3 < $i && $i < $page+3 )
				{echo "<a href=?page=".$i."&gender=".$gender."&pet_type=".$pet_type."&pet_name=".$pet_name."&area=".$area.">".$i."</a> ";}
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