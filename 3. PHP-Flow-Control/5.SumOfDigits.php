<!DOCTYPE html>
<html>
<head>
    <title>Sum of Digits</title>
</head>
<body>
<form method="post">
    <label for="nums">Input string: </label>
    <input type="text" name="nums" id="nums" style="width: 200px"/>
    <input type="submit"/>
</form>
<br>
<table>
    <?php
    if(isset($_POST['nums'])){
        $nums = preg_split('/[ ,]/', $_POST["nums"], 0, PREG_SPLIT_NO_EMPTY);
        echo "<table border=\"1\">";
        foreach ($nums as $number) {
            echo "<tr><td>$number</td><td>";
            if (filter_var($number, FILTER_VALIDATE_INT) !== false) {
                echo array_sum(str_split($number));
            } else {
                echo "I cannot sum that";
            }
            echo "</td></tr>";
        }

        echo "</table>";
    }
    ?>
</table>
</body>
</html>