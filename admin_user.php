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
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>  
			<form action="admin_user.php" method="get">	
			<p>性別：<input type="radio" value="*" name="gender" checked>不拘
					 <input type="radio" value="男" name="gender">男
					 <input type="radio" value="女" name="gender">女</p><br>
			<p>姓名:<input type="text" name="user_name"></p><br>
			<p>匿名:<input type="text" name="nName"></p><br>
			<p>帳號:<input type="text" name="account"></p><br>
			<button class="filter_search">搜尋</button>
			</form>
		</div>
		<div class="content" id="main">
		<button class="filter_button" onclick="openNav()">篩選器</button>
			<?php
				$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
				if(empty($_GET))
				{
					$filter = [];
				}
				else
				{
					if($_GET['gender']=="*")
					{$gender="*";$_GET['gender']=['$ne' => $_GET['gender']];}
					else{$gender=$_GET['gender'];}
					if($_GET['user_name']=="")
					{$user_name="";$_GET['user_name']=['$ne' => $_GET['user_name']];}
					else{$user_name=$_GET['user_name'];}
					if($_GET['nName']=="")
					{$nName="";$_GET['nName']=['$ne' => $_GET['nName']];}
					else{$nName=$_GET['nName'];}
					if($_GET['account']=="")
					{$account="";$_GET['account']=['$ne' => $_GET['account']];}
					else{$account=$_GET['account'];}
					$filter = ['gender' => $_GET['gender'],
							   'user_name' =>$_GET['user_name'],
							   'nName' =>$_GET['nName'],
							   'account' =>$_GET['account'],
							   ];
				}
				$q = new MongoDB\Driver\Query($filter);//筆數用				
				$cur = $manager->executeQuery('mydb.Userinfo', $q);//筆數用
				$a=$cur->isDead();//判斷查詢結果是否為空
				$num=0;
				if($a==true)
				{echo '<div class="a_animal"><p>查詢結果為空</p></div>';}
				//計算查詢(全部)資料筆數
				foreach($cur as $d)
				{$num=$num+1;}//計算筆數
				$data_nums=$num;//全筆數SESSION好廢XD只會用全域嗚嗚嗚
				
				$per=15;//每頁顯示項目數量
				$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
				if (!isset($_GET["page"]))//假如$_GET["page"]未設置
				{$page=1;/*則在此設定起始頁數*/}
				else 
				{$page = intval($_GET["page"]); /*確認頁數只能夠是數值資料*/}
				$options = ['sort' =>['add_time' => 1],'limit'=>$per,'skip'=>($per*$page)-15,];//排順序先PO的先上
				$query = new MongoDB\Driver\Query($filter,$options);//設定查詢變數
				$cursor = $manager->executeQuery('mydb.Userinfo', $query);//設定指標變數:查詢變數指向哪個db哪個collection
				
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
					echo	'<p>帳號：<br>';print_r($doc['account']);echo'</p>';
					echo	'<p>密碼：';print_r($doc['psd']);echo'</p>';
					echo	'<p>地址：';print_r($doc['address']);echo'</p>';
					echo	'<p>電話：';print_r($doc['phone']);echo'</p>';
					//echo	'<p>是否為管理員：';print_r($doc['admin']);echo'</p>';
					echo	'<button type="button" onclick="location.href=';echo '\'';echo 'admin_delete_User.php?_id=';print_r($ID);echo '\'">刪除</button>';
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
				if ( $page-2 < $i && $i < $page+2 )
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
				{echo "<a href=?page=".$i."&gender=".$gender."&user_name=".$user_name."&nName=".$nName."&account=".$account.">".$i."</a> ";}
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