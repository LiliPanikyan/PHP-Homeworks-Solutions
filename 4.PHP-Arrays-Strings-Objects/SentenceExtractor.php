<!DOCTYPE html>
<html>
<head>
    <title>Text Filter</title>
</head>
<body>
<form method="post">
    <textarea name="text"rows="5" cols="40" placeholder="Write a text.."></textarea><br>
    <input type ="text" name="word" placeholder="Your word.."><br>
    <input type="submit">
</form>
<?php
if(isset($_POST['text']) && isset($_POST['word'])){
    $input=$_POST['text'];
    $word=$_POST['word'];
    $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $input, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($sentences as $sentence) {
        if (preg_match('/\s+'.$word.'\s+.*[!?.]+$/', $sentence) ){
            echo $sentence.'<br>';
        }
    }
}
?>

</body>
</html>