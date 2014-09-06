<!DOCTYPE html>
<html>
<head>
    <title>Text Colorer</title>
    <style>
        #red{
            color: red;
        }
        #blue{
            color: blue;
        }
    </style>
</head>
<body>
<form method="post">
    <textarea name="text" rows="5" cols="40" placeholder="Write your text..."></textarea><br>
    <input type="submit" id="button" value="Color text"><br>
</form>
<?php
if(isset($_POST['text'])){
    $str=$_POST['text'];
    $chars=str_split($str);
   for($i=0; $i<count($chars);$i++){
       if(ord($chars[$i])%2==0){
           echo "<span id='red'>$chars[$i]\r</span>";
       }else{
           echo "<span id='blue'>$chars[$i]\r</span>";
       }
   }
}
?>
</body>
</html>