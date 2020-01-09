<?php
session_start();
//imgur API新增圖片之url
if(empty($_SESSION['account']))
{
	echo '<script>alert("請先登入");</script>';
	header("refresh:0;url=Available_second_hand.php");
}
else{
$img=$_FILES['img'];
if($img['name']=='')
{  
 echo "<h2>An Image Please.</h2>";
}
else{
  $filename = $img['tmp_name'];
  $client_id="eab4301d1b9f6c8";
  $handle = fopen($filename, "r");
  $data = fread($handle, filesize($filename));
  $pvars   = array('image' => base64_encode($data));
  $timeout = 30;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
  curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  $out = curl_exec($curl);
  curl_close ($curl);
  $pms = json_decode($out,true);
  $url=$pms['data']['link'];
  var_dump($url);
  if($url=="")
  {
   echo "<h2>There's a Problem</h2>";
   echo $pms['data']['error'];  
  }
 }

$time=date("Y-m-d H:i:s");
$manager = new MongoDB\Driver\Manager("mongodb+srv://maomao:maomao123@animal-axwfm.gcp.mongodb.net/test?retryWrites=true&w=majority");//設定連線
$bulk = new MongoDB\Driver\BulkWrite; //設定寫入變數
$bulk->insert(['account' => $_SESSION['account'],//使用者登陸後儲存使用者id之類的常用資料。一旦儲存到SESSION中，其他頁面都可以通過SESSION獲取,SESSION的使用要開啟session
			   'item' => $_POST['item'],//寫入資料設定
			   'information' => $_POST['information'],
			   'area' => $_POST['area'],
			   'connection' => $_POST['connection'],
			   'add_time' => $time,
			   'img' => $url
			   ]);
$manager->executeBulkWrite('mydb.second',$bulk);//$manager->executeBulkWrite('寫入db.寫入資料表', $前面設的寫入變數);
echo '<script>window.history.go(-2);</script>';}
?>