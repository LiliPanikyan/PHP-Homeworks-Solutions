<!DOCTYPE html>
<html>
<head>
    <title>Text Filter</title>
</head>
<body>
<form method="post">
    <textarea name="text" rows="5" cols="40" placeholder="Write your text..."></textarea><br>
    <input type ="text" name="baned" placeholder="Your words.."><br>
    <input type="submit">
</form>
<?php
if(isset($_POST['text'])&& isset($_POST['baned'])):
$text=$_POST['text'];
$filter=explode(", ",$_POST['baned']);
foreach ($filter as $word) {
    $text = str_replace($word, str_repeat('*', strlen($word)), $text);
}
?>
<p><?=$text?></p>
<?php endif?>
</body>
</html>