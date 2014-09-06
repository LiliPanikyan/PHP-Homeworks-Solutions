<!DOCTYPE html>

<html>
<head>
    <title>Print Tags</title>
</head>
<body>
<form action="01PrintTags.php" method="get">
    <input type="text" name="tags"/><br/>
    <input type="submit" name="submitBtn" value="Submit"/>

    <div>
        <?php
        if(isset($_GET['tags'])) {
            $tagText = explode(",", $_GET['tags']);
            for($i = 0; $i < count($tagText) ;$i++) {
        ?>
        <p><?="$i: $tagText[$i]";?></p>
         <?php
            }
        }
        ?>
    </div>

</form>

</body>
</html>