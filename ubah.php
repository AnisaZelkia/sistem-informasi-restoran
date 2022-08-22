<?php
require 'function.php';
$id = $_GET["id"];
$menu = query ("SELECT * FROM menu WHERE id = $id")[0];
if ( isset ($_POST["submit"]))
	{	
		if( ubah( $_POST )>0 )
		{
			echo "
			<script>
					alert('Data Berhasil Diubah!');
					document.location.href = 'index.php';
			</script>
			";
		}
		else
		{
			echo "
			<script>
					alert('Data Gagal Diubah!');
					document.location.href = 'index.php';
			</script>
			";
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mengupdate Data Menu</title>
</head>
<body>
	<h1>Mengupdate Data Menu</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $menu["id"]?>">
		<ul>
			<li><label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?=$menu["nama"]; ?>">
			</li>
			<li><label for="jenis">Jenis : </label>
				<input type="text" name="jenis" id="jenis" required value="<?=$menu["jenis"]; ?>">
			</li>
			<li><label for="stok">Stok : </label>
				<input type="text" name="stok" id="stok" required value="<?=$menu["stok"]; ?>">
			</li>
			<li><label for="harga">Harga : Rp.</label>
				<input type="text" name="harga" id="harga" required value="<?=$menu["harga"]; ?>">
			</li>
			<li>
			<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar" required value="<?=$menu["gambar"]; ?>">
			</li>

		</ul>
		<button type="submit" name="submit">Mengupdate Data</button>
		</form>
</body>
</html>