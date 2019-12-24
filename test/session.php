<?php
//判斷 $_GET 內容
session_start();
if($_GET){
	echo '使用了<font color="red">get</font>方式傳遞資料,請看「<font color="red">網址列</font>」上顯示的網址內容<br /><br />';
	if($_GET['user_name']!=''){echo '姓名:'.$_GET['user_name'].'<br />';}else{echo '無名氏<br />';}
	if($_GET['user_pass']!=''){echo '密碼:'.$_GET['user_pass'].'<br />';}else{echo '無密碼<br />';}
	
	echo '<p style="color:red">送出的資料將會是以「陣列」方式儲存在 $_GET 變數當中，<br />可使用 var_dump($_GET) 或 print_r($_GET) 涵數查詢內容如下:</p>';
	echo '<p>';
	var_dump($_GET);
	echo '</p>';
}


if($_POST){
	echo '使用了<font color="red">post</font>方式傳遞資料,<br />「<font color="red">網址列</font>」上不會顯示傳遞的資料訊息<br /><br />';
	if(!empty($_POST['user_name'])){echo '姓名:'.$_POST['user_name'].'<br />';}else{echo '無名氏<br />';}
	if(!empty($_POST['user_pass'])){echo '密碼:'.$_POST['user_pass'].'<br />';}else{echo '無密碼<br />';}
	
	echo '<p style="color:red">送出的資料將會是以「陣列」方式儲存在 $_POST 變數當中，<br />因此可使用 var_dump($_POST) 或 print_r($_POST) 涵數查詢內容如下:</p>';
	echo '<p>';
	print_r($_POST['user_name']);
	echo '</p>';
}
//$id = $_POST['user_name'];
//$_SESSION['id'] = $id
$_SESSION['user_name']=$_POST['user_name'];
//$id = $_SESSION['id'];
print_r($_SESSION['user_name']);
var_dump($_SESSION);

echo '<p><a href="a.html">返回</a></p>';

phpinfo();