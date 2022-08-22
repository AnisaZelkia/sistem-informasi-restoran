<?php
$product_array = $db_handle->runQuery("SELECT * FROM menu ORDER BY id ASC");
if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
?>
    <div class="product-item">
        <form method="post" action="index.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
        <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
        <div class="product-tile-footer">
        <div class="product-title"><?php echo $product_array[$key]["nama"]; ?></div>
        <div class="product-harga"><?php echo "$".$product_array[$key]["harga"]; ?></div>
        <div class="cart-action"><input type="text" class="product-stok" nama="stok" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
        </div>
        </form>
    </div>
<?php
    }
}
?>
