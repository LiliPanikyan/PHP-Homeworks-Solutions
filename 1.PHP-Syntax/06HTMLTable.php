<?php
$name = "Pesho";
$phone = "0884-888-888";
$age = "64";
$address = "Suhata Reka";
?>
<!DOCTYPE html>
<html>
<head>
<style>
table{
display: inline-block;
margin-right: 50px;
border-spacing: 0;
}
table td{
padding: 8px 5px;

}
table td:first-child{
background-color: #FF9C00;
font-weight: bold;
}
</style>
</head>
<body>
<table>
    <tbody>
    <tr>
        <th><strong>Name</strong></th>
        <td><?= $name ?></td>
    </tr>
    <tr>
        <th><strong>Phone number</strong></th>
        <td><?= $phone ?></td>
    </tr>
    <tr>
        <th><strong>Age</strong></th>
        <td><?= $age ?></td>
    </tr>
    <tr>
        <th><strong>Address</strong></th>
        <td><?= $address ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>