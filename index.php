<?php
session_start();
include_once('./header.php');
require_once('./db/dbconfig.php');
$productList = executeResult('SELECT * FROM product');
$search ='';
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
$additional='';
if(!empty($search)){
    $additional='AND title LIKE "%'.$search.'%" ';
}
$sql       = 'SELECT * FROM product WHERE 1 '.$additional;
$productList = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>    

    <div class="container" style="margin-top: 25px;">
    <br>
    <br>
    <br>
    <div class="row">
    <?php
    foreach ($productList as $item) {
        echo '
        <div class="col-md-4" style="margin-bottom: 20px;">
            <div class="card">
                <a href="detail.php?id='.$item['id'].'">
                    <img src="'.$item['thumbnail'].'" class="card-img-top" alt="'.$item['title'].'">
                </a> 
                <div class="card-body">
                    <h5 class="card-title">'.$item['title'].'</h5>
                    <p class="card-text">'.number_format($item['price'], 0, '', '.').' VND</p>
                   
                </div>
            </div>
        </div>';
    }
    ?>
    </div>
</div>
</body>
</html>
<?php
include_once('./footer.php');
?>
