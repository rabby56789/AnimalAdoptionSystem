<?php
session_start();
unset($_SESSION['account']);
session_destroy();
header("refresh:0;url=index.php");
?>