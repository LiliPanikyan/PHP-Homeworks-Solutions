<?php
function getMonth($number){
    return date("F", strtotime(date("d-$number-Y")));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Show Annual Expenses</title>
</head>
<body>
<form action="" method="post">
    <label for="num">Enter number of years</label>
    <input type="text" name="num" id="num"/>
    <input type="submit" value="Show Table"/>
</form><br>
<?php
if (isset($_POST["num"]) && !empty($_POST["num"])):
    $n=$_POST['num'];
    $currentYear = date("Y");
    ?>
    <table border="1">
        <thead>
        <tr>
            <th>Year</th>
            <?php
            for ($month = 1; $month <= 12; $month++) {
                echo "<th>" . getMonth($month) . "</th>";
            }
            ?>
            <th>Total:</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($year = $currentYear; $year > $currentYear - $n; $year--) {
            echo "<tr><td>$year</td>";
            $total = 0;
            for ($month = 1; $month <= 12; $month++) {
                $currCost = rand(0, 999);
                echo "<td>" . $currCost . "</td>";
                $total += $currCost;
            }
            echo "<td>$total</td></tr>";
        }
        ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>
