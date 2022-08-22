<?php
require 'function.php';

if ( isset ($_POST["submit"]))//tombol submit sud/cek apakah sudah ato belum 
	{
			
	//cek apakah data berhasil atau tidak
		if( tambah( $_POST )>0 )
		{
			echo "
			<script>
					alert('Data Berhasil Ditambahkan!');
					document.location.href = 'index.php';
			</script>
			";
		}
		else
		{
			echo "
			<script>
					alert('Data Gagal Ditambahkan!');
					document.location.href = 'index.php';
			</script>
			";
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data menu</title>
</head>
<body>
	<h1>Tambah Data Menu</h1>
	<form action="" method="post">
		<ul>
			<li><label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li><label for="jenis">Jenis : </label>
				<input type="text" name="jenis" id="jenis" required>
			</li>
			<li><label for="stok">Stok : </label>
				<input type="text" name="stok" id="stok" required>
			</li>
			<li><label for="harga">Harga : Rp.</label>
				<input type="text" name="harga" id="harga" required>
			</li>
			<li><label for="gambar">Gambar : </label>
				<input type="text" name="gambar" id="gambar" required>
			</li>
		</ul>
		<button type="submit" name="submit">Tambah Data</button>
		</form>
</body>
</html>