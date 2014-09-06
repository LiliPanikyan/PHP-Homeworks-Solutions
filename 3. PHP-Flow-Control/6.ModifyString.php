<!DOCTYPE html>
<html>
<head>
    <title>Modify string</title>
</head>
<body>
<form method="post">
    <input type="text" name="text" id="text" style="width: 200px"/>
    <input type="radio" name="palindrome" id="palindrome">
    <label for="palindrome">Check for palindrome</label>
    <input type="radio" name="reverse" id="reverse">
    <label for="reverse">Reverse string</label>
    <input type="radio" name="split" id="split">
    <label for="split">Split</label>
    <input type="radio" name="hash" id="hash">
    <label for="hash">Hash String</label>
    <input type="radio" name="shuffle" id="shuffle">
    <label for="shuffle">Shuffle String</label>
    <input type="submit"/>
</form>
<div style="font-size: 26px">
    <?php
    if(isset($_POST['text'])){
        $string=$_POST['text'];
        if(isset($_POST['palindrome'])){
            $word= strtolower((preg_replace("/[^A-Za-z0-9]/","",$string)));
            if($word == strrev($string)){
                echo $string." is a palindrome";
            }else{
                echo $string." is a not palindrome";
            }
        }elseif(isset($_POST['reverse'])){
            echo strrev($string);
        }elseif(isset($_POST['split'])){
            $result = array();
            preg_match_all('/[A-Za-zА-Яа-я]/', $string, $result);
            echo implode(" ", $result[0]);
        }elseif(isset($_POST['hash'])){
            echo crypt($string);
        }else{
            echo str_shuffle($string);
        }
    }
    ?>
</div>
</body>
</html>