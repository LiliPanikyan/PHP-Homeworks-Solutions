<!DOCTYPE html>
<?php
function buildObjectsList($arr, $output)
{
    foreach ($arr as $word) {
        if (isset($output[$word])) {
            $output[$word]++;
        } else {
            $output[$word] = 1;
        }
    }
    return array($word, $output);
}
?>
<html>
<head>
    <title> Word Map</title>
</head>
<body>
<form method="post">
    <textarea name="text" rows="5" cols="40" placeholder="Write your text here..."></textarea><br>
    <input type="submit" id="button" value="Count words">
</form>
<?php
if(isset($_POST['text'])):
    $input=strtolower($_POST['text']);
    $arr=str_word_count($input, 1, 'àáãç3');

    $output=[];
    list($word, $output) = buildObjectsList($arr, $output);
    ?>
<table border="1">
        <?php foreach ($output as $word => $value) : ?>
    <tr>
        <td><?=$word?></td>
        <td><?=$value?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

</body>
</html>
