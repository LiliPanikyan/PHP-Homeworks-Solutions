<?php
 $n=1234;
 $arr=();
 if($n<=101){
 echo "No"
 }else{
for($i=102;$i<=$n;$i++){
	if($i>987){
	break;
	}
	$firstDigit = (int)($i % 10);
    $secondDigit = (int)(($i / 10) % 10);
    $thirdDigit = (int)($i / 100);
	if($firstDigit != $secondDigit && $secondDigit != $thirdDigit){
	array_push($arr, $i);
	}
}
}
if(count($arr) > 0) {
    echo implode(', ', $arr);
} else {
    echo "no";
}
 ?>