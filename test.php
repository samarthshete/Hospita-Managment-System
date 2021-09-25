<?php
$str = '123';
$md5str=md5($str);
echo "MD5 Code = $md5str";

echo "<br>MD5 Reversed";md5($md5str);
if (md5($str) === $md5str) {
    echo "Would you like a green or red apple?";
}
?>

