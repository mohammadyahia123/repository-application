<?php
$conn = mysqli_connect('localhost','root','','repository-app');
mysqli_set_charset($conn,"utf8");
if(!isset($_POST['submit'])){
    header("Location: add_item_form.php?submit=not_clicked");
    close();
}elseif(!isset($_POST['name'])){
    header("Location: add_item_form.php?name=not_set");
    close();
}elseif(!is_numeric($_POST['price'])){
    header("Location: add_item_form.php?price=not_numeric");
    close();
}elseif(!isset($_POST['owner'])){
    header("Location: add_item_form.php?owner=not_set");
    close();
}else{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $owner = mysqli_real_escape_string($conn,$_POST['owner']);
}
    $sql = "INSERT INTO items(name , price , owner) values ('".$name."','".$price."','".$owner."');";
    mysqli_query($conn, $sql);
    header("Location: index.php?success");
    close();