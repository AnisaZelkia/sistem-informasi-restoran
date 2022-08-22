<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["stok"])) {
			$productById = $db_handle->runQuery("SELECT * FROM menu WHERE id='" . $_GET["id"] . "'");
			$itemArray = array($productById[0]["id"]=>array('nama'=>$productById[0]["nama"], 'id'=>$productById[0]["id"], 'stok'=>$_POST["stok"], 'harga'=>$productById[0]["harga"], 'gambar'=>$productById[0]["gambar"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productById[0]["id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productById[0]["id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["stok"])) {
									$_SESSION["cart_item"][$k]["stok"] = 0;
								}
								$_SESSION["cart_item"][$k]["stok"] += $_POST["stok"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["id"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE></TITLE>
<link href="style1.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index1.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_stok = 0;
    $total_harga = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Nama</th>
<th style="text-align:left;">Id</th>
<th style="text-align:right;" width="5%">Stok</th>
<th style="text-align:right;" width="10%">Unit Harga</th>
<th style="text-align:right;" width="10%">Harga</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_harga = $item["stok"]*$item["harga"];
		?>
				<tr>
				<td><img src="<?php echo $item["gambar"]; ?>" class="cart-item-gambar" /><?php echo $item["nama"]; ?></td>
				<td><?php echo $item["id"]; ?></td>
				<td style="text-align:right;"><?php echo $item["stok"]; ?></td>
				<td  style="text-align:right;"><?php echo "Rp. ".$item["harga"]; ?></td>
				<td  style="text-align:right;"><?php echo "Rp.". number_format($item_harga,2); ?></td>
				<td style="text-align:center;"><a href="index1.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_stok += $item["stok"];
				$total_harga += ($item["harga"]*$item["stok"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_stok; ?></td>
<td align="right" colspan="2"><strong><?php echo "Rp. ".number_format($total_harga, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM menu ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index1.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
			<div class="product-gambar"><img src="<?php echo $product_array[$key]["gambar"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["nama"]; ?></div>
			<div class="product-harga"><?php echo "Rp".$product_array[$key]["harga"]; ?></div>
			<div class="cart-action"><input type="text" class="product-stok" nama="stok" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTM>
