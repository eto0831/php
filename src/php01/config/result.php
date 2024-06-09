<?php
$csname = htmlspecialchars($_POST['csname'], ENT_QUOTES);
$item = htmlspecialchars($_POST['item'],ENT_QUOTES);
$number = htmlspecialchars($_POST['number'],ENT_QUOTES);
print '氏名は' . $csname . 'ですね' . "</br>";
print '商品は' . $item . 'ですね' . "<br>";
print '商品は' . $number . 'ですね' . "<br>";