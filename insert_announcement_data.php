<?php
	if($_POST['content'] != "")
	{setcookie("announcement",$_POST['content'] ,time() + (10 * 365 * 24 * 60 * 60));}
echo 
'<script>
if(confirm("公告修改成功，回首頁查看嗎?"))
{location.replace("index.php");}
else
{location.replace("admin.php");}
</script>';
?>