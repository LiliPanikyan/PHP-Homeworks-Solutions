<?php
$result = "";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $result = "My name is $name. I am $age years old. I am $gender.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Get Form Data</title>
    <style>
        input[type="text"], label {
            display: block;
        }
    </style>
</head>
<body>
<form method="post" action="">
    <input type="text" name="name" placeholder="Name..">
    <input type="text" name="age" placeholder="Age..">
    <label for="male"><input type="radio" id="male" name="gender" value="male">Male</label>
    <label for="female"><input type="radio" id="female" name="gender" value="female">Female</label>
    <input type="submit">
</form>
<p><?= $result ?></p>
</body>
</html>