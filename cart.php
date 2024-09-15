<?php
session_start();
include_once('./header.php');
require_once('./db/config.php');
?>
<div class="container-fluid" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive">
                <table class="table table-bordered border-primary">
                    <thead class="table-dark">
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cart = [];
                        if(isset($_SESSION['cart'])) {
                            $cart = $_SESSION['cart'];
                        }
                        $count = 0;
                        $total = 0;
                        foreach ($cart as $item) {
                            $total += $item['num'] * $item['price'];
                            echo '
                                <tr style="text-align:center" data-id="'. $item['id'] .'">
                                    <td>'.(++$count).'</td>
                                    <td><img src="'.$item['thumbnail'].'" style="width: 100px"></td>
                                    <td>'.$item['title'].'</td>
                                    <td>'.number_format($item['price'], 0, '', '.').' VND</td>
                                    <td><input type="number" name="quatity" value="'.$item['num'].'" min="1" max="50"></td>
                                    <td>'.number_format($item['num'] * $item['price'], 0, '', '.').' VND</td>
                                    <td>
                                        <button class="btn btn-danger" onclick="deleteItem('.$item['id'].')"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-success" onclick="updateItem('.$item['id'].')"><i class="fa fa-refresh"></i></button>
                                    </td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <p style="font-size: 30px; color: black; text-align: right; font-weight: bold">Total: <?=number_format($total, 0, '', '.')?> VND</p>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" onclick="order()" style="width: 150px; font-size: 20px;">Order</button>
                <a href="index.php" class="ml-3"><button class="btn btn-danger">Back to Home Page</button></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteItem(id) {
        var option = confirm('Are you sure you want to delete this product?');
        if(!option) {
            return;
        }
        $.post('./functions.php', {
            'action': 'delete',
            'id': id
        }, function(data) {
            location.reload();
        });
    }
    function order() {
        var option = confirm('Are you want to order your cart?');
        if(!option) {
            return;
        }
        $.post('./functions.php', {
            'action': 'order'
        }, function(data) {
            var option = confirm('Order Success!!!');
            if(!option) {
                return;
            }
            window.location.href = "./index.php";
        });
    }
    function updateItem(id) {
        var option = confirm('Are you want to update quantity?');
        if(!option){
            return;
        }
        currRow = $('table').find('tr[data-id="' + id + '"]');
        newQuantity = currRow.find("input[name='quatity']").val();
        $.post('./functions.php', {
            'action': 'update',
            'id': id,
            'newQuantity': newQuantity
        }, function(data) {
            location.reload();
        });
    }
</script>
<?php
include_once('./footer.php');
?>
