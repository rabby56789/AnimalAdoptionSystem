
<!DOCTYPE html>
<html>
<body>
<?php
echo "公告:"."<br>";
?><pre>
<textarea wrap="off" style="font-family:fantasy;font-weight:bold; background-color:#FFBA3B; border:3px green solid;" name="content" cols="60" rows="10"   readonly="readonly">
<?php
// Echo session variables that were set on previous page
if(!isset($_COOKIE["announcement"])) {
    echo "announcement is not set!";
} else {
    echo $_COOKIE["announcement"];
}
?>
</textarea>
</pre>
</body>
</html>