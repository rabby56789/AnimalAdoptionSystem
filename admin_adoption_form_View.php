<!DOCTYPE html>

<html lang="zh-TW" dir="ltr">
	<head>
		<meta charset = "utf-8">
		<title>個人認養--動物認養系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/admin_adoption_form_View.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		</script>
	</head>
	<body>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>  
			<form action="admin_adoption_form_View.php" method="get">	
			<p>動物性別：<br><input class="radio" type="radio" value="*" name="gender" checked>不拘
					 <input class="radio" type="radio" value="男" name="gender">男
					 <input class="radio" type="radio" value="女" name="gender">女
					 <input class="radio" type="radio" value="無法告知" name="gender">無法告知</p><br>
			<p>動物類別: <br><select name="pet_type">
						 <option value="*">全選</option>
						 <option value="狗">狗</option>
						 <option value="貓">貓</option>
						 <option value="倉鼠">倉鼠</option>
						 <option value="鳥類">鳥類</option>
						 <option value="其他">其他</option>
						 </select></p><br>
			<p>動物品種: <br><input type="text" name="pet_name"></p><br>
			<p>動物地區: <br><input type="text" name="address"></p><br>
			<button class="filter_search">搜尋</button>
			</form>
		</div>
		
		<div class="content" id="main">
			<button class="filter_button" onclick="openNav()">篩選器</button>
			<iframe id="animal_info_content" src="admin_adoption_form_View.php" ></iframe>
			<?php
			session_start();
				$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
				if(empty($_GET) || (empty($_GET['gender'])&&empty($_GET['pet_type'])&&empty($_GET['pet_name'])&&empty($_GET['area'])))
				{	$filter = ['adopted' => "True"];					
					$gender=0;//初始劃分頁數值
					$pet_type=0;
					$pet_name=0;
					$area=0;
				}
				else
				{	
					//不拘和全選之處理
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
					{$area="*";$_GET['address']=['$ne' => $_GET['address']];}
					else{$area=$_GET['address'];}
					//查詢條件
					$filter = ['gender' => $_GET['gender'],
							   'pet_type' =>$_GET['pet_type'],
							   'pet_name' =>$_GET['pet_name'],
							   'address' =>$_GET['address'],
							   'adopted' => "True",
							   ];
				}								
				$q = new MongoDB\Driver\Query($filter);//筆數用				
				$cur = $manager->executeQuery('mydb.Opet', $q);//筆數用
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
				
				$per=10;//每頁顯示項目數量
				$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
				if (!isset($_GET["page"]))//假如$_GET["page"]未設置
				{$page=1;/*則在此設定起始頁數*/}
				else 
				{$page = intval($_GET["page"]); /*確認頁數只能夠是數值資料*/}
				$options = ['limit'=>$per,'skip'=>($per*$page)-10,];//排順序先PO的先上
				$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
				$cursor = $manager->executeQuery('mydb.Opet', $query);//設定指標變數:查詢變數指向哪個db哪個collection
				echo '<div class="a_animal"><table> <tr> 
									<th>送養人</th> 
									<th>性別</th>
									<th>動物類別</th>
									<th>動物品種</th>
									<th>地區</th>
									<th>申請者</th>
									</tr>';
				//顯示查詢資料
				foreach ($cursor as $document)
				{	//設定$doc為陣列才能一一顯示值
					$doc = (array)$document;
					$ID=$document->{'_id'}->__toString();
					$filterForm = ['animal_id' => $ID];	
					$queryForm = new MongoDB\Driver\Query($filterForm);//設定查詢變數
					$cursorForm = $manager->executeQuery('mydb.adoption_form', $queryForm);
					
					foreach ($cursorForm as $document)
					{
						$docForm = (array)$document;
						//print_r($docForm['pet_type']);echo'</p>';
						if($docForm['success'] == "True"){
							echo '<tr>';
							echo	'<td>';print_r($docForm['animal_owner']);echo'</td>';
							echo	'<td>';print_r($docForm['gender']);echo'</td>';
							echo	'<td>';print_r($docForm['pet_type']);echo'</td>';
							echo	'<td><a href="animal_info.php?_id=';print_r($ID);echo '">';print_r($docForm['pet_name']);echo'</a></td>';
							echo	'<td>';print_r($docForm['address']);echo'</td>';
							echo	'<td>';print_r($docForm['adoption_people']);echo'</td>';
							//echo	'</tr>';	
						}
					}	
					echo '</div>';
				};	echo '</table>';
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
			echo "頁 ";
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
			echo "頁 ";
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