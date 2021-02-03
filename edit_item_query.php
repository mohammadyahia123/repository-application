<?php
$conn = mysqli_connect('localhost','root','','repository-app');
mysqli_set_charset($conn,"utf8");
if(!isset($_POST['submit'])){
    header("Location: edit_item.php?id=not_clicked");
    close();
}elseif(!isset($_POST['name'])){
    header("Location: edit_item.php?name=name_not_set");
    close();
}elseif(!is_numeric($_POST['price'])){
    header("Location: edit_item.php?price=price_not_numeric");
    close();
}elseif(!isset($_POST['owner'])){
    header("Location: edit_item.php?id=owner not_set");
    close();
}else{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $owner = mysqli_real_escape_string($conn,$_POST['owner']);
}

$sql = "UPDATE `items` SET `name` = '".$name."', `price` = '".$price."', `owner` = '".$owner."' WHERE `items`.`id` = ".$_GET['id']." ;";

mysqli_query($conn, $sql);
header("Location: index.php?success");
close();