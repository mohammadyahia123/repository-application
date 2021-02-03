<?php
include 'header.php';
?>
<style>
    .row{margin-top:2px;}

</style>
</head>
<?php include 'head.php';?>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
            <a href="index.php" class="btn btn-primary form-control" style="color: #000000; text-decoration: none;">Home</a></div>
    </div></div><hr/>
<?php
$rows=[];
$i = 0;
$sql = "SELECT * FROM items";
mysqli_set_charset($conn,"utf8");
$result = mysqli_query($conn, $sql);
$result_check = mysqli_num_rows($result);
if($result_check>0){
    while( $row = mysqli_fetch_assoc($result)){
        $rows[$i++] = $row;
    }
}
?>
<div class="container">
    <form action="edit_item_query.php?<?php echo 'id='.$_GET['id']; ?>" method="post">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-4"><input type="text" class="text-right form-control" name="name" value="<?php
                foreach($rows as $i => $r){
                    if(isset($_GET['id'])){
                        if($_GET['id'] == $r['id']) {
                             echo $r['name'];
                        }
                    }else{
                        if(!isset($_GET['price'])){
                        echo $_GET['name'];
                        break;
                    }}
                }
                ?>"></div><div class="col-md-2">اسم جنس</div>
        </div><div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-4"><input type="number" class="text-right form-control" name="price" value="<?php
                foreach($rows as $i => $r){
                if(isset($_GET['id'])){
                    if($_GET['id'] == $r['id']) {
                        echo $r['price'];
                    }
                }else{
                    if(!isset($_GET['name'])){
                        echo $_GET['price'];
                        break;
                    }}
                }
                ?>"></div><div class="col-md-2">قیمت</div>
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
                <button class="btn btn-primary form-control" name="submit" type="submit">ویرایش</button>
            </div><div class="col-md-2">
                <a href="index.php" class="btn btn-secondary form-control">لغو</a>
            </div><div class="col-md-2"></div></div>
    </form>
</div>