<?php 
  require 'function.php';
    if (!isset($_SESSION)) {
        session_start();
    }
?>
 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contoh Aplikasi Shopping Cart</title>
<style>
    h1, h2, h3, p {
        margin-top:0px;
        margin-bottom:10px;
    }
</style>
</head>
 
<body>
 
<h1>Contoh Aplikasi Shopping Cart</h1>
<h2>List Produk</h2>
<hr />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td width="55%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php
    mysqli_select_db($database_conn);
    $query = mysqli_query ($conn,"select * from barang");
    while ($rs = mysql_fetch_array ($query)) {
          
    ?>
      <tr>
        <td width="160" valign="top"><img src="<?php echo $rs['gambar']; ?>" alt="" style="width:140px; margin-right:20px; margin-bottom:20px;" /></td>
        <td valign="top"><h3><?php echo $rs['nama']; ?></h3>
          <p><?php echo $rs['deskripsi']; ?></p>
          <p>Harga : <?php echo number_format($rs['harga']); ?> - <a href="cart.php?act=add&amp;barang_id=<?php echo $rs['id']; ?>&amp;ref=index.php">Beli</a></p></td>
        </tr>
      <?php
    }
    ?>
    </table></td>
    <td>&nbsp;</td>
    <td width="40%"><p>Keranjang Anda</p>
      <hr />
      <?php require("cart_view.php"); ?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>