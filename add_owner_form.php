<?php
include 'header.php';
include "head.php";

if (isset($_GET['name']) and $_GET['name'] == 'not_set'){
    echo '<div class="container bg-info text-right">اسم مشتری را وارد نمایید!</div>'; echo '<hr/>';}
if (isset($_GET['phone']) and $_GET['phone'] == 'not_numeric'){
    echo '<div class="container bg-info text-right">شماره تلفن را وارد نمایید!</div>'; echo '<hr/>';}

?>
<style>
    .col-md-4,.col-md-2{margin-top:2px;}
</style>

</head>
<body>
<?php
if(isset($_GET['owner']) and $_GET['owner'] == 'not_set')
    echo '<div class="container bg-info text-right">حداقل موجودیت یک مشتری ضروری است!  لطفا یک مشتری را ثبت کنید</div>';

?>

<div class="container">
    <form action="add_owner_query.php" method="post">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-4"><input type="text" class="form-control text-right" name="name"></div><div class="col-md-2">اسم مشتری</div>
        </div><div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-4"><input type="text" class="form-control text-right" name="phone"></div><div class="col-md-2">شماره تلفن</div>
        </div>
        <div class="row">
            <div class="col-md-6"></div><div class="col-md-2">
                <button class="btn btn-primary form-control" name="submit" type="submit">اضافه کردن</button>
            </div><div class="col-md-2">
                <a href="index.php" class="btn btn-secondary form-control">لغو</a>
            </div><div class="col-md-2"></div>
        </div>
    </form>
</div>
</body>