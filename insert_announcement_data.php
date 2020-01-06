<?php
if($_POST['sendBtn']){
	if($_POST['content'] != ""){
		setcookie("announcement",$_POST['content'] ,time() + (10 * 365 * 24 * 60 * 60));
	}
}
?>
<!DOCTYPE html>
<html>
<body>
<a href="http://localhost/animal/showannouncement.php">顯示</a>
</body>
</html>