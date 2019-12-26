<?php
session_start();
$_SESSION['count']=$_SESSION['count']-$_GET['count'];
header("refresh:0;url=mechanism_adoption.php");?>