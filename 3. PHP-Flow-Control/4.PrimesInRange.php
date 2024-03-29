<!DOCTYPE html>
<?php
function isPrime($number){
    if ($number <= 1) {
        return false;
    } elseif ($number == 2) {
        return true;
    } else if ($number % 2 == 0) {
        return false;
    } else {
        for ($i = 3; $i <= ceil(sqrt($number)); $i += 2) {
            if ($number % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
?>
<html>
<head>
    <title>Find Primes in Range</title>
</head>
<body>
<form method="post">
    <label for="start">Start:</label>
    <input type="text" name="start" id="start"/>
    <label for="end">End:</label>
    <input type="text" name="end" id="end"/>
    <input type="submit"/>
</form>
    <?php
        if ($_POST) {
            $start = intval($_POST["start"]);
            $end = intval($_POST["end"]);
            if (isset($start) && isset($end)) {
                if($start > $end){
                    echo "The start number must be less than end number.";
                }else if($start == $end){
                    echo "Start and end number must be different.";
                }else{
                    $result = array();
                    for ($number = $start; $number <= $end; $number++) {
                        $result[] = isPrime($number) ? "<strong>$number</strong>" : $number;
                    }
                    echo implode(", ", $result);
                }
            }
        }
    ?>
</body>
</html>