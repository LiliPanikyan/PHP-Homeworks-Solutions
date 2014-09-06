<!DOCTYPE html>

<html>
<head>
    <title>Most frequent tag</title>
</head>
<body>
    <form method="post">
        <input type="text" name="tags"/><br/>
        <input type="submit" name="submitBtn" value="Submit"/>
    </form>

    <div>
    <?php
    if(isset($_POST['tags'])) {
        $tags = explode(", ", $_POST['tags']);
        $n = array_count_values($tags);
        if (sizeof($n) > 0){
            $val = array_search(max($n), $n);
            arsort($n);
            foreach ($n as $key => $value){
                echo "$key : $value times <br>";

            }
            echo "Most Frequent Tag is: $val ";
        }
    }
    ?>
    </div>
</body>
</html>