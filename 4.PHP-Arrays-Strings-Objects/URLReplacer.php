<!DOCTYPE html>
<html>
<head>
    <title>URL Replace</title>
</head>
<body>
<form method="post">
    <textarea name="text" rows="5" cols="40"></textarea><br>
    <input type="submit">
</form>
<?php
if(isset($_POST['text'])){
    $input=$_POST['text'];
    $patterns=array('/<a href="/', '/">/', '/<\/a>/');
    $replacements= array('[URL=', ']', '[/URL] ');
    for ($i = 0; $i < 3; $i++) {
        $input = preg_replace($patterns[$i], $replacements[$i], $input);
    }
    echo($input);
}
?>
</body>
</html>