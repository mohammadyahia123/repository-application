<?php
include 'header.php';?>
<style>
    .col-md-4,.col-md-2{margin-top:2px; }
</style>


</head>
<body>
<?php include "head.php";
if(isset($_GET['submit']) AND $_GET['submit'] == 'not_clicked')
    echo '<div class="container bg-info text-right ">روی اضافه کردن کلیک کنید!</div>';
if(isset($_GET['name']) ANd $_GET['name'] == 'not_set')
    echo '<div class="container bg-info text-right">اسم جنس را وارد نمایید!</div>';
if(isset($_GET['price'] ) AND $_GET['price'] == 'not_numeric')
    echo '<div class="container bg-info text-right">قیمت جنس را وارد نمایید!</div>';
if(isset($_GET['owner']) AND $_GET['owner'] == 'not_set') {
    header("Location: add_owner_form.php?owner=not_set");
    close();
}


?>
<div class="container">
<form action="add_item_query.php" method="post">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-4"><input type="number" class="text-right form-control" name="price"></div><div class="col-md-2">قیمت</div>
    </div><div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-4"><input type="text" class="text-right form-control" name="name"></div><div class="col-md-2">اسم جنس</div>
        </div>
    <div class="row">
        <div class="col-md-4"></div><div class="col-md-2"></div>
        <div class="col-md-4"><select name="owner" class="text-right form-control">
                <?php
                $sql_get = "SELECT * FROM customer";
                $result_get = mysqli_query($conn, $sql_get);
                $result_check_get = mysqli_num_rows($result_get);
                if($result_check_get>0){
                while($row_get = mysqli_fetch_assoc($result_get)){
                    echo '<option value="'.$row_get['id'].'">'.$row_get['name'].'</option>';
                }}
                ?>
            </select></div><div class="col-md-2">اسم مالک</div>
    </div>
    <div class="row">
        <div class="col-md-6"></div><div class="col-md-2">
            <button class="btn btn-primary form-control" name="submit" type="submit">اضافه کردن</button>
    </div><div class="col-md-2">
        <a href="index.php" class="btn btn-secondary form-control">لغو</a>
    </div><div class="col-md-2"></div></div>
</form>
</div>
</body>