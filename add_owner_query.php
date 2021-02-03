<?php
$conn = mysqli_connect('localhost','root','','repository-app');
mysqli_set_charset($conn,"utf8");

if(!isset($_POST['submit'])){
    header("Location: add_owner_form.php?submit=not_clicked");
    close();
}elseif(!isset($_POST['name']) or $_POST['name'] == ''){
    header("Location: add_owner_form.php?name=not_set");
    close();
}elseif(!isset($_POST['phone']) or $_POST['phone'] == ''){
    header("Location: add_owner_form.php?phone=not_numeric");
    close();
}else{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);

}
$sql = "INSERT INTO customer(name ,phone) values ('".$name."','".$phone."');";
mysqli_query($conn, $sql);
header("Location: index.php?success");
close();