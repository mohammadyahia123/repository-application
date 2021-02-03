<?php
include 'header.php';
$conn = mysqli_connect('localhost', 'root', '', 'repository-app');
mysqli_set_charset($conn, "utf8");

echo '<style>
        .col-md-3, .col-md-1,.col-md-2{border: 1px solid #0000ee; text-align: end;}
        .row:nth-child(even){background-color: hsla(250,43%,50%,0.5); color: #000;}
        .row-table:hover{background-color: #ddd; font-weight: bold;}
        body{background-image: url("img/background.jpg"); background-size: cover; background-attachment: fixed;}
      </style>
    <head>
    <body>';
include 'head.php';
echo ' <div class="container"><div class="row">
 
    <div class="col-md-6"><a class="btn-primary btn form-control" href="add_item_form.php">اضافه کردن جنس</a></div>
    <div class="col-md-6"><a class="btn-primary btn form-control" href="add_owner_form.php">اضافه کردن مشتری</a></div>
    </div></div>
    </div> <hr/>';

$sql = "SELECT * FROM items";
mysqli_set_charset($conn,"utf8");
$result = mysqli_query($conn, $sql);
$result_check = mysqli_num_rows($result);
if($result_check>0){

    echo '<div class="container">';
    echo '<div class="row bg-info">';
    echo '<div class="col-md-3 text-center">ویرایش
</div><div class="col-md-3 text-center">اسم مالک
</div><div class="col-md-3 text-center">قیمت
</div><div class="col-md-3 text-center">اسم جنس
</div></div>';
    $owner = '';
    while( $row = mysqli_fetch_assoc($result)){

        echo '<div class="row row-table"><div class="col-md-1"><a href="delete_item_query.php?id='.$row['id'].'">حذف</a></div>
                            <div class="col-md-2"><a href="edit_item.php?id='.$row['id'].'">ویرایش</a></div>
                ';
        $sql_get = "SELECT id, name FROM customer";
        $result_get = mysqli_query($conn, $sql_get);
        $result_check_get = mysqli_num_rows($result_get);
        if($result_check_get>0){
            while($row_get = mysqli_fetch_assoc($result_get)){
                if($row_get['id']==$row['owner'])
                    $owner = $row_get['name'];
            }
        }
        echo '<div class="col-md-3">'.$owner.'</div><div class="col-md-3">'.$row['price'].'</div><div class="col-md-3">'.$row['name'].'</div>';
        echo '</div>';

    } echo '</div>';
}else{
    echo '<div class="container"><div class="bg-info">There is no item in the repository</div></div>';
}