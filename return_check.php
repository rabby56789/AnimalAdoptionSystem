		<?php
		$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
		$mongoid=$_GET['animal_id'];
		$filter = ['animal_id' => $mongoid];//查詢條件
		$query = new MongoDB\Driver\Query($filter);//設定查詢變數
		$cursor = $manager->executeQuery('mydb.adoption_form', $query);//設定指標變數:查詢變數指向哪個db哪個collection
		$a=$cursor->isDead();
		if($a==true)
		{
			echo "錯誤";
		}
		else
		{
			//顯示資料
			foreach ($cursor as $document) {
			//設定$doc為陣列才能一一顯示值
			$doc = (array)$document;
			$ID=$document->{'_id'}->__toString();//將MongoDB的ObjectID轉換為字串
			echo '<div class="a_animal">';
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
