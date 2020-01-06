<?php
echo "公告:"."<br>";
if(!isset($_COOKIE["announcement"])) {
    echo "announcement is not set!";
} else {
    echo $_COOKIE["announcement"];
}
?>