<?php
   
$a = 1234.5678;
$b = 333;
$result = $a + $b;
$result = number_format($result, 2);

echo '$a + $b = ' . "$a + $b = " . $result;

 ?>