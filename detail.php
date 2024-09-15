<?php
session_start();
include_once('./header.php');
require_once('./db/dbconfig.php');
require_once('./utility.php');

$id = getGet('id');
$product = executeResult('select * from product where id = '.$id, true);
?>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <img class="card-img-top" src="<?=$product['thumbnail']?>" alt="<?=$product['title']?>">
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?=$product['title']?></h5>
                    <p class="card-text"><?=number_format($product['price'], 0, '', '.')?> VND</p>
                    <p class="card-text"><?=$product['content']?></p>
                </div>
            </div>
            <button class="btn btn-success mt-3" onclick="addToCart(<?=$id?>)">Add to cart <i class="fa-solid fa-cart-plus"></i></button>
            <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    function addToCart(id) {
        $.post('./functions.php', {
            'action': 'add',
            'id': id
        }, function(data) {
            location.reload();
        });
    }
</script>
<?php
include_once('./footer.php');
?>
