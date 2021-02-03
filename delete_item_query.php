<?php
$conn = mysqli_connect('localhost','root','','repository-app');
mysqli_set_charset($conn,"utf8");


$sql = "delete from `items` WHERE `items`.`id` = ".$_GET['id']." ;";

mysqli_query($conn, $sql);
header("Location: index.php?success");
close();