<?php 
session_start();
setcookie("pet_info",$_SESSION['pet_id'],"time()+3600");
echo	$_COOKIE["pet_info"];?>